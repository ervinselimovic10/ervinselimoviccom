@extends('home-base') 

@section('browsertitle')
  ervinselimovic fwd | about
@stop


@section('content')
<hr/>
<div class="container">

    <div class="row">
      <div class="col-sm-12">
        <div class="hages">
          <h1 class="homeheader">ervinselimovic</h1>
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
            <h3 class="click"><i class="fa fa-retweet"></i> about my site</h3>
            <p>I'm focused on providing you with rich post content, 
            mostly project based with modern php. Our goal will be to gain the concept of web development projecting.<br/> 
            I will be posting solutions on all the constraints I ran while developing some project. 
            I'll get you familiar with professional local environment, useful tools, simple workflow with php frameworks,
            search engine optimization, and some tricks to run your own secure VPS with Ubuntu 14.04.
            As for installation guides, Mac users will be in plus, but I'm sure there is no bigger difference for Windows users.</p>
          </div>

          <div class="col-sm-6">
            <h3 class="click"><i class="fa fa-user-secret"></i> about me</h3>
            <p>I love well organized projects, dry and beautiful reusable code. 
            I love to share knowledge with people trying so hard to reach another level in programming. 
            Learning and training approach is the most important thing that concerns reaching a goal. 
            We'll cover things in conceptual way, because you'll gain that wisdom to switch between languages with no bigger issues.
            And of course feel free to contact me any time about your thoughts! 
            You can find me on social media icons below, I’ll be in touch with you as soon as I can!</p>
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
              <a href="https://github.com/ervinselimovic10" target="_blank"><i class="fa fa-github"></i></a>
              <br/>
            </div>
          </div>
        </div>
</div>
@stop