@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Bank Information <span style="font-size:16px">(Fields in red are required)</span></h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('bank.store', app()->getLocale())}}" method="POST">
      {{csrf_field()}}
      
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Bank Name</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="name" placeholder="Bank Name" >
              </p>
          </div>
        </div>
      </div>
      
      <div class="columns">
        <div class="column is-2"></div>
        <div class="column is-5 p-l-30">
          <div class="field is-expanded">
            <label class="label">Account Name:</label>
            <div class="control ">
              <input class="input" type="text" name="account_name" placeholder="Account Name">
            </div>
          </div>
        </div>
        <div class="column is-5">
          <div class="field is-expanded">
            <label class="label">Account Number:</label>
            <div class="control ">
              <input class="input" type="number" name="account_no" placeholder="Account Number">
            </div>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal"></div>
        <div class="field-body">
          <div class="field is-expanded">
            <label class="label">Opening Balance</label>
              <p class="control is-expanded">
                <input class="input" type="text" name="balance" placeholder="Opening Balance" value="0.00">
              </p>
          </div>
          <div class="field is-expanded">
            <label class="label">Mobile No.</label>
            <p class="control is-expanded">
              <input class="input" type="text" name="mobile" placeholder="Mobile Number" >
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
              <textarea class="textarea" name="branch" placeholder="Branch Address"></textarea>
            </div>
          </div>
        </div>
      </div>
        
      <div class="columns">
        <div class="column">
          <hr />
          <button type="submit"class="button is-primary is-pulled-right" style="width: 250px;">Save New Bank</button>
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
                
            }
        },
        computed: {
            
        },
        methods: {
          
        },
    });
  </script>
@endsection
