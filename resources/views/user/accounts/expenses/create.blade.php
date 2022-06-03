@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">
          Expense Information <span style="font-size:16px">(Fields in red are required)</span></h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('expense.store', app()->getLocale())}}" method="POST">
      {{csrf_field()}}
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Date</label>
        </div>
        <div class="field-body">
          
          <div class="field">
          <input type="hidden" name="date" :value="date" />
          <b-field>
              <b-datepicker
                  v-model="date"
                  placeholder="Click to select..."
                  icon="calendar-today"
                  trap-focus>
              </b-datepicker>
          </b-field>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Amount</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="total" placeholder="Total" value="0.00">
              </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Tax</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="tax" placeholder="Total" value="0.00">
              </p>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Description</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <textarea class="textarea" name="description" rows="1" placeholder="Description"></textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="columns">
        <div class="column is-2"></div>
        <div class="column is-5 p-l-30">
          <div class="field is-expanded">
            <label class="label">Expenses Head:</label>
            <div class="control is-expanded">
              <div class="select ">
                <select name="expense_head">
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
        <div class="field-label is-normal"><label class="label">Category Name:</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <div class="select is-expanded">
                  <select name="expense_category_id" class="is-expanded">
                    <option value="1">Select dropdown</option>
                    <option value="2">With options</option>
                  </select>
                </div>
              </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Recipient Name:</label>
        </div>
        <div class="field-body">
          <div class="field is-narrow ">
            <div class="control ">
              <div class="select is-fullwidth">
                <select name="receipient_name" class="is-expanded">
                  <option>Business development</option>
                  <option>Marketing</option>
                  <option>Sales</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Approved by:</label>
        </div>
        <div class="field-body">
          <div class="field is-narrow ">
            <div class="control ">
              <div class="select is-fullwidth">
                <select name="approved_by" class="is-expanded">
                  <option>Business development</option>
                  <option>Marketing</option>
                  <option>Sales</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
            
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Expenses Note:</label>
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
          <button type="submit"class="button is-primary is-pulled-right" style="width: 250px;">New Expense</button>
        </div>
      </div>
    </form>
  </div> <!-- end of .flex-container -->
@endsection
