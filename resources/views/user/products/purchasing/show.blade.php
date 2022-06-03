@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Category Details Information</h1>
      </div> <!-- end of column -->

      <div class="column">
        <a href="{{route('category.edit', $category->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i> Edit Category</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <div class="field">
          <label for="name" class="label">Category Name</label>
          <pre>{{$category->name}}</pre>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Suupiler Id</label>
            <pre>{{$category->supplier_id}}</pre>
          </div>
        </div>
        
        <div class="field">
          <div class="field">
            <label for="email" class="label">Created Date</label>
            <pre>{{$category->created_at->toFormattedDateString()}}</pre>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
