@extends('layouts.manage')

@section('content')
<div class="container is-fullhd m-t-30">
    <div class="columns">
        <div class="column has-text-centered">
            <h2 class="title is-4">Welcome to Medis, Choose a common task below to get started</h2>
        </div>
    </div>

    <div class="columns is-multiline">
        <div class="column is-6">
            <div class="card">         
                <div class="card-content">
                    <div class="columns">
                        <div class="column has-text-centered is-1">
                            <span class="icon" style="font-size: 2rem">
                                <i class="fa fa-users m-r-5"></i>
                            </span>
                        </div>
                        <div class="column is-11">
                            <div class="content">
                                <h4 style="margin-bottom:0"><a href="{{route('users.index')}}">Manage Users</a></h4>
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
                               <h4 style="margin-bottom:0"><a href="{{route('roles.index')}}">Manage Roles</a></h4>
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
                               <h4 style="margin-bottom:0"><a href="{{route('permissions.index')}}">Manage Permissions</a></h4>
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
                        <div class="column  has-text-centered is-1">
                            <span class="icon" style="font-size: 2rem">
                                <i class="fa fa-users"></i>
                            </span>
                        </div>
                        <div class="column is-11">
                            <div class="content">
                               <h4 style="margin-bottom:0"><a href="{{route('customer.index')}}">Manage Customer</a></h4>
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
                               <h4 style="margin-bottom:0"><a href="{{url('/home/account/')}}">Manage Accounts</a></h4>
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
                            <h4 style="margin-bottom:0"><a href="{{route('supplier.index')}}">Manage Supliars</a></h4>
                              </div>
                        </div>
                    </div>
                </div>
                
              </div>
        </div> --}}
        
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