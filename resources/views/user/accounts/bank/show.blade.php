@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Bank Details Information</h1>
      </div> <!-- end of column -->

      <div class="column">
        <a href="{{route('bank.edit', [app()->getLocale(), $bank->id])}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i> Edit bank</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <div class="field">
          <label for="name" class="label">{{__('Bank Name')}}</label>
          <pre>{{$bank->name}}</pre>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">{{__('Account Name')}}</label>
            <pre>{{$bank->account_name}}</pre>
          </div>
        </div>
        <div class="field">
          <div class="field">
            <label for="email" class="label">{{('Mobile')}}</label>
            <pre>{{$bank->mobile}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">{{__('Account Number')}}</label>
            <pre>{{$bank->account_no}}</pre>
          </div>
        </div>

        <div class="field">
            <div class="field">
              <label for="email" class="label">Balance</label>
              <pre>{{$bank->balance}}</pre>
            </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Address</label>
            <pre>{{$bank->branch}}</pre>
          </div>
        </div>

   

        <div class="field">
          <div class="field">
            <label for="email" class="label">Created Date</label>
            <pre>{{$bank->created_at->toFormattedDateString()}}</pre>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection
