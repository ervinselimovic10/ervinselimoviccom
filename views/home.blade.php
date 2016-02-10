@extends('base')

@section('browsertitle')
  onesnzeros | home
@stop

@section('outsidecontainer')
    <div class="container">

      <div class="jumbotron">
        <h1>onesnzeros</h1>
        <p>Welcome, my name is Ervin. I am a PHP Developer.</p>
        <p>Project in progress, full version comming soon...</p>
          <a class="btn btn-lg btn-info" href="../../components/#navbar" role="button">Read About &raquo;</a>
        </p>
      </div>
@stop

@section('content')
      <div class="row">
        <h1 class="page-header">Steps to success</h1>
        <div class="col-md-4">
          <h3 class="h3home">Register &raquo;</h3>
          <p>Register with free account to get access to several video and blog posting
             contents i'm making every week. I provide you with a lot of free Web Development concepts! Also we are going to be building web apps in professional development environment! What are you waiting for, learn with me!</p>
        </div>
        <div class="col-md-4">
          <h3 class="h3home">Blog &raquo;</h3>
          <p>In the blog section you'll find two routes once your account has been activated. Text content and video content. Choose a route and start informing yourself with advanced topics! You will also have ability to ask questions and group with others in comment section!</p>
        </div>
        <div class="col-md-4">
          <h3 class="h3home">Knowledge &raquo;</h3>
          <p>I will not provide you with copy and paste code, because i don't agree with that kind of learning, there will be plenty of professional tips, but you'll have to work on it by yourself to implement logic in your apps. Any nstallation tutorial will be straight forward (Mac 10.11). Knowledge is the weapon!</p>
        </div>
      </div>
    </div>

    <hr/>
@stop
