@extends('layouts.app')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Manage Banks</h1>
        </div>
        <div class="column">
          <a href="{{route('bank.create', app()->getLocale())}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Add Bank</a>
        </div>
      </div>
      <hr class="m-t-0">
      
      <div class="card">
        <div class="card-content">
          <table class="table is-narrow is-fullwidth">
            <thead>
              <tr>
                <th>ID#</th>
                <th>Bank Name</th>
                <th>Account Name</th>
                <th>Account No.</th>
                <th>Branch  Address</th>
                <th>Mobile No</th>
                <th class="has-text-right">Balance</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($banks as $bank)
                <tr>
                  <th>{{$bank->id}}</th>
                  <td>{{$bank->name}}</td>
                  <td>{{$bank->account_name}}</td>
                  <td>{{$bank->account_no}}</td>
                  <td>{{$bank->branch}}</td>
                  <td>{{$bank->mobile}}</td>
                  <td class="has-text-right">{{$bank->balance}}</td>
                  <td class="has-text-right">
                    <a class="button is-small is-outlined m-r-5" href="{{route('bank.show', [app()->getLocale(), $bank->id])}}">View</a>
                    <a class="button is-light is-small" href="{{route('bank.edit', [app()->getLocale(), $bank->id])}}">Edit</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div> <!-- end of .card -->

      {{$banks->links()}}
      
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