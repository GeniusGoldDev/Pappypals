@extends('share.default')
@section('title', 'Dashbord')
@section('id', 'dashbord')
@section('content')
@include('adminpanel.partial.header')
<main class="adminpanel">
  <div class="col-md-2">
    @include('adminpanel.partial.navigation')
  </div>
  <div class="col-md-10">
    aktivites
  </div>
</main>
@endsection
