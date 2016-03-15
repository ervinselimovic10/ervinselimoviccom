@extends('home-base') 

@section('browsertitle')
  ervinselimovic fwd | welcome
@stop


@section('content')
<section>
  <div class="container">
    <div class="row">
      <hr/>
      @include('success')
      @include('error')
      <div class="col-sm-12">
        <div class="hages">
          <h1 class="homeheader">ervinselimovic</h1>
          <h3 class="homelead">be the part of computer art</h3>
          <hr/>
        </div>
        
        <br/>

        <div class="row">
          <div class="col-sm-6">
            <p class="pull-left ervin">ervinselimovi&copy;</p>
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
                It's assumed you're already familiar with the syntax and you've done some programming in <strong><a href="http://php.net/" target="_blank" class="php">php</a></strong>.</p><br/>
              </div>
              <br/>
          </div>

          <div class="col-sm-6 desc">
          <br/>
            <h3>Welcome, dear friend!</h3>
              <p>
              My name is Ervin Selimovic and I am a freelance web developer, mostly focused on server side with <a href="http://php.net/" target="_blank" class="php"><strong>php</strong></a>.
              Simply said, I just love to code and share solved programming constraints I’m dealing with every day, 
              while working on different projects. <br/>
              So I built something simple with love, that I’ll upgrade constantly, so as the site feautures for better user experience, 
              so as posting the fresh sharp-tounged learning content. Feel free to go on and visit my blog or click on read about button for more info!
              </p>
              <br/>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
        <br/>
            <div class="text-center lgbtn">
              <a href="/about" class="btn-lg btn-default btnabout">read about</a>
              <br/>
            </div>
            <div class="text-center socialmedia">
              <a href="https://www.facebook.com/profile.php?id=100008502765306" target="_blank"><i class="fa fa-facebook"></i></a>
              <a href="https://github.com/ervinselimovic10" target="_blank"><i class="fa fa-github"></i></a>
              <br/>
            </div>
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
