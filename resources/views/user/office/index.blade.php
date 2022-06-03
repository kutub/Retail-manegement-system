@extends('layouts.app')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column is-3">
          <h2 class="title"><strong>{{count($offices)}}</strong> {{__('Offices')}}</h2>
        </div>
        <div class="column is-6">
          {{-- <div class="level-item">
            <div class="field has-addons">
                <p class="control">
                    <input class="input is-primary is-expanded" type="text" placeholder="Find a Office">
                </p>
                <div class="control">
                    <div class="select is-primary">
                      <select>
                        <option>Select a Field</option>
                        <option>With options</option>
                      </select>
                    </div>
                </div>
                <p class="control">
                    <button class="button is-primary">
                    Search
                    </button>
                </p>
            </div>
        </div> --}}
        </div>
        <div class="column is-3">
          <a href="{{route('office.create', app()->getLocale())}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> {{__('Add New Office')}}</a>
        </div>
      </div>
      <hr class="m-t-0">

      <div class="card">
        <div class="card-content">
          <table class="table is-narrow is-fullwidth">
            <thead>
              <tr>
                <th>Id</th>
                <th>Business Name</th>
                <th>Tag Line</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Description</th>
                <th>Logo</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @if (count($offices) > 0)
                @foreach ($offices as $office)
                
                    <tr>
                      <th>{{$office->id}}</th>
                      <td style="text-transform: capitalize">{{$office->name}}</td>
                      <td>{{$office->tagline}}</td>
                      <td>{{$office->email}}</td>
                      <td>{{$office->mobile_1}} {{$office->mobile_2}}</td>
                      <td>{{$office->address}}</td>
                      <td>{{$office->description}}</td>
                      <td>{{$office->image}}</td>
                      <td class="has-text-right"><a class="button is-outlined m-r-5" href="{{url(app()->getLocale().'/home/office/'.$office->id)}}">View</a><a class="button is-light" href="{{url(app()->getLocale().'/home/office/'.$office->id.'/edit')}}">Edit</a></td>
                    </tr>
                  
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div> <!-- end of .card -->

      {{$offices->links()}}
      
    </div>
@endsection
