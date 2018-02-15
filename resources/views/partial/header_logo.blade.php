<header class="header_only_logo">
    <nav class="navbar navbar-inverse no_logo_header">
      <div class="container">
     
        <div class="navbar-header">
          @if(Auth::check())
            <ul class="nav navbar-nav navbar-right" style="margin-top:21px;"> 
              <li>
                <a class="short_cuts">{{ Auth::user()->getNameOremail() }} <span class="fa fa-sort-desc"></span></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
                  <li><a class="login" href="{{ url('/settings') }}">{{ Lang::get('app.my_account') }}</a></li>
                  <li><a href="{{ url('/faq') }}">{{ Lang::get('app.faq') }}</a></li>
                  <li><a href="{{ url('/contact') }}">{{ Lang::get('app.contact') }}</a></li>
                  @if(Auth::user()->is_admin())
                    <li><a class="login" href="#">Admin Panel</a></li>
                    <li><a class="login" href="{{ url('/Activity') }}">Activity</a></li>
                  @endif
                  <li role="separator" class="divider"></li>
                  <li><a class="login" href="{{ url('/signout') }}">{{ Lang::get('app.logout') }}</a></li>
                </ul>
              </li>
            </ul> 
            <a class="logo" >
                <img src="{{ URL::asset('img/PeppyPalsBannerSlogan.svg') }}" alt="/">
            </a>
            <a class="shortcuts" href="javascript:window.history.back();"><span class="fa fa-arrow-left" aria-hidden="true"></span> {{ Lang::get('app.back') }}</a>
            <!-- Glömt lösen / sigin -->
          @else
            <a class="logo" href="/subusers">
                <img src="{{ URL::asset('img/PeppyPalsBannerSlogan.svg') }}" alt="/">
            </a>

            @if(request()->is('ForgotPassword'))
            <a class="shortcuts" href="{{ url('/signin') }}"><span class="fa fa-arrow-left" aria-hidden="true"></span> {{ Lang::get('app.back') }}</a>
             @else
            <a class="shortcuts" href="http://peppypals.com"><span class="fa fa-arrow-left" aria-hidden="true"></span>{{ Lang::get('app.back') }} </a>
           @endif
           <!-- Glömt lösen / sigin -->
          @endif
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
</header>
@include('partial.alert')