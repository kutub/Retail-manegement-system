@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Supplier Information <span style="font-size:16px">(Fields in red are required)</span></h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('supplier.store')}}" method="POST">
      {{csrf_field()}}

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Name & Email</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded has-icons-left">
              <input class="input is-danger" type="text" placeholder="Name of company" name="name" required>
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <p class="control is-expanded has-icons-left">
              <input class="input " type="email" placeholder="Email" name="email" value="company@example.com">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
            </p>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label is-denger">Phone Number</label></div>
        <div class="field-body">
          <div class="field is-expanded">
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  +88
                </a>
              </p>
              <p class="control is-expanded">
                <input class="input" type="tel" name="phone" placeholder="Company phone number">
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Supplier Type:</label>
        </div>
        <div class="field-body">
          <div class="field is-narrow">
            <div class="control">
              <div class="select is-fullwidth">
                <select>
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
          <label class="label is-denger">City & Country</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded">
              <input class="input" type="text" placeholder="Name of company" name="city">
            </p>
          </div>
          <div class="field">
            <p class="control is-expanded">
              <input class="input " type="text" placeholder="Country" name="country">
            </p>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Address</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <textarea class="textarea" name="address" placeholder="Company Address"></textarea>
            </div>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Account No#</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="account_no" placeholder="Company account number">
              </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Store Opening Balance </label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="opening_balance" placeholder="Opening Balance" value="0.00">
              </p>
          </div>
        </div>
      </div>
        
      <div class="columns">
        <div class="column">
          <hr />
          <button type="submit"class="button is-primary is-pulled-right" style="width: 250px;">Create New Supplier</button>
        </div>
      </div>
    </form>
  </div> <!-- end of .flex-container -->
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
    //   data: {
    //     auto_password: true,
    //     rolesSelected: {!! old('roles') ? old('roles') : '[]' !!}
    //   }
    });
  </script>
@endsection
