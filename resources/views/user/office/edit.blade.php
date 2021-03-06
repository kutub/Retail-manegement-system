@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit Supplier Information</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('office.update', [app()->getLocale(), $office->id])}}" method="POST" enctype="multipart/form-data">
      {{method_field('PUT')}}
      {{csrf_field()}}
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">{{__('Name')}}:</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded ">
              <input class="input is-danger" type="text" placeholder="Business Name" name="name" value="{{$office->name}}" required>
            </p>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label is-denger">{{__('Mobile 1 & 2')}}</label></div>
        <div class="field-body">
          <div class="field is-expanded">
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  +88
                </a>
              </p>
              <p class="control is-expanded">
                <input class="input" type="tel" name="mobile_1" placeholder="Mobile 1" value="{{$office->mobile_1}}">
              </p>
            </div>
          </div>
          <div class="field is-expanded">
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  +88
                </a>
              </p>
              <p class="control is-expanded">
                <input class="input" type="tel" name="mobile_2" placeholder="Mobile 2" value="{{$office->mobile_2}}">
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">{{__('Tagline')}}:</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input type="text" class="input" name="tagline" placeholder="Tagline" value="{{$office->tagline}}"> 
            </div>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Language Type:</label>
        </div>
        <div class="field-body">
          <div class="field is-narrow">
            <div class="control is-expanded">
              <div class="select is-fullwidth">
                <select name="lang">
                  <option value="{{$office->lang}}">{{$office->lang}}</option>
                  <option value="bn">BN</option>
                  <option value="en">EN</option>
                </select>
              </div>
            </div>
          </div>
          <div class="field">
            <div class="control is-expanded">
              <input type="email" class="input" name="email" placeholder="Email Address" value="{{$office->email}}">
            </div>
          </div>
        </div>
      </div>
           
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Address:</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input type="text" class="input" name="address" placeholder="Address" value="{{$office->address}}">
            </div>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Logo:</label>
        </div>
        <div class="field-body">
          <div class="file is-boxed">
            <label class="file-label">
              <input class="file-input" type="file" name="image">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Choose a file???
                </span>
              </span>
            </label>
          </div>
         
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Description</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
            <textarea class="textarea" name="description" placeholder="Description type here..">{{$office->description}}</textarea>
            </div>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Special Quote:</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input type="text" class="input" name="note" placeholder="Special Quote" value="{{$office->note}}">
            </div>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label ">
          <label class="label"></label>
        </div>
        <input type="hidden" name="isTagline" :value="isTagline" />
        <div class="field-body">
          <div class="field is-normal">
            <b-checkbox v-model="isTagline" true-value="1"
            false-value="0">{{__('Show Tagline')}}</b-checkbox>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label ">
          <label class="label"></label>
        </div>
        <input type="hidden" name="isNote" :value="isNote" />
        <div class="field-body">
          <div class="field is-normal">
            <b-checkbox v-model="isNote" true-value="1"
            false-value="0">{{__('Show Special Quote')}}</b-checkbox>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label ">
          <label class="label"></label>
        </div>
        <input type="hidden" name="isDescription" :value="isDescription" />
        <div class="field-body">
          <div class="field is-normal">
            <b-checkbox v-model="isDescription" true-value="1"
          false-value="0">{{__('Show Description')}}</b-checkbox>
          </div>
        </div>
      </div>
       
      <div class="columns">
        <div class="column">
          <hr />
          <button type="submit"class="button is-primary is-pulled-right" style="width: 250px;">{{__('Add New Office')}}</button>
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
        isTagline: {!! $office->isTagline !!},
        isDescription:{!! $office->isDescription !!},
        isNote:{!! $office->isNote !!},
        file:null,
      },
    });

  </script>
@endsection
