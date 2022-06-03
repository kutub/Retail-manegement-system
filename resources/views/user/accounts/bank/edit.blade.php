@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit Bank Information</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('bank.update', [app()->getLocale(), $bank->id])}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Bank Name:</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded">
              <input type="text" class="input"  name="name" value="{{$bank->name}}"/>
            </p>
          </div>
        </div>
      </div>
      
      <div class="columns">
        <div class="column is-2"></div>
        <div class="column is-5 p-l-30">
          <div class="field is-expanded">
            <label class="label">Account Name:</label>
            <div class="field">
              <p class="control is-expanded">
                <input type="text" class="input"  name="account_name" value="{{$bank->account_name}}"/>
              </p>
            </div>
          </div>
        </div>
        <div class="column is-5">
          <div class="field is-expanded">
            <label class="label">Account Number:</label>
            <div class="field">
              <p class="control is-expanded">
                <input type="text" class="input"  name="account_no" value="{{$bank->account_no}}"/>
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Balance</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="balance" placeholder="Balance" value="{{$bank->balance}}">
              </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Mobile Number</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="mobile" placeholder="Mobile Number" value="{{$bank->mobile}}">
              </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Branch Address</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
            <textarea class="textarea" name="branch" placeholder="Branch Address">{{$bank->branch}}</textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary is-pulled-right" style="width: 250px;">Update Bank</button>
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
