@extends('layouts.app')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">{{__('Manage Accounts')}}</h1>
        </div>
      </div>
      <hr class="m-t-0">
      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-left">
                
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <a href="{{route('receive.create', app()->getLocale())}}">{{__('Cash Receives')}}</a>
                  </p>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-left">
                
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <a href="{{route('expense.create', app()->getLocale())}}">{{__('Cash Expenses')}}</a>
                  </p>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-left">
                
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <a href="{{route('deposit.create', app()->getLocale())}}">{{__('Bank Deposit')}}</a>
                  </p>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-left">
                
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <a href="{{route('drawings.create', app()->getLocale())}}">{{__('Cash Drawings')}}</a>
                  </p>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column">
          <div class="card">
            <h1 class="card-header title p-t-10 p-b-10 p-l-20">{{__('Receive History')}}</h1>
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
      </div>

      <div class="columns">
        <div class="column">
          <div class="card">
            <h1 class="card-header title p-t-10 p-b-10 p-l-20">{{__('Expeses History')}}</h1>
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
                  @foreach ($expenses as $receive)
                <tr>
                  <th>{{$receive->id}}</th>
                  <td>{{$receive->expense_head}}</td>
                  <td>{{$receive->account_head}}</td>
                  <td>{{$receive->comments}}</td>
                  <td>{{$receive->receipient_name}}</td>
                  <td class="has-text-right">{{$receive->total}}</td>
                  <td class="has-text-right">
                    <a class="button is-small is-outlined m-r-5" href="{{route('expense.show', [app()->getLocale(), $receive->id])}}">View</a>
                    <a class="button is-light is-small" href="{{route('expense.edit', [app()->getLocale(), $receive->id])}}">Edit</a>
                  </td>
                </tr>
              @endforeach
                </tbody>
              </table>
            </div>
          </div> <!-- end of .card -->
    
          {{$expenses->links()}}
        </div>
      </div>
      <div class="columns">
        <div class="column">
          <div class="card">
            <h1 class="card-header title p-t-10 p-b-10 p-l-20">{{__('Drawings History')}}</h1>
            <div class="card-content">
              <table class="table is-narrow is-fullwidth">
                <thead>
                  <tr>
                    <th>ID#</th>
                    <th>Drawings Head</th>
                    <th>Account Head</th>
                    <th>Comments</th>
                    <th>Drawings By</th>
                    <th class="has-text-right">Total</th>
                    <th></th>
                  </tr>
                </thead>
    
                <tbody>
                  @foreach ($drawings as $receive)
                    <tr>
                      <th>{{$receive->id}}</th>
                      <td>{{$receive->drawings_head}}</td>
                      <td>{{$receive->account_head}}</td>
                      <td>{{$receive->comments}}</td>
                      <td>{{$receive->drawings_by}}</td>
                      <td class="has-text-right">{{$receive->total}}</td>
                      <td class="has-text-right">
                        <a class="button is-small is-outlined m-r-5" href="{{route('drawings.show', [app()->getLocale(), $receive->id])}}">View</a>
                        <a class="button is-light is-small" href="{{route('drawings.edit', [app()->getLocale(), $receive->id])}}">Edit</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div> <!-- end of .card -->
    
          {{-- {{$suppliers->links()}} --}}
        </div>
      </div>
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