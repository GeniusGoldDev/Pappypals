@extends('share.default')
@section('title', 'Reset Password')
@section('id', 'Reset Password')
@section('content')
@include('partial.header_logo')
<div class="container-fluid slider_section mt-1 " style="min-height: 300px; margin: 80px 0 0 0;">
  <div class="centered-form pull-down">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
      <div class="panel panel-default">

<div class="form-group{{ $errors->has('email') ? ' has-error': ''}} email">
<div class="panel-heading">
  <h3 class="panel-title">{{Lang::get('app.reset_pass')}}</h3>
  </div>
<div class="panel-body">
    @if (session('status'))
      <div class="alert alert-success">
             {{ session('status') }}
      </div>
    @endif

    @if (count($errors) > 0)
       <div class="alert alert-danger">
       <strong>Whoops!</strong> There were some problems with your input.<br><br>
       <ul>
           @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
           @endforeach
        </ul>
        </div>
      @endif

<form class="form-horizontal" role="form" method="POST" action="password/email">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<input type="email" id="email" class="form-control input-lg" placeholder="{{Lang::get('app.change_mail')}}" name="email" value="{{ old('email') }}">

<br>
  <input type="submit" class="btn btn-info btn-block input-lg" value="{{Lang::get('app.send')}}">


</form>

</div>
</div>
</div>
</div>
</div>
</div>

@endsection