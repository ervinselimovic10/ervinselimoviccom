@extends('home-base') 

@section('browsertitle')
  onesnzeros | home
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
          <h1 class="homeheader">onesnzeros</h1>
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
              <p>To bring you onesnzeros, we use cookies, for greater user experience, like every other dynamic web site. 
              Cookies help personalize your content, and provide you with a better, faster, safer onesnzeros experience. By using our services, 
              you agree to our <strong><a href="/cookies" target="_blank" class="php">cookie use</a></strong>.</p><br/>
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
              My name is Ervin Selimovic and I am a web developer, mostly focused on server side with <a href="http://php.net/" target="_blank" class="php"><strong>php</strong></a>.
              Simply said, I just love to share solved programming constraints I’m dealing with every day, 
              while working on different projects, with programmers who are trying to reach the next level. 
              So I made something simple for you with love, that didn’t took me a huge amount of time, 
              but still I’ll be upgrading it constantly, so as the site feautures for better user experience, 
              so as posting the fresh sharp-tounged content. Feel free to go on and click on read about button for more info!
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
              <a href="https://twitter.com/onesnzeros10" target="_blank"><i class="fa fa-twitter"></i></a>
              <a href="https://github.com/onesnzeros10" target="_blank"><i class="fa fa-github"></i></a>
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
