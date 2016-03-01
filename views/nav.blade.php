    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">onesnzeros</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav">
            <li {!! Onz\Controllers\PageController::myActiveClass('/') !!}><a href="/">Welcome</a></li>
            <li {!! Onz\Controllers\PageController::myActiveClass('/about') !!}><a href="/about">About</a></li>
            <li {!! Onz\Controllers\PageController::myActiveClass('/blog') !!}><a href="/blog">Blog</a></li>
            @if(Onz\Auth\LoggedIn::user())
            <li {!! Onz\Controllers\PageController::myActiveClass('/contact') !!}><a href="/contact">Contact</a></li>
            @endif
          </ul>

          <ul class="nav navbar-nav navbar-right">
            @if ((Onz\Auth\LoggedIn::user()) && (Onz\Auth\LoggedIn::user()->access_level === 666))
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header">Page settings</li>
                  <li role="separator" class="divider"></li>
                  <li><a class="menu-item" href="#" onclick="makePageEditable(this)">Edit Page</a></li>
                  <li><a href="/E4tHR2ItQGcka7MBHXxkCDO1oGM8JC8m">Add Page</a></li>
                  <li><a href="/6qOdy7uoRhYAHG5ZuNPROvPTlvQ84069">Delete Page</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Category settings</li>
                  <li role="separator" class="divider"></li>
                  <li><a href="/Pt6u79I8GFnSvJl8bAS3mv0LcJEvrhae">Manage Categories</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">User settings</li>
                  <li role="separator" class="divider"></li>
                  <li><a href="/x1dB59d3Sr60f8OxA8m0739KMfvey7EZ">Manage Users</a></li>
                </ul>
              </li>
            @endif

            @if(Onz\Auth\LoggedIn::user())
              <li {!! Onz\Controllers\PageController::myActiveClass('/profile') !!}><a href="/profile"><i class="fa fa-user"></i> Profile</a></li>
              <li><a href="/logout"><i class="fa fa-lock"></i> Logout</a></li>
            @else
              <li {!! Onz\Controllers\PageController::myActiveClass('/register') !!}><a href="/register"><i class="fa fa-sign-in"></i> Register</a></li>
              <li {!! Onz\Controllers\PageController::myActiveClass('/login') !!}><a href="/login"><i class="fa fa-unlock"></i> Login</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>