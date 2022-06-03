@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New Category<span style="font-size:16px">(Fields in red are required)</span></h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('import.store', app()->getLocale())}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="file has-name is-boxed">
        <label class="file-label">
          <input class="file-input" type="file" name="select_file">
          <span class="file-cta">
            <span class="file-icon">
              <i class="fas fa-upload"></i>
            </span>
            <span class="file-label">
              Choose a file…
            </span>
          </span>
          <span class="file-name">
            Screen Shot 2017-07-29 at 15.54.25.png
          </span>
        </label>
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
                  {{-- @foreach ($suppliers as $key => $value)
              
                    <option value="{{ $key }}"> 
                
                        {{ $value }} 
                
                    </option>
                
                  @endforeach   --}}
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
