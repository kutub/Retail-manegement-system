@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit receive Information</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('receive.update', [app()->getLocale(), $receive->id])}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Receive From: (customer id)</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded">
              <input type="text" class="input"  name="customer_id" value="{{$receive->customer_id}}" disabled/>
            </p>
          </div>
        </div>
      </div>
      
      <div class="columns">
        <div class="column is-2"></div>
        <div class="column is-5 p-l-30">
          <div class="field is-expanded">
            <label class="label">Received Head:</label>
            <div class="control is-expanded">
              <div class="select ">
                <select name="receive_head">
                  <option value="{{$receive->receive_head}}">{{$receive->receive_head}}</option>
                  <option value="from-customer">Cash Receive From Customer</option>
                  <option value="from-supplier">Cash Receive From Supplier</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="column is-5">
          <div class="field is-expanded">
            <label class="label">Account Head:</label>
            <div class="control is-expanded">
              <div class="select">
                <select name="account_head">
                  <option value="{{$receive->account_head}}">{{$receive->account_head}}</option>
                  <option value="cash">Cash on Hand</option>
                  <option value="check">Check</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Total</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="total" placeholder="Total" value="{{$receive->total}}">
              </p>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Comments</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
            <textarea class="textarea" name="comments" placeholder="Comments">{{$receive->comments}}</textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary is-pulled-right" style="width: 250px;">Update receive</button>
        </div>
      </div>
    </form>

  </div> <!-- end of .flex-container -->
@endsection


@section('scripts')
  <script>

    var app = new Vue({
      el: '#app',
      data: {
        
      }
    });

  </script>
@endsection
