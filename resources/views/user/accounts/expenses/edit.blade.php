@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit receive Information</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('expense.update', [app()->getLocale(), $expense->id])}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Date</label>
        </div>
        <div class="field-body">
          
          <div class="field">
            <input type="text" name="date" class="input" value="{{$expense->date}}" />
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
              <input class="input" type="text" name="total" placeholder="Total" value="{{$expense->total}}">
              </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Tax</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="tax" placeholder="Total" value="{{$expense->tax}}">
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
            <textarea class="textarea" name="description" rows="1" placeholder="Description">{{$expense->description}}</textarea>
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
                  <option value="{{$expense->expense_head}}">{{$expense->expense_head}}</option>
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
                  <option value="{{$expense->account_head}}">{{$expense->account_head}}</option>
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
                    <option value="{{$expense->expense_category_id}}">{{$expense->expense_category_id}}</option>
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
                  <option value="{{$expense->receipient_name}}">{{$expense->receipient_name}}</option>
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
                  <option value="{{$expense->approved_by}}">{{$expense->approved_by}}</option>
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
              <textarea class="textarea" name="comments" placeholder="Comments">{{$expense->comments}}</textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary is-pulled-right" style="width: 250px;">Update expense</button>
        </div>
      </div>
    </form>

  </div> <!-- end of .flex-container -->
@endsection


@section('scripts')
  <script>

    var app = new Vue({
      el: '#app',
      data() {
            return {
              date: {!! $expense->date !!),
            }
        },
    });

  </script>
@endsection
