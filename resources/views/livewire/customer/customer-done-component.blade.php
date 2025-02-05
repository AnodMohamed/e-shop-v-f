@push('styles')
<style>
.wrapper-progressBar {
    width: 100%
}

.progressBar {
}

.progressBar li {
    list-style-type: none;
    float: left;
    width: 33%;
    position: relative;
    text-align: center;
}

.progressBar li:before {
    content: " ";
    line-height: 30px;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    display: block;
    text-align: center;
    margin: 0 auto 10px;
    background-color: white
}

.progressBar li:after {
    content: "";
    position: absolute;
    width: 100%;
    height: 4px;
    background-color: #ddd;
    top: 15px;
    left: -50%;
    z-index: -1;
}

.progressBar li:first-child:after {
    content: none;
}

.progressBar li.active {
    color: #02b458;
}

.progressBar li.active:before {
    border-color: #02b458;
    background-color: #02b458;
}

.progressBar .active:after {
    background-color: #02b458;
}

</style> 
@endpush


<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(' Shopping Cart') }}
    </h2>
</x-slot>


<div class="py-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="container-sm px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-md-11  block border m-auto">
                      <div class="wrapper-progressBar">
                        <ul class="progressBar">
                          <li class="active">Order Information </li>
                          <li class="active">Personal information </li>
                          <li class="active">Done</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <div class="p-5">
                    <hr class="my-4">
                        <div class="text-success" role="alert">

                            <h3 class="fw-bold mb-5 mt-2 pt-1">
                                <i class="fa-solid fa-circle-check"></i> 
                                Thanks so much for your order! I hope you enjoy your new purchase! ...     
                            </h3>

                            
                        </div>
               
                </div>
            </div>
            
          
        </div>

    </div>
</div>
