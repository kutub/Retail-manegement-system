@extends('layouts.app')

@section('content')
  <div class="flex-container">
    
    <div class="columns">
      <div class="column">

        <div class="box">
          <article class="media">
            <div class="media-left">
              <figure class="image is-128x128">
                <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>{{$customer->first_name}} {{$customer->last_name}}</strong> <span class="m-l-10 tag is-link">{{$customer->status}}</span>
                  <hr style="margin-top:0.8rem; margin-bottom:0.6rem">
                  <span><i class="fa fa-phone"></i></span> <span>{{$customer->mobile}}</span>
                  <br>
                  <span><i class="fa fa-envelope"></i></span> <span>{{$customer->email}}</span>
                  <br>
                  <span><i style="font-size: 1.3rem" class="fa fa-map-marker"></i></span> <span>{{$customer->address_1}}</span>
                </p>
                <a href="{{url(app()->getLocale().'/home/customer/'.$customer->id.'/edit')}}" class="button is-primary is-pulled-right"><i class="fa fa-pencil m-r-10"></i> Edit</a>
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
                <customer-payment></customer-payment>
                <customer-history></customer-history>
              </div>
            </div>
          </article>
        </div>
        
      </div>
    </div>
@endsection

