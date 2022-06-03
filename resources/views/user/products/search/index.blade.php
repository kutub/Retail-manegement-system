@extends('layouts.app')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <!-- Main container -->
            <nav class="level">
                <!-- Left side -->
                <div class="level-left">
                <div class="level-item">
                    <p class="subtitle is-5">
                    <strong>{{count($products)}}</strong> Products
                    </p>
                </div>
                <form action="{{url(app()->getLocale().'/home/items/search')}}" method="POST">
                  {{csrf_field()}}
                  <div class="level-item">
                      <div class="field has-addons">
                          <p class="control">
                            <input  name="name" class="input is-primary" type="text" placeholder="Find a Product">
                          </p>
                          <div class="control">
                              <div class="select is-primary">
                                <select name="category_id">
                                  <option>Select Category</option>
                                  @foreach ($categories as $key => $value)
                              
                                    <option value="{{ $key }}"> 
                                
                                        {{ $value }} 
                                
                                    </option>
                                
                                  @endforeach  
                                </select>
                              </div>
                          </div>
                          <p class="control">
                              <button type="submit" class="button is-primary">
                              Search
                              </button>
                          </p>
                      </div>
                  </div>
                </form>
                </div>
            
                <!-- Right side -->
                <div class="level-right">
              
                    <a href="{{route('product.create', app()->getLocale())}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Product</a>
                </div>
            </nav>
        </div>
      </div>
      <hr class="m-t-0">

      <div class="card">
        <div class="card-content">
          <table class="table is-narrow is-fullwidth">
            <thead>
              <tr>
                <th>ID#</th>
                <th>Brand Name</th>
                <th>Generic Name</th>
                <th>Category Name</th>
                <th>Cost Price</th>
                <th>Selling Price</th>
                <th>Created Date</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($products as $product)
                <tr>
                  <th>{{$product->id}}</th>
                  <td>{{$product->name}}</td>
                  <td>{{$product->generic}}</td>
                  <td>{{$product->category->name}}</td>
                  @if ($product->pricing)
                    <td>{{$product->pricing->cost_price}}</td>
                    <td>{{$product->pricing->selling_price}}</td>
                  @else
                    <td></td>
                    <td></td>
                  @endif
                  <td>{{$product->created_at->toFormattedDateString()}}</td>                  
                  <td class="has-text-right">
                    <div class="navbar-item has-dropdown is-hoverable" >
                      <a class="navbar-link">
                        edit
                      </a>
              
                      <div class="navbar-dropdown has-text-right" style="width: 55px">
                        <a class="navbar-item button" style="padding: 0.5rem 0.5rem" href="{{url(app()->getLocale().'/home/product/'.$product->id.'/edit?form=0')}}">
                          Item
                        </a>
                        <a class="navbar-item button" style="padding: 0.5rem 0.5rem" href="{{url(app()->getLocale().'/home/product/'.$product->id.'/edit?form=2')}}">
                          Price
                        </a>
                        <a class="navbar-item button" style="padding: 0.5rem 0.5rem" href="{{url(app()->getLocale().'/home/product/'.$product->id.'/edit?form=3')}}">
                          Stock
                        </a>
                        <a class="navbar-item button" style="padding: 0.5rem 0.5rem" href="{{url(app()->getLocale().'/home/product/'.$product->id.'/edit?form=4')}}">
                          Image
                        </a>
                        <a class="navbar-item button" style="padding: 0.5rem 0.5rem" href="{{url(app()->getLocale().'/home/product/'.$product->id.'/edit?form=5')}}">
                          Location
                        </a>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div> <!-- end of .card -->
      
    </div>
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