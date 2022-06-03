@extends('layouts.app')

@section('content')
    <div class="container is-fullhd m-t-30">
        <div class="columns">
            <div class="column has-text-centered">
                <h2 class="title">{{__('Welcome to Medis, Choose a common task below to get started')}}</h2>
            </div>
        </div>

        <div class="columns is-multiline">
            <div class="column is-6">
                <div class="card">         
                    <div class="card-content">
                        <div class="columns">
                            <div class="column has-text-centered is-1">
                                <span class="icon" style="font-size: 2rem">
                                    <i class="fa fa-tachometer m-r-5"></i>
                                </span>
                            </div>
                            <div class="column is-11">
                                <div class="content">
                                    <h4 style="margin-bottom:0"><a href="{{route('dashboard', app()->getLocale())}}">{{__('Go to Dashboard')}}</a></h4>
                                  </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
            </div>
            <div class="column is-6">
                <div class="card">         
                    <div class="card-content">
                        <div class="columns">
                            <div class="column  has-text-centered is-1">
                                <span class="icon" style="font-size: 2rem">
                                    <i class="fa fa-cart-arrow-down"></i>
                                </span>
                            </div>
                            <div class="column is-11">
                                <div class="content">
                                   <h4 style="margin-bottom:0"><a href="{{url(app()->getLocale().'/home/sales/create')}}">{{__('Start Sales Register')}}</a></h4>
                                  </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
            </div>
            <div class="column is-6">
                <div class="card">         
                    <div class="card-content">
                        <div class="columns">
                            <div class="column  has-text-centered is-1">
                                <span class="icon" style="font-size: 2rem">
                                    <i class="fa fa-product-hunt"></i>
                                </span>
                            </div>
                            <div class="column is-11">
                                <div class="content">
                                   <h4 style="margin-bottom:0"><a href="{{route('product.index', app()->getLocale())}}">{{__('Manage Inventory')}}</a></h4>
                                  </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
            </div>
            <div class="column is-6">
                <div class="card">         
                    <div class="card-content">
                        <div class="columns">
                            <div class="column  has-text-centered is-1">
                                <span class="icon" style="font-size: 2rem">
                                    <i class="fa fa-users"></i>
                                </span>
                            </div>
                            <div class="column is-11">
                                <div class="content">
                                   <h4 style="margin-bottom:0"><a href="{{route('customer.index',app()->getLocale())}}">{{__('Manage Customers')}}</a></h4>
                                  </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
            </div>
            <div class="column is-6">
                <div class="card">         
                    <div class="card-content">
                        <div class="columns">
                            <div class="column  has-text-centered is-1">
                                <span class="icon" style="font-size: 2rem">
                                    <i class="fa fa-calculator"></i>
                                </span>
                            </div>
                            <div class="column is-11">
                                <div class="content">
                                   <h4 style="margin-bottom:0"><a href="{{url(app()->getLocale().'/home/account/')}}">{{__('Manage Accounts')}}</a></h4>
                                  </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
            </div>
            <div class="column is-6">
                <div class="card">         
                    <div class="card-content">
                        <div class="columns">
                            <div class="column  has-text-centered is-1">
                                <span class="icon" style="font-size: 2rem">
                                    <i class="fa fa-fw fa-truck"></i>
                                </span>
                            </div>
                            <div class="column is-11">
                                <div class="content">
                                <h4 style="margin-bottom:0"><a href="{{route('supplier.index', app()->getLocale())}}">{{__('Manage Suppliers')}}</a></h4>
                                  </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
            </div>
            
            {{-- <div class="column is-6">
                <div class="card">         
                    <div class="card-content">
                        <div class="columns">
                            <div class="column is-4">
                                <span class="icon">
                                    <i class="fa fa-fw fa-bell m-r-5"></i>
                                  </span>
                            </div>
                            <div class="column is-8">
                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                                    <a href="#">@bulmaio</a>. <a href="#">#css</a> <a href="#">#responsive</a>
                                    <br>
                                    <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                                  </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
            </div>
            <div class="column is-6">
                <div class="card">         
                    <div class="card-content">
                        <div class="columns">
                            <div class="column is-4">
                                <span class="icon">
                                    <i class="fa fa-fw fa-bell m-r-5"></i>
                                  </span>
                            </div>
                            <div class="column is-8">
                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                                    <a href="#">@bulmaio</a>. <a href="#">#css</a> <a href="#">#responsive</a>
                                    <br>
                                    <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                                  </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
            </div> --}}
        </div>
        
    </div>
@endsection
@section('scripts')
<script>
   var vm = new Vue({
    el: '#app',
    // components: { 'side-nav': sideNav }
}); 
</script>

@endsection