@extends('layouts.app')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column is-3">
          <h2 class="title"><strong>{{count($orders)}}</strong> Customers</h2>
        </div>
        <div class="column is-6">
          <div class="level-item">
            <div class="field has-addons">
                <p class="control">
                    <input class="input is-primary is-expanded" type="text" placeholder="Find a Customer">
                </p>
                <div class="control">
                    <div class="select is-primary">
                      <select>
                        <option>Select a Field</option>
                        <option>With options</option>
                      </select>
                    </div>
                </div>
                <p class="control">
                    <button class="button is-primary">
                    Search
                    </button>
                </p>
            </div>
        </div>
        </div>
        <div class="column is-3">
          <a href="{{route('order.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Customer</a>
        </div>
      </div>
      <hr class="m-t-0">

      <div class="card">
        <div class="card-content">
          <table class="table is-narrow is-fullwidth">
            <thead>
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Account NO#</th>
                <th class="has-text-right">Balance</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @if (count($orders) > 0)
                @foreach ($orders as $order)
                
                    <tr>
                      <th>{{$order->id}}</th>
                      <td>{{$order->first_name}}</td>
                      <td>{{$order->email}}</td>
                      <td>{{$order->phone}}</td>
                      <td>{{$order->account}}</td>
                      <td class="has-text-right">{{$order->balance}}</td>
                      <td class="has-text-right"><a class="button is-outlined m-r-5" href="{{route('order.show', $order->id)}}">View</a><a class="button is-light" href="{{route('order.edit', $order->id)}}">Edit</a></td>
                    </tr>
                  
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div> <!-- end of .card -->

      {{$orders->links()}}
      
    </div>
@endsection
@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
    //   data: {
    //     auto_password: true,
    //     rolesSelected: {!! old('roles') ? old('roles') : '[]' !!}
    //   }
    });
  </script>
@endsection