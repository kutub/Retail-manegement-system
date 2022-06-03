@extends('layouts.app')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">{{__('Manage Bank Deposit')}}</h1>
        </div>
        <div class="column">
          <a href="{{route('deposit.create', app()->getLocale())}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> {{__('Add New Deposit')}}</a>
        </div>
      </div>
      <hr class="m-t-0">
      
      <div class="card">
        <div class="card-content">
          <table class="table is-narrow is-fullwidth">
            <thead>
              <tr>
                <th>ID#</th>
                <th>Deposit Head</th>
                <th>Bank Name</th>
                <th>Comments</th>
                <th>Deposited By</th>
                <th>Receive No</th>
                <th class="has-text-right">Total</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($receives as $receive)
                <tr>
                  <th>{{$receive->id}}</th>
                  <td>{{$receive->deposit_head}}</td>
                  <td>{{$receive->bank_id}}</td>
                  <td>{{$receive->comments}}</td>
                  <td>{{$receive->deposit_by}}</td>
                  <td>{{$receive->receive_no}}</td>
                  <td class="has-text-right">{{$receive->total}}</td>
                  <td class="has-text-right">
                    <a class="button is-small is-outlined m-r-5" href="{{route('deposit.show', [app()->getLocale(), $receive->id])}}">View</a>
                    <a class="button is-light is-small" href="{{route('deposit.edit', [app()->getLocale(), $receive->id])}}">Edit</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div> <!-- end of .card -->

      {{$receives->links()}}
      
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