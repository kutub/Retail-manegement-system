@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit {{$role->display_name}}</h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('roles.update', $role->id)}}" method="POST">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Role Details:</h1>
                  <div class="field">
                    <p class="control">
                      <label for="display_name" class="label">Name (Human Readable)</label>
                      <input type="text" class="input" name="display_name" value="{{$role->display_name}}" id="display_name">
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="name" class="label">Slug (Can not be edited)</label>
                      <input type="text" class="input" name="name" value="{{$role->name}}" disabled id="name">
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="description" class="label">Description</label>
                      <input type="text" class="input" value="{{$role->description}}" id="description" name="description">
                    </p>
                  </div>
                  <input type="hidden" :value="permissionsSelected" name="permissions">
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>

      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Permissions:</h1>
               
                    @foreach ($permissions as $permission)
                      <div class="field">
                        <b-checkbox v-model="permissionsSelected" :native-value="{{$permission->id}}">{{$permission->display_name}} <em>({{$permission->description}})</em></b-checkbox>
                      </div>
                    @endforeach
                
                </div>
              </div>
            </article>
          </div> <!-- end of .box -->

          <button class="button is-primary">Save Changes to Role</button>
        </div>
      </div>
    </form>
  </div>
@endsection


@section('scripts')
  <script>

  var app = new Vue({
    el: '#app',
    data: {
      permissionsSelected: {!!$role->permissions->pluck('id')!!}
    }
  });

  </script>
@endsection
