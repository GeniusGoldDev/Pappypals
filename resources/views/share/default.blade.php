<!DOCTYPE html>
<html >
  <head>
    <title>Pappypals | @yield('title')</title>
      <!--ajax field for crcf -->
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css"/>
    <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" integrity="sha384-Nud2SriDt2fZ+u85IBC48Yn9p+l4AGlapnX1EGA2KrnZjYJx8sxKnw/CIxc1wU1B" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@nytimesbits" />
    <meta name="twitter:creator" content="@nickbilton" />

    <meta property="og:url" content="url" />
    <meta property="og:title" content="title" />
    <meta property="og:description" content="content" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110803202-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-110803202-1');
    </script>

    <!-- Hotjar Tracking Code for eqplatform.peppypals.com -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:719147,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <script type="text/javascript" src="//d191y0yd6d0jy4.cloudfront.net/sitegainer_5618441.js"></script>
    <script type="text/javascript">
  $(function(){
    $('.selectpicker').selectpicker();
  });
</script>
  </head>
  <body id="@yield('id')Page">
    @yield('content')
    @yield('script')
    
  </body>
</html> 

