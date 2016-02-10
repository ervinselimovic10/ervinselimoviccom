<!DOCTYPE html>
<html lang="sl">
<head>
  <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <title>@yield('browsertitle')</title>

  <link rel="stylesheet" type="text/css" href="assets/main.css"/>
  <link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css"/>
</head>
<body>


@include('nav')

@yield('outsidecontainer')

@yield('content')


    <footer class="footer">
      <div class="container">
        <p class="text-muted">Ervin Selimovic, PHP Developer</p>
        <p class="text-muted">&copy; onesnzeros 2016</p>
      </div>
    </footer>
    </div>
  </div>


  <script src="jquery/jquery-1.11.3.min.js"></script>
  <script src="jquery/jquery-migrate-1.2.1.min.js"></script>
  <script src="/jquery/jquery.validate.js"></script>
  <script src="bs/js/bootstrap.min.js"></script>
@yield('validatejs')

</body>
</html>