@extends('layouts.app')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Manage Purchasing</h1>
        </div>
        <div class="column">
          <a href="{{route('purchasing.create', app()->getLocale())}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i>{{__('Add Purchase Order')}}</a>
        </div>
      </div>
      <hr class="m-t-0">

      <div class="card">
        <div class="card-content">
          <table class="table is-narrow is-fullwidth">
            <thead>
              <tr>
                <th>ID#</th>
                <th>Supplier Name</th>
                <th>Payment</th>
                <th>Transport</th>
                <th>Total Item</th>
                <th>Total</th>
                <th>Created Date</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($purchasing as $purchase)
                <tr>
                  <th>{{$purchase->id}}</th>
                  <td>{{$purchase->supplier->name}}</td>
                  <td>{{$purchase->payments}}</td>
                  <td>{{$purchase->trasport}}</td>
                  <td>{{$purchase->quantity}}</td>
                  <td>{{$purchase->total}}</td>
                  <td>{{$purchase->created_at->toFormattedDateString()}}</td>                  
                  <td class="has-text-right"><a class="button is-outlined m-r-5" href="{{route('purchasing.show', [app()->getLocale(), $purchase->id])}}">View</a><a class="button is-light" href="{{route('purchasing.edit', [app()->getLocale(), $purchase->id])}}">Edit</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div> <!-- end of .card -->

      {{$purchasing->links()}}
      
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