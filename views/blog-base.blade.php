<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <meta property="og:title" content="Ervin Selimovic - Words of wisdom from code lover" />
    <meta name="keywords" content="Ervin Selimovic, Ervin, Selimovic, Web developer, Freelancer, PHP, VPS, Programming, Blog" />
    <meta name="author" content="Ervin Selimovic" />

  @if ((isset($picture)) && ($picture !== null))
    <meta property="og:image" content="https://ervinselimovic.com/assets/img/{{ $picture }}" />
  @else
    <meta property="og:image" content="https://ervinselimovic.com/assets/img/ervin.jpg" />
  @endif
    <meta property="og:description" content="Ervin Selimovic, freelance web developer blogging about Php project based topics. Just code it!" />
    <meta property="og:url" content="https://ervinselimovic.com" />

  <title>@yield('browsertitle')</title>

  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/main.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
</head>
<body>


@include('nav')
        
@yield('content')

    <footer class="footer">
        <p class="pull-right"><small><a href="/cookies" class="footercookies">cookie use</a></small></p>
        <p class="text-muted">ervin selimovic, web developer
        <br/>&copy; ervinselimovic 2016</p>
    </footer>
    </div>
  </div>

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