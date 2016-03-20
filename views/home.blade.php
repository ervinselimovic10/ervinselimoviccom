@extends('base') 

@section('browsertitle')
  Ervin Selimovic - Words of wisdom from code lover
@stop


@section('content')
            <div class="col-sm-12">
              @include('success')
              @include('error')
                <br/>
                <h1 class="homemain">be the part of computer art</h1>
                <h1 class="ervins">ervinselimovic</h1>
                <p class="pull-left muted">Words of wisdom from code lover</p>
                <hr/>
                <p class="pull-right muted">ervinselimovi&copy</p>
                <br/>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="whoami">
                        <h3>whoami</h3>
                          <p>My name is <strong>Ervin Selimovic</strong> and I am a freelance web developer, mostly focused on server side with <a href="http://php.net/" target="_blank" class="php"><strong>php</strong></a>.
                          Simply said, I just love to code and share solved programming constraints I’m dealing with every day, 
                          while working on different projects.</p>
                          <p>So I built something simple with love, that I’ll upgrade constantly, so as the site feautures for better user experience, 
                          so as posting the fresh sharp-tounged learning content. Feel free to go on and visit my <strong>blog</strong>!</p>
                          <p>Sorry, I blocked SMPT entry on my server, but you can find me on socialmedia buttons, or contact me on <strong>ervinselimovic10@gmail.com</strong></p>
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <br/>
                      <br/>
                      <br/>
                      <button class="btn btn-default button center-block"><a href="/blog">Visit Blog</a></button>
                      <br/>
                      <button class="btn btn-default button center-block" id="sitefor">Who is this site for?</button>
                      <br/>
                      <button class="btn btn-default button center-block" id="cookieshow">Site terms</button>

                        <div id="cookieuse">
                        <p id="closecookies" class="text-center"><i class="fa fa-times"></i> close</p>
                        <p>To bring you my blogging system, I use cookies, for greater user experience, like every other dynamic web site. 
                        Cookies help personalize your content, and provide you with a better, faster, safer experience. By using my site, 
                        you agree to my <strong><a href="/cookies" class="php">cookie use</a></strong>.</p><br/>
                        </div>

                        <div id="hideshow">
                          <p id="closesitefor" class="text-center"><i class="fa fa-times"></i> close</p>
                          <p>This site is for junior web developers who are trying to reach the next level on their journey,
                          It's assumed you already have basic programming background with <strong><a href="http://php.net/" target="_blank" class="php">php</a></strong>.</p><br/>
                        </div>
                  </div>
                </div>
            </div>

          <div class="container">
            <div class="row">
                <div class="col-sm-5">
                </div>

                <div class="col-sm-2">
                      <div class="text-center socialmedia">
                          <a href="https://www.facebook.com/profile.php?id=100008502765306" target="_blank"><i class="fa fa-facebook"></i></a>
                          <a href="https://github.com/ervinselimovic10" target="_blank"><i class="fa fa-github"></i></a>
                      </div>
                </div>

                <div class="col-sm-5">
                </div>
            </div>
          </div>
    </div>
  </div>
</section>
@stop

@section('validatejs')
<script>
  $(function(){
    // Who is this site for
    $('#sitefor').on('click', function(){
      $('#sitefor, #cookieshow').hide();
      $('#hideshow').show();
    });

    $('#closesitefor').on('click', function(){
      $('#hideshow').hide();
      $('#sitefor, #cookieshow').show();
    });
    // Site terms
    $('#cookieshow').on('click', function(){
      $('#cookieshow, #sitefor').hide();
      $('#cookieuse').show();
    });

    $('#closecookies').on('click', function(){
      $('#cookieuse').hide();
      $('#cookieshow, #sitefor').show();
    });
  });
</script>
@stop
