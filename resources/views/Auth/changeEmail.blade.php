@extends('share.default')
@section('title', 'Change Email')
@section('id', 'changeEmail')
@section('content')
@include('partial.header_logo')

<section style="background-image: url('img/bg-account.png'); color: #fff;">
  <div id="myTabContent" class="tab-content container" style="padding-top: 80px;">
    <div class="tab-pane fade active in" id="home">
      <p>
      <h1>{{Lang::get('app.change_mail')}}</h1>
      </p>
  </div>
  </div>
</section>
  <div class="container">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">{{Lang::get('app.new_email')}}</h3>
            </div>
    <div class="registrationFormAlert">
</div>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="{{ url('/changeEmail') }}">
            <div class="form-group{{ $errors->has('email') ? ' has-error': ''}}">
              <input type="text" name="email" id="email" class="form-control input-sm" placeholder="{{Lang::get('app.new_email')}}">
            </div>
      
            <input type="submit" value="{{Lang::get('app.save')}}" class="btn btn-info btn-block" id="submit">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
          </form>
        </div>
      </div>
    </div>
@endsection