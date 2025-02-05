<?php

namespace App\Http\Livewire\Customer;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Exception;
class CustomerPersonalInformationComponent extends Component
{

    public $finalltotal;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $delivery;
    public $address;
    public $zipcode;
    public $paymentmode;
    public $int_price;
    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;
    
    public function updated($fields)
    {
        $this->validateOnly($fields, [

            'firstname' =>'required',
            'lastname' =>'required',
            'mobile' =>'required|numeric|digits:10',
            'email' => 'required|email',
            'delivery' => 'required',
            'paymentmode' => 'required',


        ]);

        if($this->delivery == 'ship')
        {
            $this->validateOnly($fields, [
                'address' =>'required',
                'zipcode' => 'required|numeric',

            ]);
        }

        if($this->paymentmode == 'card')
        {
            $this->validateOnly($fields,[
                'card_no' =>'required|numeric',
                'exp_month' =>'required|numeric',
                'exp_year' =>'required|numeric',
                'cvc' =>'required|numeric',

            ]);
        }

    }

    public function storeOrder()
    {
       
        $this->validate([
            'firstname' =>'required',
            'lastname' =>'required',
            'mobile' =>'required|numeric|digits:10',
            'email' => 'required|email',
            'delivery' => 'required',
            'paymentmode' => 'required',

        ]);

        if($this->delivery == 'ship')
        {
           
            $this->validate([
                'address' =>'required',   
                'zipcode' => 'required|numeric',

            ]);
    
        }

        if($this->paymentmode == 'card')
        {
            $this->validate([
                'card_no' =>'required|numeric',
                'exp_month' =>'required|numeric',
                'exp_year' =>'required|numeric',
                'cvc' =>'required|numeric',

            ]);
        } 
        

        if( $this->delivery == 'ship'){
            if(Cart::total() > 87.00 ){
                $this->finalltotal = Cart::total();
            }elseif(Cart::total() <= 87.00){
                $this->finalltotal =  Cart::total() + 10;
            }
        }else{
            $this->finalltotal = Cart::total();
        }
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal =Cart::subtotal();
        $order->tax = Cart::tax();
        $order->total = Cart::total();
        $order->finalltotal = $this->finalltotal;

        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->mobile = $this->mobile;
        $order->email = $this->email;
        $order->delivery = $this->delivery;
        if($this->delivery == 'ship')
        {
            $order->address = $this->address;
            $order->zipcode = $this->zipcode;

        }
        $order->paymentmode = $this->paymentmode;
        $order->status = 'ordered';
        $order->save();

        foreach(Cart::content() as $item)
        {
            $orderitem = new OrderItem();
            $orderitem->product_id =$item->id;
            $orderitem->order_id =$order->id;
            $orderitem->price =$item->price;
            $orderitem->quantity =$item->qty;
            $orderitem->save();

            $product =Product::find($item->id);
            $product->left_quantity = $product->left_quantity- $item->qty;
            $product->update();
        }


        if($this->paymentmode == 'cash')
        {
            Cart::destroy();
            return redirect()->route('cart.done');

        }
        elseif( $this->paymentmode == 'card')
        {


            

            //add STRIPE_SECRET 
            $stripe = new  \Stripe\StripeClient(env('STRIPE_SECRET'));
              
            $customer = $stripe->customers->create([
                'source' => 'tok_mastercard',
                "email" => Auth::user()->email,
            ]);
            //add card detials
            $stripe->tokens->create([
    
                'card' => [
                'name'=> Auth::user()->name,
                'number' =>$this->card_no,
                'exp_month' =>$this->exp_month,
                'exp_year' =>$this->exp_year,
                'cvc' => $this->cvc,
                ],

    
            ]);
    
            $this->int_price=(int)$this->finalltotal;

            //send data to stripe
           $intent =  $stripe->paymentIntents->create([
                'amount'=> $this->int_price."00",
                'currency' => 'sar',
                'payment_method_types' => ['card'],
                'payment_method' => 'pm_card_visa',
                'customer'=> $customer,
                'confirm' => true,
            ]);
           
           // check if status is success
            $paymentStatus = json_decode($this->generateResponse($intent),true);
    
            
            if ($paymentStatus['success'] === true) {
               
                if ($customer) {

                    //add Transaction detials to database
                    $transaction = new Transaction();
                    $transaction->order_id =$order->id;
                    $transaction->amount =   $this->finalltotal;
                    $transaction->currency = 'sar';
                    $transaction->status ='Payed';
                    $transaction->customer_id =Auth::user()->id;
                    $transaction->transaction_id = $customer->id;
                    $transaction->save();
                    
        
                }
                 
                Cart::destroy();
                return redirect()->route('cart.done');

               
                
           }
        }


    }

    public function generateResponse($intent) {
        if ($intent->status == 'succeeded') {
          // Handle post-payment fulfillment
          return json_encode(['success' => true]);
        } else {
          // Any other status would be unexpected, so error
          return json_encode(['error' => 'Invalid PaymentIntent status']);
        }
    }

    public function render()
    {
        return view('livewire.customer.customer-personal-information-component')->layout('layouts.app');
    }
}
