@extends('layouts.app')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">{{__('Manage Suppliers')}}</h1>
        </div>
        <div class="column">
          <a href="{{route('supplier.create', app()->getLocale())}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> {{__('Add Supplier')}}</a>
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
                <th class="has-text-right">Opening Balance</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($suppliers as $supplier)
                <tr>
                  <th>{{$supplier->id}}</th>
                  <td>{{$supplier->name}}</td>
                  <td>{{$supplier->email}}</td>
                  <td>{{$supplier->phone}}</td>
                  <td>{{$supplier->account_no}}</td>
                  <td class="has-text-right">{{$supplier->opening_balance}}</td>
                  <td class="has-text-right"><a class="button is-outlined m-r-5" href="{{route('supplier.show', [app()->getLocale(), $supplier->id])}}">View</a><a class="button is-light" href="{{route('supplier.edit', [app()->getLocale(), $supplier->id])}}">Edit</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div> <!-- end of .card -->

      {{$suppliers->links()}}
      
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