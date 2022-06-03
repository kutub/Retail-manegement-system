@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Customer Information <span style="font-size:16px">(Fields in red are required)</span></h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('customer.store')}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Name:</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded ">
              <input class="input is-danger" type="text" placeholder="First Name" name="first_name" required>
            </p>
          </div>
          <div class="field">
            <p class="control is-expanded ">
              <input class="input " type="text" placeholder="Last Name" name="last_name" >
            </p>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label is-denger">Phone & Email</label></div>
        <div class="field-body">
          <div class="field is-expanded">
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  +88
                </a>
              </p>
              <p class="control is-expanded">
                <input class="input" type="tel" name="mobile" placeholder="phone number">
              </p>
            </div>
          </div>
          <div class="field">
            <p class="control is-expanded ">
              <input class="input " type="email" placeholder="text" name="email" value="company@example.com">
            </p>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Customer Type:</label>
        </div>
        <div class="field-body">
          <div class="field is-narrow">
            <div class="control">
              <div class="select is-fullwidth">
                <select name="status">
                  <option value="Manufacturers and Vendors">Manufacturers and Vendors</option>
                  <option value="Wholesalers and Distributors">Wholesalers and Distributors</option>
                  <option value="Affiliate Merchants">Affiliate Merchants</option>
                  <option value="Franchisor">Franchisors  </option>
                  <option value="Dropshippers ">Dropshippers </option>
                  <option value="Importer">Importer</option>
                  <option value="Independent crafts people">Independent crafts people</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">City State Country Zip</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded">
              <input class="input" type="text" placeholder="City" name="city">
            </p>
          </div>
          <div class="field">
            <p class="control is-expanded">
              <input class="input " type="text" placeholder="State/Area" name="state">
            </p>
          </div>
          <div class="field">
            <p class="control is-expanded">
              <input class="input " type="text" placeholder="Country" name="country">
            </p>
          </div>
          <div class="field">
            <p class="control is-expanded">
              <input class="input " type="text" placeholder="Zip Code" name="zip">
            </p>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Address 1:</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input type="text" class="input" name="address_1" placeholder="Address 1">
            </div>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Address 2:</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input type="text" class="input" name="address_2" placeholder="Address 2">
            </div>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Image:</label>
        </div>
        <div class="field-body">
          <div class="file is-boxed">
            <label class="file-label">
              <input class="file-input" type="file" name="image">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Choose a file…
                </span>
              </span>
            </label>
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
              <textarea class="textarea" name="comments" placeholder="Comments type here.."></textarea>
            </div>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Balance & Credit Limit</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="balance" placeholder="Balance" value="0.00">
              </p>
          </div>
          <div class="field is-expanded">
            <p class="control is-expanded">
              <input class="input" type="text" name="credit_limit" placeholder="Credit Limit">
            </p>
        </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Account & Bkash No.</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="account" placeholder="Account number">
              </p>
          </div>
          <div class="field is-expanded">
            <p class="control is-expanded">
              <input class="input" type="text" name="bkash_number" placeholder="Bkash number">
            </p>
        </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Amount to spend for next point:</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input type="text" class="input" name="amount_for_next_point" placeholder="Amount to spend for next point">
            </div>
          </div>
        </div>
      </div>

      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Test & Tier Name:</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded ">
              <input class="input" type="text" placeholder="Test" name="test">
            </p>
          </div>
          <div class="field">
            <p class="control is-expanded ">
              <input class="input" type="text" placeholder="Tier Name" name="tier_name" >
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Percentage & Points:</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded ">
              <input class="input" type="text" placeholder="Percentage" name="percentage">
            </p>
          </div>
          <div class="field">
            <p class="control is-expanded ">
              <input class="input" type="text" placeholder="Points" name="points">
            </p>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label ">
          <label class="label">Disable Loyalty</label>
        </div>
        <input type="hidden" name="disable_loyalty" :value="disable_loyalty" />
        <div class="field-body">
          <div class="field is-normal">
            <b-checkbox v-model="disable_loyalty" true-value="1"
            false-value="0">Disable Loyalty</b-checkbox>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label ">
          <label class="label">Override Tax</label>
        </div>
        <input type="hidden" name="override_tax" :value="override_tax" />
        <div class="field-body">
          <div class="field is-normal">
            <b-checkbox v-model="override_tax" true-value="1"
            false-value="0">Override Tax</b-checkbox>
          </div>
        </div>
      </div>

      <div class="field is-horizontal" v-if="!override_tax">
        <div class="field-label ">
          <label class="label">Taxable</label>
        </div>
        <input type="hidden" name="taxable" :value="taxable" />
        <div class="field-body">
          <div class="field is-normal">
            <b-checkbox v-model="taxable" true-value="1"
            false-value="0">taxable</b-checkbox>
          </div>
        </div>
      </div>

      <div class="field is-horizontal" v-if="!taxable">
        <div class="field-label ">
          <label class="label">Non Tax Certificate No</label>
        </div>
        <div class="field-body">
          <div class="field is-normal">
            <input class="input" type="text" placeholder="Non Tax Certificate Number" name="non_tax_certificate_no">
          </div>
        </div>
      </div>
       
      <div class="columns">
        <div class="column">
          <hr />
          <button type="submit"class="button is-primary is-pulled-right" style="width: 250px;">Add New Customer</button>
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
        taxable: 1,
        disable_loyalty:0,
        override_tax:0,
        file:null,
      },
     
    });
  </script>
@endsection
