@extends('share.default')
@section('title', 'Signup')
@section('id', 'Signup')
@section('content')
@include('partial.header_logo')

<div class="header-banner">
  <div class="container">
    <div class="topTitle col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-3">
        <h2>{{Lang::get('app.start_trial_period')}}</h2>
        <ul>
         <li><span class="fa fa-check-square-o"></span> {{Lang::get('app.text_1_signup')}}</li>
          <li><span class="fa fa-check-square-o"></span> {{Lang::get('app.text_2_signup')}}</li>
          <li><span class="fa fa-check-square-o"></span> {{Lang::get('app.text_3_signup')}} </li>
          <li><span class="fa fa-check-square-o"></span> {{Lang::get('app.text_4_signup')}} </li>
          <li><span class="fa fa-check-square-o"></span> {{Lang::get('app.cancel_anytime')}}</li>
        </ul>
    </div>
  </div>
</div>
<div class="container-fluid slider_section">
  <div class="centered-form pull-down mt-1">
    <div class="col-xs-12 col-sm-8 col-md-5 col-sm-offset-2 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading top_from_titl">
          <h4>{{Lang::get('app.register_with_email')}}</h4>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="{{ url('/signup') }}">
            <div class="form-group{{ $errors->has('first_name') ? ' has-error': ''}}">
              <input type="text" name="first_name" id="first_name" class="form-control input-lg floatlabel" placeholder="{{Lang::get('app.name')}} ">
              @if($errors->has('first_name'))
              <span class="help-block">{{ $errors->first('first_name') }}</span>
              @endif
            </div>
            
            <div class="form-group{{ $errors->has('last_name') ? ' has-error': ''}} ">
              <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="{{Lang::get('app.surname')}}">
              @if($errors->has('last_name'))
              <span class="help-block">{{ $errors->first('last_name') }}</span>
              @endif
            </div>
          
            <div class="form-group{{ $errors->has('email') ? ' has-error': ''}} ">
              <input type="email" name="email" id="email" class="form-control input-lg" placeholder="{{Lang::get('app.email')}}">
              @if($errors->has('email'))
              <span class="help-block">{{ $errors->first('email') }}</span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('country') ? ' has-error': ''}} ">
              <select name="country" id="country" class="form-control input-lg" placeholder="Välj land"></select>
              @if($errors->has('country'))
              <span class="help-block">{{ $errors->first('country') }}</span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error': ''}} ">
              <input type="password" name="password" id="password" class="form-control input-lg" placeholder="{{Lang::get('app.password')}}">
              @if($errors->has('password'))
              <span class="help-block">{{ $errors->first('password') }}</span>
              @endif
            </div>
            <div class="panel-heading argument"> 
              <label><input type="checkbox" name="vilkor" id="vilkor" class="checkthis" placeholder="Vilkor"> Genom att klicka på Registrera dig accepterar du Peppy Pals <a target="_blank" href="http://beta.peppypals.com/new2017/terms-of-service/"><span>villkor </span></a> och <a target="_blank" href="http://beta.peppypals.com/new2017/privacy-policy/"><span>integritetspolicy</span>.</a></label>
              @if($errors->has('password'))
              <span class="help-block">{{ $errors->first('password') }}</span>
              @endif
            </div>
          <!--data-toggle="modal" data-target="#myModal"-->
            <input type="submit" value="{{Lang::get('app.start_trial_period')}}" class="btn btn-info btn-block signup input-lg">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
          </form>
        </div>
        <div class="panel-heading border_top">
          <h3 class="panel-title">{{Lang::get('app.already_have_account?')}} <a href="{{ url('/signin') }}"> <span>{{Lang::get('app.login')}}</span>!</a></h3>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">vilkor</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection