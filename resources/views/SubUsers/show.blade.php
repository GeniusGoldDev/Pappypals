@extends('share.default')
@section('title', 'user')
@section('id', 'user')
@section('content')
@include('partial.header_logo')

<div class="container-fluid" style="margin: 120px 0 0 0;">
 <div class="container currnt-users">
    @if (count($subusers) > 0)
      <h1>{{ Lang::get('app.who_is_playing') }}</h1></br>
      <p>{{ Lang::get('app.text_1_subusers') }}</p>
      <p>{{ Lang::get('app.text_1_subusers_flow') }}</p>
       </br>
        @foreach ($subusers as $subuser)
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 user-identiti">
          <a href="{{ URL::to('dashboard/' . $subuser->id ) }}">
            <img src="{{ URL::asset('img/'. $subuser->userimage ) }}" class="img-circle" width="50%" alt="kid">
            <h4 style="text-transform: uppercase;">{{ $subuser->username }} </h4>
          </a>
          <a class="" href="{{ URL::to('subusers/' . $subuser->id . '/edit') }}">{{ Lang::get('app.edit') }}</a>
        </div>
        @endforeach

        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 user-identiti parent">
          <a class="register" href="{{ url('/account') }}">
            <img src="{{ URL::asset('img/menu-icon/icon_play.svg') }}"><br>
            <h4 style="text-transform: uppercase;">{{ Auth::user()->getNameOremail() }} </h4>
          </a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 user-identiti add-more-child">
          <a href="{{ URL::to('/subusers/create') }}">
            <img src="{{ URL::asset('img/add-kid.png') }}">
            <h4 style="text-transform: uppercase;">{{ Lang::get('app.add_kid')}}</h4>

          </a>
        </div>
    @elseif (count($subusers) == 0)
        <h1>{{ Lang::get('app.who_is_playing') }}</h1>
        </br>
          <p>{{ Lang::get('app.text_1_subusers') }}</p>
          <p>{{ Lang::get('app.text_1_subusers_flow') }}</p>
      </br>
      <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 user-identiti add-more-child">
          <a href="{{ URL::to('/subusers/create') }}">
            <img src="{{ URL::asset('img/add-kid.png') }}">
            <h4 style="text-transform: uppercase;"> {{ Lang::get('app.add_kid')}} </h4>
          </a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 user-identiti parent">
          <a class="register" href="{{ url('/account') }}">
            <img src="{{ URL::asset('img/menu-icon/icon_play.svg') }}"><br>
            <h4 style="text-transform: uppercase;">{{ Auth::user()->getNameOremail() }} </h4>
          </a>
        </div>
    @endif
  </div> 
</div>
@endsection
<style type="text/css">
    #UserPage .currnt-users .user-identiti{
    text-align: center;
    margin-top: 20px;
  }
  #UserPage .currnt-users .user-identiti.parent img{
    background-color: #e7e7e7;
  }
  #UserPage .currnt-users .user-identiti.add-more-child img{
    background-color: #de116b;
  }
  #UserPage .currnt-users a h4{
      text-transform: uppercase;
      font-weight: bold;
      margin-top: 25px;
      color: #4c5051;
  }
  #UserPage .currnt-users a:hover{
    text-decoration: none;
  }

  #UserPage .currnt-users img{
      border-radius: 50%;
      text-align: center;
      width: 130px;
      padding: 10px;
      background-color: #fff;
      box-shadow: 0px 5px 10px 0px #ddd;
      height: 130px;
  }
  
</style>


