@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit Category Information</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('category.update', $category->id)}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Category Name</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded has-icons-left">
            <input class="input is-danger" type="text" value="{{$category->name}}" name="name" required>
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
            </p>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Select Supplier</label>
        </div>
        <div class="field-body">
          <div class="field is-narrow">
            <div class="control">
              <div class="select is-fullwidth">
                <select name="supplier_id">
                  <option>Select Supplier</option>
                  @foreach ($suppliers as $key => $value)
                    <option value="{{ $key }}" {{ ($category->supplier_id == $key ? "selected":"") }}> 
                
                        {{ $value }} 
                
                    </option>
                
                  @endforeach  
                </select>
                 
              </div>
            </div>
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
