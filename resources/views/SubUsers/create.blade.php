@extends('share.default')

@section('title', 'create-account')
@section('content')
@include('partial.header_logo')
<style type="text/css">
  label > input{ /* HIDE RADIO */
  visibility: hidden; /* Makes input not-clickable */
  position: absolute; /* Remove input from document flow */
}
label > input + img{ /* IMAGE STYLES */
  cursor:pointer;
  border:2px solid transparent;
    border-radius: 50%;
width: 80px;
}
label > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
  border:2px solid #f00;

}
.center {
  text-align: center;
}
</style>
<!-- DE FÅR INTE LÄGGA TILL MER ÄN 4 BARN -->
<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container" style="padding-top: 80px;">
    <div class="tab-pane fade active in" id="home">
      <h1>{{Lang::get('app.add_kid')}} </h1>
      <p>{{Lang::get('app.text_2_subusers')}}</p>
    </div>
  </div>
</section>
<div class="container-fluid" style="margin: 120px 0 0 0;">
<div class="container pull-down grownUps_body">
<div class="col-sm-4 col-md-4 col-lg-4" style="background-color: #fff; border-radius: 4px; margin:35px auto; float:none; box-shadow: 1px 1px 4px 0px #888888;">
  <div class="centered-form">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">{{Lang::get('app.create_account')}}</h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="{{ url('/subusers/create') }}">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{ $errors->has('userimage') ? ' has-error': ''}}">
                  <label>{{Lang::get('app.choose_character')}}</label><br>
                      <label class="center">
                          <input type="radio" name="userimage" value="SAMMY.jpg" />
                          <img src="{{URL::asset('img/SAMMY.jpg')}}"><br>
                          <span>Sammy</span>
                      </label>

                       <label class="center">
                          <input type="radio" name="userimage" value="KELLY.jpg" />
                          <img src="{{URL::asset('img/KELLY.jpg')}}"><br>
                          <span>Kelly</span>
                      </label>

                       <label class="center">
                          <input type="radio" name="userimage" value="IZZY.jpg" />
                          <img src="{{URL::asset('img/IZZY.jpg')}}"><br>
                          <span>Izzy</span>
                      </label>

                       <label class="center">
                          <input type="radio" name="userimage" value="GABBY.jpg" />
                          <img src="{{URL::asset('img/GABBY.jpg')}}"><br>
                          <span>Gabby</span>
                      </label>

                       <label class="center">
                          <input type="radio" name="userimage" value="REGGY.jpg" />
                          <img src="{{URL::asset('img/REGGY.jpg')}}"><br>
                          <span>Reggy</span>
                      </label>

                
                  <style type="text/css">
                    select#userimage option[value="GABBY.jpg"]{background-image: url("../img/GABBY.jpg");}
                  </style>
                  @if($errors->has('userimage'))
                  <span class="help-block">{{ $errors->first('userimage') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{ $errors->has('username') ? ' has-error': ''}}">
                  <label>{{Lang::get('app.child_name')}}</label><br>
                  <input type="text" name="username" id="username" class="form-control input-sm floatlabel" placeholder="{{Lang::get('app.Name')}}">
                  @if($errors->has('username'))
                  <span class="help-block">{{ $errors->first('username') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{ $errors->has('birthdate') ? ' has-error': ''}} ">
                  <input type="text" name="age" id="age" class="form-control input-sm" placeholder="age" style="display:none;">
                  <label>{{Lang::get('app.child_birthday')}}</label><br>
                  <input class="form-control input-sm" id="birthdate" placeholder="{{Lang::get('app.mm-dd-yy')}}" name="birthdate"/>
                  @if($errors->has('age'))
                  <span class="help-block">{{ $errors->first('birthdate') }}</span>
                  @endif
                </div>
              </div>      
            </div>
            <input type="submit" value="{{Lang::get('app.add')}}" class="btn btn-info btn-block" style="border-radius:30px;">
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