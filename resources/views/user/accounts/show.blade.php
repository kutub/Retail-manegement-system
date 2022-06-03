@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Supplier Details Information</h1>
      </div> <!-- end of column -->

      <div class="column">
        <a href="{{route('supplier.edit', $supplier->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i> Edit Supplier</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <div class="field">
          <label for="name" class="label">Name</label>
          <pre>{{$supplier->name}}</pre>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Email</label>
            <pre>{{$supplier->email}}</pre>
          </div>
        </div>
        <div class="field">
          <div class="field">
            <label for="email" class="label">Phone</label>
            <pre>{{$supplier->phone}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">City</label>
            <pre>{{$supplier->city}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Country</label>
            <pre>{{$supplier->country}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Account No.</label>
            <pre>{{$supplier->account_no}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Address</label>
            <pre>{{$supplier->address}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Opening Balance</label>
            <pre>{{$supplier->opening_balance}}</pre>
          </div>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Created Date</label>
            <pre>{{$supplier->created_at->toFormattedDateString()}}</pre>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
