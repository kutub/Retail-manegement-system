@extends('layouts.app')

@section('content')

    <div class="container is-fullhd m-t-30">
        <dashboard></dashboard>
        <div class="columns is-multiline">
            <div class="column is-4">
                <div class="card has-text-centered">         
                    <div class="card-content">
                        <span class="icon" style="background-color: aquamarine; border-radius:100%; width:60px; height:60px;margin-bottom:10px; color:white;font-size:2rem">
                            <i class="fa fa-product-hunt "></i>
                        </span>
                        <div class="content">
                            <h5>Total Stock Value</h5>
                            <h3>2000&#2547;</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card has-text-centered">         
                    <div class="card-content">
                        <span class="icon" style="background-color: yellow; border-radius:100%; width:60px; height:60px;margin-bottom:10px; color:white;font-size:2rem">
                            <i class="fa fa-download"></i>
                        </span>
                        <div class="content">
                            <h5>Total Receivable</h5>
                            <h3>{{$due}}&#2547;</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card has-text-centered">         
                    <div class="card-content">
                        <span class="icon" style="background-color: green; border-radius:100%; width:60px; height:60px;margin-bottom:10px; color:white;font-size:2rem">
                            <i class="fa fa-money"></i>
                        </span>
                        <div class="content">
                            <h5>Total Profit</h5>
                            <h3>{{$profit}}&#2547;</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card has-text-centered">         
                    <div class="card-content">
                        <span class="icon" style="background-color: green; border-radius:100%; width:60px; height:60px;margin-bottom:10px; color:white;font-size:2rem">
                            <i class="fa fa-briefcase"></i>
                        </span>
                        <div class="content">
                            <h5>Total Cash on Hand</h5>
                            <h3>{{$cashes}}&#2547;</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card has-text-centered">         
                    <div class="card-content">
                        <span class="icon" style="background-color: green; border-radius:100%; width:60px; height:60px;margin-bottom:10px; color:white;font-size:2rem">
                            <i class="fa fa-credit-card-alt"></i>
                        </span>
                        <div class="content">
                            <h5>Total Bank Deposit</h5>
                            <h3>{{$credited}}&#2547;</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card has-text-centered">         
                    <div class="card-content">
                        <span class="icon" style="background-color: green; border-radius:100%; width:60px; height:60px;margin-bottom:10px; color:white;font-size:2rem">
                            <i class="fa fa-upload"></i>
                        </span>
                        <div class="content">
                            <h5>Total Expenses</h5>
                            <h3>{{$debited}}&#2547;</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
