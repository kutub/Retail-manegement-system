@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit Supplier Information</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('supplier.update', $supplier->id)}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Name & Email</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded has-icons-left">
            <input class="input" type="text" name="name" value="{{$supplier->name}}" required>
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <p class="control is-expanded has-icons-left">
              <input class="input " type="email" name="email" value="{{$supplier->email}}">
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
                <input class="input" type="tel" name="phone" value="{{$supplier->phone}}">
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
                <option value="{{$supplier->city}}">{{$supplier->city}}</option>
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
              <input class="input" type="text" value="{{$supplier->city}}" name="city">
            </p>
          </div>
          <div class="field">
            <p class="control is-expanded">
              <input class="input " type="text" value="{{$supplier->country}}" name="country">
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
              <textarea class="textarea" name="address" value="{{$supplier->address}}"></textarea>
            </div>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Account No#</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="account_no" value="{{$supplier->account_no}}">
              </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">Store Opening Balance </label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="opening_balance" value="{{$supplier->opening_balance}}" value="0.00">
              </p>
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary is-pulled-right" style="width: 250px;">Update Supplier</button>
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
