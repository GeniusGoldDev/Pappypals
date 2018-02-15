@extends('share.default')

@section('title', 'create-account')

@section('content')
@include('partial.header_logo')

<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container" style="padding-top: 80px;">
    <div class="tab-pane fade active in" id="home">
     <h1>Redigera mitt barns konto</h1>
     </div>
  </div>
</section>
<div class="container">
<div class="col-sm-4 col-md-4 col-lg-4"></div>
<div class="col-sm-4 col-md-4 col-lg-4" style="background-color: #fff; border-radius: 4px; margin:35px 0; box-shadow: 1px 1px 4px 0px #888888;">
<div class="centered-form">
  <div class="">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Redigera konto för {{$subuser->username}} </h3>
      </div>
      <div class="panel-body">
        <form role="form" method="post" action="{{ url('/subusers/update') }}">

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group{{ $errors->has('username') ? ' has-error': ''}}">
                <input type="text" name="username" id="username" class="form-control input-sm floatlabel" placeholder="Namn"  value="{{$subuser->username}}">
                @if($errors->has('username'))
                <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group{{ $errors->has('birthdate') ? ' has-error': ''}} ">
                <input type="text" name="birthdate" id="birthdate" class="form-control input-sm" placeholder="ÅÅMMDD"  value="{{$subuser->birthdate}}">
                  <input type="hidden" name="userid" value="{{$subuser->id}}">
                @if($errors->has('birthdate'))
                <span class="help-block">{{ $errors->first('birthdate') }}</span>
                @endif
              </div>
            </div>
          </div>
          <input type="submit" value="Spara" class="btn btn-success btn-block">
          <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
        <form role="form" method="post" action="{{ url('/subusers/delete') }}">
          <input type="hidden" name="userid" value="{{$subuser->id}}">
            <br>
          <input type="submit" value="Ta bort" class="btn btn-info btn-block">
          <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
@include('partial.footer')

@endsection