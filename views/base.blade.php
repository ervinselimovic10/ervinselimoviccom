<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <title>@yield('browsertitle')</title>

  <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/main.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
</head>
<body>


@include('nav')

@yield('outsidecontainer')

@yield('content')

    <footer class="footer">
        <p class="text-muted">ervin selimovic, web developer
        <br/>&copy; ervinselimovic 2016</p>
    </footer>
    </div>
  </div>

  <script src="/jquery/jquery-1.11.3.min.js"></script>
  <script src="/jquery/jquery-migrate-1.2.1.min.js"></script>
  <script src="/jquery/jquery.validate.js"></script>
  <script src="/bs/js/bootstrap.min.js"></script>

  @if ((Onz\Auth\LoggedIn::user()) && (Onz\Auth\LoggedIn::user()->access_level === 666))
  <script src="/admin/ckeditor/ckeditor.js"></script>
  <script src="/jquery/jquery.form.min.js"></script>
  @endif

@yield('validatejs')

</body>
</html>