@extends('layouts.app')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Manage Cash Receive</h1>
        </div>
        <div class="column">
          <a href="{{route('receive.create', app()->getLocale())}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Save Cash Receive</a>
        </div>
      </div>
      <hr class="m-t-0">
      
      <div class="card">
        <div class="card-content">
          <table class="table is-narrow is-fullwidth">
            <thead>
              <tr>
                <th>ID#</th>
                <th>Receive Head</th>
                <th>Account Head</th>
                <th>Comments</th>
                <th>Received By</th>
                <th class="has-text-right">Total</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($receives as $receive)
                <tr>
                  <th>{{$receive->id}}</th>
                  <td>{{$receive->receive_head}}</td>
                  <td>{{$receive->account_head}}</td>
                  <td>{{$receive->comments}}</td>
                  <td>{{$receive->received_by}}</td>
                  <td class="has-text-right">{{$receive->total}}</td>
                  <td class="has-text-right">
                    <a class="button is-small is-outlined m-r-5" href="{{route('receive.show', [app()->getLocale(), $receive->id])}}">View</a>
                    <a class="button is-light is-small" href="{{route('receive.edit', [app()->getLocale(), $receive->id])}}">Edit</a>
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