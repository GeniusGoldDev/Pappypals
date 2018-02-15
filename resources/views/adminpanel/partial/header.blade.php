<header class="header_only_logo">
    <nav class="navbar navbar-inverse no_logo_header">
      <div class="container">
     
        <div class="navbar-header">
          @if(Auth::check())
            <ul class="nav navbar-nav navbar-right" style="margin-top:21px;"> 
              <li>
                <a class="short_cuts">{{ Auth::user()->getNameOremail() }}</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
                  <li><a class="register register-subuser" href="{{ url('/subusers') }}">{{Lang::get('app.change_user')}}</a></li>
                  <li><a class="login" href="{{ url('/Activity') }}">Activity</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a class="login" href="{{ url('/signout') }}">{{ Lang::get('app.logout') }}</a></li>
                </ul>
              </li>
            </ul> 
            <a class="logo" >
                <img src="{{ URL::asset('img/PeppyPalsBannerSlogan.svg') }}" alt="/">
            </a>
            <a class="shortcuts" href="javascript:window.history.back();"><span class="fa fa-arrow-left" aria-hidden="true"></span> {{ Lang::get('app.back') }}</a>
          @else
            <a class="logo" href="/subusers">
                <img src="{{ URL::asset('img/PeppyPalsBannerSlogan.svg') }}" alt="/">
            </a>
            <a class="shortcuts" href="http://peppypals.com"><span class="fa fa-arrow-left" aria-hidden="true"></span>{{ Lang::get('app.back') }} </a>
          @endif
        </div>
        <!--/.nav-collapse -->
      </div>
      <!--/.container-fluid -->
    </nav>
</header>

@include('partial.alert')