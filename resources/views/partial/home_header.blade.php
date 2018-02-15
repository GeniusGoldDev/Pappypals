<header>
  <nav class="navbar navbar-inverse blu-re" style="padding: 6px 0;">
    <div class="container">
      <div class="col-xs-5 col-sm-5 col-lg-5">
        <div class="navbar-header" >
          @if(Auth::check())
          <a href= "{{url('/account') }}" class="navbar-brand">
            <span class="home-button fa fa-home"></span>
          </a>
        </div>
      </div>
      @endif
     <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
          <a class="logo" >
              <img src="{{ URL::asset('img/PeppyPalsBannerSlogan.svg') }}" alt="/">
          </a>
      </div>
      <div class="col-xs-5 col-sm-5 col-lg-5">
        <div id="navbar3" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
            <li>
              <a class="short_cuts">{{ Auth::user()->getNameOremail() }}  <span class="fa fa-sort-desc"></span></a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
                <li><a class="register register-subuser" href="{{ url('/subusers') }}">{{Lang::get('app.change_user')}}</a></li>
                <li><a class="login" href="{{ url('/settings') }}">{{ Lang::get('app.my_account') }}</a></li>
                <li><a href="{{ url('/faq') }}">{{ Lang::get('app.faq') }}</a></li>
                <li><a href="{{ url('/contact') }}">{{ Lang::get('app.contact') }}</a></li>
                @if(Auth::user()->is_admin())
                  <li><a class="login" href="#">Admin Panel</a></li>
                  <li><a class="login" href="{{ url('/Activity') }}">Activity</a></li>
                @endif
                <li role="separator" class="divider"></li>
                <li><a class="login" href="{{ url('/signout') }}">{{Lang::get('app.logout')}}</a></li>
              </ul>
            </li>
            @else
            <li><a class="register" href="{{ url('/signup') }}">Starta provmånad</a></li>
            <li><a class="login" href="{{ url('/signin') }}">Mina sidor</a></li>
            @endif
          </ul>
        </div>
      </div>
      <form action="{{ URL::route('language-chooser') }}" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div style="float:right;">
          <select name="locale" class="selectpicker" data-width="fit">
          <option value="sv" data-content='<span class="flag-icon flag-icon-se"></span> Svenska'>Sv</option>
          <option value="en"{{ Lang::locale() === 'en' ? ' selected' : ''}} data-content='<span class="flag-icon flag-icon-us"></span> English'>En</option>
          </select>
          <input type="submit" value="Choose">
        </div>
      </form>


      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>

<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container"  style="padding: 20px 0;">
    <div class="tab-pane fade active in" id="home">
      <div class="col-md-12">
        <h1>{{Lang::get('app.text_1_account')}}</h1>
      </div>
    </div>
  </div>
</section>
  
  <nav class="navbar bottom_main">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbar-grownups">
        <ul id="myTab" class="nav nav-tabs">
          <li><a href="{{ url('/playTogether') }} " class="{{ Request::path() == 'playTogether' ? 'active' : '' }}"><img src="{{ URL::asset('img/menu-icon/icon_play.svg') }}">{{Lang::get('app.watch_together')}}</a></li>
          <li><a href="{{ url('/activities') }} " class="{{ Request::path() == 'activities' ? 'active' : '' }}"><img src="{{ URL::asset('img/menu-icon/icon_activities.svg') }}">
            {{Lang::get('app.play')}}</a></li>
          <li><a href="{{ url('/articles') }}" class="{{ Request::path() == 'articles' ? 'active' : '' }}"><img src="{{ URL::asset('img/menu-icon/icon_articles.svg') }}"> {{Lang::get('app.read')}}</a></li>
          <li ><a target="_blank" href="{{Lang::get('app.print_pdf')}}" class="disabled"><img src="{{ URL::asset('img/menu-icon/icon_videos.svg') }}">
            {{Lang::get('app.print')}}</a></li>
          <li><a href="{{ url('/eq') }}" class="{{ Request::path() == 'eq' ? 'active' : '' }}"><img src="{{ URL::asset('img/menu-icon/icon_about_eq.svg') }}">
           {{Lang::get('app.what_is_SEL')}}</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>

@include('partial.alert')
<script type="text/javascript">
  $('.disabled').prop('disabled', true);
</script>
