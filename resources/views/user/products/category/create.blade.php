@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New Category<span style="font-size:16px">(Fields in red are required)</span></h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('category.store', app()->getLocale())}}" method="POST">
      {{csrf_field()}}

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">Category Name</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded has-icons-left">
              <input class="input is-danger" type="text" placeholder="Name of Category" name="name" required>
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
                  <option selected>Select Supplier</option>
                  @foreach ($suppliers as $key => $value)
              
                    <option value="{{ $key }}"> 
                
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
          <button type="submit"class="button is-primary is-pulled-right" style="width: 250px;">Save New Category</button>
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
