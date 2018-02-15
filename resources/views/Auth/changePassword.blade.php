@extends('share.default')
@section('title', 'Change Password')
@section('id', 'changePassword')
@section('content')
@include('partial.header_logo')

<script type="text/javascript">
    function checkPasswordMatch() {
        var password = $("#password").val();
        var confirmPassword = $("#password1").val();

        if (password != confirmPassword) {
            $("#divCheckPasswordMatch").html("Passwords do not match!");
            $(':input[type="submit"]').prop('disabled', true);

        } else {
            $("#divCheckPasswordMatch").html("Passwords match.");
            $(':input[type="submit"]').prop('disabled', false);
        }
    }
    $(document).ready(function () {
        $("#password1").keyup(checkPasswordMatch);
    });
</script>
<section style="background-image: url('img/bg-account.png'); color: #fff;">
  <div id="myTabContent" class="tab-content container" style="padding-top: 80px;">
    <div class="tab-pane fade active in" id="home">
      <p>
      <h1> {{Lang::get('app.change_pass')}}</h1>
      </p>
  </div>
  </div>
</section>
  <div class="container">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">{{Lang::get('app.change_pass')}}</h3>
            </div>
    <div class="registrationFormAlert" id="divCheckPasswordMatch">
</div>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="{{ url('/ChangePassword') }}">
            <div class="form-group{{ $errors->has('password') ? ' has-error': ''}}">
              <input type="password" name="password" id="password" class="form-control input-sm" placeholder="{{Lang::get('app.new_password')}}">
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{ $errors->has('password1') ? ' has-error': ''}}">
                  <input type="password" name="password1" id="password1" class="form-control input-sm" placeholder="{{Lang::get('app.confirm_password')}}">
                </div>
              </div>
            </div>
      
            <input type="submit" value="{{Lang::get('app.save')}}" class="btn btn-info btn-block" id="submit">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection