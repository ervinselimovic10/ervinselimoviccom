@extends('home-base') 

@section('browsertitle')
  onesnzeros | about
@stop


@section('content')
<hr/>
<div class="container">

    <div class="row">
      <div class="col-sm-12">
        <div class="hages">
          <h1 class="homeheader">onesnzeros</h1>
          <h3 class="homelead">read about</h3>
          <hr/>
        </div>
        
        <br/>

        <div class="row">
          <div class="col-sm-6">
            <p class="pull-left ervin">ervinselimovi&copy;</p>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <h3 class="click"><i class="fa fa-retweet"></i> about onesnzeros</h3>
            <p>onesnzeros is focused on providing you with rich post content, 
            mostly project based with modern php. For example - how to build a site like this one.<br/> 
            I will be posting solutions on all the constraints I ran while developing some project. 
            I'll cover a set up for professional local environment with great tools and work flow with several popular packages/frameworks! 
            Also you don’t need to check the site constantly for new updates, you can sit back and relax, 
            live a life in peace and you'll be noticed via email you provided for every new post! </p>
          </div>

          <div class="col-sm-6">
            <h3 class="click"><i class="fa fa-user-secret"></i> about me</h3>
            <p>I love well organized projects, dry and beautiful reusable code. 
            I love to share knowledge with people trying so hard to reach another level in programming. 
            Learning and training approach is the most important thing that concerns reaching a goal. 
            We'll cover things in conceptual way, because you'll gain that wisdom to switch between languages with no bigger issues.
            And of course feel free to contact me any time about your thoughts! 
            Maybe you need help with something or maybe you have a recommendation for better user experience, I’ll be in touch with you as soon as I can!</p>
          </div>
        </div>
  
          <div class="row">
          <div class="col-sm-12">
        <br/>
        <br/>
            <div class="text-center lgbtn">
              <a href="/blog" class="btn-lg btn-default btnabout">visit blog</a>
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
@stop