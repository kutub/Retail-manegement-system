@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Receive Information <span style="font-size:16px">(Fields in red are required)</span></h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('receive.store', app()->getLocale(),)}}" method="POST">
      {{csrf_field()}}
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Receive From</label>
        </div>
        <div class="field-body">
          <div class="field">
            <input type="hidden" name="customer_id"  :value="customer_id"/>
            <customer-payment @get-id="customerId" ></customer-payment>
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
                <input class="input" type="text" name="total" placeholder="Total" value="0.00">
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
              <textarea class="textarea" name="comments" placeholder="Comments"></textarea>
            </div>
          </div>
        </div>
      </div>
        
      <div class="columns">
        <div class="column">
          <hr />
          <button type="submit"class="button is-primary is-pulled-right" style="width: 250px;">Save</button>
        </div>
      </div>
    </form>
  </div> <!-- end of .flex-container -->
@endsection

{{-- @section('scripts')
  <script>

    var app = new Vue({
      data() {
            return {
              customer_id: !!selected
            }
        },
        
        methods: {
          
    });
  </script>
@endsection --}}
