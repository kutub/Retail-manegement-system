@extends('layouts.app')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">{{__('Manage Categories')}}</h1>
        </div>
        <div class="column">
          <a href="{{route('category.create', app()->getLocale(),)}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> {{__('Add New Category')}}</a>
        </div>
      </div>
      <hr class="m-t-0">

      <div class="card">
        <div class="card-content">
          <table class="table is-narrow is-fullwidth">
            <thead>
              <tr>
                <th>ID#</th>
                <th>Category Name</th>
                <th>Supplier ID#</th>
                <th>Created Date</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($categories as $category)
                <tr>
                  <th>{{$category->id}}</th>
                  <td>{{$category->name}}</td>
                  <td>{{$category->supplier_id}}</td>
                  <td>{{$category->created_at->toFormattedDateString()}}</td>                  
                  <td class="has-text-right"><a class="button is-outlined m-r-5" href="{{url(app()->getLocale().'/home/category/'.$category->id)}}">View</a><a class="button is-light" href="{{route('category.edit', [app()->getLocale(), $category->id])}}">Edit</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div> <!-- end of .card -->

      {{$categories->links()}}
      
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