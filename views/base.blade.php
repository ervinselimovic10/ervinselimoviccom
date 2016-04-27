<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@onesnzeros10" />
    <meta name="twitter:creator" content="@onesnzeros10"/>
    <meta property="fb:app_id" content="100008502765306" />
    <meta name="twitter:title" content="Ervin Selimovic, Web Developer @Personal Blog" />
    <meta name="twitter:image" content="https://ervinselimovic.com/assets/img/ervinselimoviccom.jpg" />
    <meta name="twitter:description" content="Personal Blog - Ervin Selimovic, Web developer or simply just Code lover. Linux Ubuntu server, Javascript and PHP based topics. Blogging to not forget.." />
    <meta property="og:title" content="Ervin Selimovic, Web Developer @Personal Blog" />
    <meta name="keywords" content="Ervin Selimovic, Ervin Selimovic blog, Ervin Selimovic web, Ervin Selimovic web developer" />
    <meta name="author" content="Ervin Selimovic" />
  @if ((isset($picture)) && ($picture !== null))
    <meta property="og:image" content="https://ervinselimovic.com/assets/img/{{ $picture }}" />
  @else
    <meta property="og:image" content="https://ervinselimovic.com/assets/img/ervinselimoviccom.jpg" />
  @endif
    <meta name="description" content="Personal Blog - Ervin Selimovic, Web developer or simply just Code lover. Linux Ubuntu server, Javascript and PHP based topics. Blogging to not forget.." />
    <meta property="og:description" content="Personal Blog - Ervin Selimovic, Web developer or simply just Code lover. Linux Ubuntu server, Javascript and PHP based topics. Blogging to not forget.." />
    <meta property="og:url" content="https://ervinselimovic.com" />

  <title>@yield('browsertitle')</title>

  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/main2.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>

  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75404165-1', 'auto');
  ga('send', 'pageview');

  </script>
</head>
<body>


@include('nav')

<section>
  <div class="container">
    <div class="row">
      <hr/>
        
@yield('content')

  <script src="jquery/jquery-1.11.3.min.js"></script>
  <script src="jquery/jquery-migrate-1.2.1.min.js"></script>
  <script src="jquery/jquery.validate.js"></script>
  <script src="bs/js/bootstrap.min.js"></script>

  @if ((Onz\Auth\LoggedIn::user()) && (Onz\Auth\LoggedIn::user()->access_level == 666))
  <script src="ckeditor/ckeditor.js"></script>
  <script src="jquery/jquery.form.min.js"></script>
  @endif

@yield('validatejs')

</body>
</html>