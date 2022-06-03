@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Receive Document</h1>
      </div> <!-- end of column -->

      <div class="column">
        <a href="{{route('receive.edit', [app()->getLocale(), $receive->id])}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i> Edit receive</a>
      </div>
    </div>
    <hr class="m-t-0">
    <div class="columns">
      <div class="column">
          <div id="printMe" class="card" >
              <div class="card-content no-print">
                  <div class="columns">
                      <div class="column">
                          <h4>Money Receipt</h4>
                      </div>
                      <div class="column">
                            <button @click.prevent="printme" type="button" class="btn btn-success pull-right" style="margin-right: 5px;">
                                <i class="fa fa-print"></i> প্রিন্ট করুন 
                            </button>
                      </div>
                  </div>
                   
              </div>
                <div class="card-content">
                    <div class="content has-text-centered">
                        <address>
                            <h4>{{$office[0]->name}}</h4>
                            <p>{{$office[0]->tagline}}</p>
                            <p>{{$office[0]->address}}</p>
                            <p>প্রোপাটরঃ আবু বকরঃ {{$office[0]->mobile_1}}, ম্যানেজারঃ এরফানঃ {{$office[0]->mobile_1}}</p>
                            <p>(Owner Copy)</p>
                        </address>
                    </div>
                    <div class="card-content">
                        <div class="columns" style="padding:10px 0">
                            <div class="column is-8">
                                <p>Date: <span>{{$receive->created_at->toFormattedDateString()}}</span></p>
                            </div>
                            <div class="column is-4">
                            <p>Receive ID#: <span>{{$receive->id}}</span></p>
                            </div>
                        </div>
                        <div class="columns" style="padding:0 12px;">
                            <div class="column " style="border-width:1px;border-style:dashed;padding:20px">
                                <p style="line-height:2em;font-size:1.1em">Payment Received with thanks from Mr/Mrs <strong>{{strtoupper($receive->customer->first_name)}} {{strtoupper($receive->customer->last_name)}} </strong> by <strong>{{$receive->pay_by}}</strong> the amount of 
                                <strong>{{$receive->total}} tk</strong> 0f 
                                <strong>{{$receive->date}}</strong> with balance due 
                                <strong>{{$receive->balance}} tk</strong>.
                                </p>
                            </div>
                        </div>
                        <div class="columns" style="margin-top:10px;">
                            <div class="column">
                                <table class="table is-hoverable is-fullwidth">
                                    <tbody style="text-align:right"> 
                                        <tr>
                                            <td style="padding: 0.55rem !important;">Amount Received</td>
                                            <td style="padding: 0.55rem !important;">{{$receive->total}} tk</td>
                                        </tr>
                                         <tr>
                                            <td style="padding: 0.55rem !important;"> Balance Due</td>
                                            <td style="padding: 0.55rem !important;">0{{$receive->balance}} tk</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="columns" style="margin-top:40px;">
                            <div class="column is-6" style="text-align:center;padding:0 40px;">
                               <p style="border-top:1px solid #000">Signed By Customer</p>
                            </div>
                            <div class="column is-6" style="text-align:center;padding:0 40px;">
                                <p style="border-top:1px solid #000">Signed By Owner</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="content has-text-centered">
                        <address>
                            <h4>{{$office[0]->name}}</h4>
                            <p>{{$office[0]->tagline}}</p>
                            <p>{{$office[0]->address}}</p>
                            <p>প্রোপাটরঃ আবু বকরঃ {{$office[0]->mobile_1}}, ম্যানেজারঃ এরফানঃ {{$office[0]->mobile_1}}</p>
                            <p>(Owner Copy)</p>
                        </address>
                    </div>
                    <div class="card-content">
                        <div class="columns" style="padding:10px 0">
                            <div class="column is-8">
                                <p>Date: <span>{{$receive->created_at->toFormattedDateString()}}</span></p>
                            </div>
                            <div class="column is-4">
                            <p>Receive ID#: <span>{{$receive->id}}</span></p>
                            </div>
                        </div>
                        <div class="columns" style="padding:0 12px;">
                            <div class="column is-12" style="border-width:1px;border-style:dashed;padding:20px">
                                <p style="line-height:2em;font-size:1.1em">Payment Received with thanks from Mr/Mrs <strong>{{strtoupper($receive->customer->first_name)}} {{strtoupper($receive->customer->last_name)}} </strong> the amount of 
                                <strong>{{$receive->total}} tk</strong> of 
                                <strong>{{$receive->date}}</strong> with balance due 
                                <strong>{{$receive->balance}} tk</strong>.
                                </p>
                            </div>
                        </div>
                        <div class="columns" style="margin-top:10px;">
                            <div class="column is-12">
                                <table class="table is-hoverable is-fullwidth">
                                    <tbody style="text-align:right"> 
                                        <tr>
                                            <td style="padding: 0.55rem !important;">Amount Received</td>
                                            <td style="padding: 0.55rem !important;">{{$receive->total}} tk</td>
                                        </tr>
                                         <tr>
                                            <td style="padding: 0.55rem !important;"> Balance Due</td>
                                            <td style="padding: 0.55rem !important;">{{$receive->balance}} tk</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="columns" style="margin-top:40px;">
                            <div class="column is-6" style="text-align:center;padding:0 40px;">
                               <p style="border-top:1px solid #000">Signed By Customer</p>
                            </div>
                            <div class="column is-6" style="text-align:center;padding:0 40px;">
                                <p style="border-top:1px solid #000">Signed By Owner</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <!-- <p><span style="padding-right:80px;">For/Property owner</span> Please pay within due date by .................... not to disconnected your electricity connection. <span style="padding-left:50px;">For/Occupant</span></p> -->
                </div>
          </div>
      </div>
    </div>
  </div>
    
@endsection
