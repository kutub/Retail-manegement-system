@extends('layouts.app')

@section('content')
    <sales-module></sales-module>
@endsection

@section('scripts')

  <script>
    import store from '../../../store/index'
    var app = new Vue({
      el: '#app',
    });
  </script>
@endsection