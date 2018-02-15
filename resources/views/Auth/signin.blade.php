@extends('share.default')
@section('title', 'Signin')
@section('id', 'Signin')
@section('content')
@include('partial.header_logo')
<div class="container-fluid slider_section mt-1 " style="min-height: 500px; margin: 120px 0 0 0;">
  <div class="centered-form pull-down">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>{{Lang::get('app.login')}}</h2>
        </div>
        <div class="panel-body" id="signin">
          <form role="form" method="post" id="signin-form" action="{{ url('/signin') }}">
            <div class="form-group{{ $errors->has('email') ? ' has-error': ''}} email">
              <input type="text" name="email" id="email" class="form-control input-lg" placeholder="{{Lang::get('app.email')}}">
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error': ''}} password">
              <input type="password" name="password" id="password" class="form-control input-lg" placeholder="{{Lang::get('app.password')}}">
            </div>

            <input type="submit" value="{{Lang::get('app.login')}}" class="btn btn-info btn-block input-lg">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
          </form>
       </div>
      <div class="panel-heading">  
       <h3 class="panel-title">{{Lang::get('app.forgot_pass')}} <a style="color:#f00267;" href="{{ url('ForgotPassword') }}"><span> {{Lang::get('app.click_here')}}</span></a></h3>   
      </div>
      <div class="panel-heading border_top">  
        <h3 class="panel-title">{{ Lang::get('app.dont_have_account?') }} <a href="{{ url('/signup') }}"> <span>{{Lang::get('app.register_here')}}</span>!</a></h3>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection

