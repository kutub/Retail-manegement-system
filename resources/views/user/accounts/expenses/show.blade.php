@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">{{__('Expense Information')}}</h1>
      </div> <!-- end of column -->

      <div class="column">
        {{-- <a href="{{route('expense.edit', $expense->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i> Edit receive</a> --}}
      </div>
    </div>
    <hr class="m-t-0">

    <div class="colunms">
      <div class="column is-12">
          <div class="card">
              <div class="card-header">
                  Print Payment expenses
              </div>
              <div class="card-content">
                  <button @click.prevent="print" class="btn btn-outline-info btn-icon-text pull-right">Print <i class="mdi mdi-printer btn-icon-append"></i></button>
              </div>
          </div>
      </div>
  </div>
  <div class="colunms">
    <div class="column">
        
        <div id="printMe" class="card">
              <div class="card-content">
                  <div class="card-header" style="text-align:center">
                      <address class="text-center">
                      {{-- <h4>{{$expenses.building_name}}</h4>
                      <p>{{$expenses.address}}. Mobile: {{$expenses.mobile}}</p> --}}
                  </address>
                  </div>
                  <div class="card-content">
                      <div class="colunms">
                          <div class="column">
                              <p>Date: <span>{{$expense->created_at->toFormattedDateString()}}</span></p>
                          </div>
                          <div class="column">
                              <p>Voucher #: <span>{{$expense->id}}</span></p>
                          </div>
                      </div>
                      <div class="colunms" style="padding:0 12px;">
                          <div class="column" style="border-width:1px;border-style:dashed;padding:20px">
                              <p style="line-height:2em;font-size:1.1em;">Expense Head : <strong style="border-bottom:1px solid #333;min-width:100%">{{$expense->expense_head}}</strong></p> 
                             <p style="line-height:2em;font-size:1.1em">Pay to : <strong style="border-bottom:1px solid #333;min-width:100%">{{$expense->receipient_name}}</strong></p> 
                             <p style="line-height:2em;font-size:1.1em">Being the Amount Paid: <strong style="border-bottom:1px solid #333;min-width:100%">{{$expense->total}}</strong></p> 
                          </div>
                      </div>
                      <div class="colunms" style="margin-top:10px;">
                          <div class="column">
                              <table class="table is-hoverable is-fullwidth">
                                  <tbody style="text-align:right"> 
                                      
                                      <tr>
                                          <td style="padding: 0.55rem !important;">Payment Total</td>
                                          <td style="padding: 0.55rem !important;">{{$expense->total}}</td>
                                      </tr>
                                       
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <div class="columns has-text-centered" style="margin-top:40px;">
                        <div class="column">
                          <p style="border-top:1px solid #000">Signed By Manager</p>
                        </div>
                        <div class="column">
                          <p style="border-top:1px solid #000">Signed By Owner</p>
                        </div>
                        <div class="column">
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
