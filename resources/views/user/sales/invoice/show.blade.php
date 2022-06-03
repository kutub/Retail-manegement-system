@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Customer Details Information</h1>
      </div> <!-- end of column -->

      <div class="column">
        <a href="{{route('customer.edit', $customer->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i> Edit Customer</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <div class="field">
          <label for="name" class="label">Name</label>
          <pre>{{$customer->first_name}}</pre>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Email</label>
            <pre>{{$customer->email}}</pre>
          </div>
        </div>
        <div class="field">
          <div class="field">
            <label for="email" class="label">Phone</label>
            <pre>{{$customer->mobile}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">City</label>
            <pre>{{$customer->city}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Country</label>
            <pre>{{$customer->country}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Account No.</label>
            <pre>{{$customer->account_no}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Address</label>
            <pre>{{$customer->address}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Opening Balance</label>
            <pre>{{$customer->balance}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Created Date</label>
            <pre>{{$customer->created_at->toFormattedDateString()}}</pre>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
