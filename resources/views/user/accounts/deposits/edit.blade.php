@extends('layouts.app')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">{{__('Edit Deposit Information')}}</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('deposit.update', [app()->getLocale(), $deposit->id])}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label is-denger">{{__('Deposited By')}}</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded">
              <input type="text" class="input"  name="deposit_by" value="{{$deposit->deposit_by}}"/>
            </p>
          </div>
        </div>
      </div>
      
      <div class="columns">
        <div class="column is-2"></div>
        <div class="column is-5 p-l-30">
          <div class="field is-expanded">
            <label class="label">{{__('Deposit Head')}}:</label>
            <div class="control is-expanded">
              <input type="text" class="input"  name="deposit_head" value="{{$deposit->deposit_head}}"/>
            </div>
          </div>
        </div>
        <div class="column is-5">
          <div class="field">
            <label class="label">{{__('Account Name')}}:</label>
            <div class="control">
              <div class="select ">
                <select class="is-expanded" name="bank_id">
                  <option value="{{ $deposit->bank_id }}"> 
                
                    {{ $deposit->bank_id }} 
            
                  </option>
                  @foreach ($banks as $key => $value)
              
                    <option value="{{ $key }}"> 
                
                        {{ $value }} 
                
                    </option>
                
                  @endforeach  
                </select>
                 
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal"><label class="label">{{__('Total')}}</label></div>
        <div class="field-body">
          <div class="field is-expanded">
              <p class="control is-expanded">
                <input class="input" type="text" name="total" placeholder="Total" value="{{$deposit->total}}">
              </p>
          </div>
        </div>
      </div>
      
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Comments</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
            <textarea class="textarea" name="comments" placeholder="Comments">{{$deposit->comments}}</textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary is-pulled-right" style="width: 250px;">{{__('Update deposit')}}</button>
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
        
      }
    });

  </script>
@endsection
