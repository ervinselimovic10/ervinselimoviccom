@extends('blog-base') 

@section('browsertitle')
{{ $b_title }}
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-2">
        <h3>Categories</h3>
          <p class="lead">Select the category</p> 
        <hr/>           
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Category title</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a href="/blog" class="ilinks">All</a></td>
            </tr>
            @foreach ($cats as $cat)
            <tr>
              <td><a href="/{{ $cat->slug }}" class="ilinks">{{ $cat->title }}</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>

                <div class="postadd">
                    <a href="https://asstoritve.info" target="_blank"><img src="assets/img/asstoritvebanner.jpg" class="img-responsive img-rounded" alt="As storitve d.o.o." title="As storitve d.o.o., your cleaning service"/></a>
                </div>
                <div class="postadd">   
                    <a href="http://www.mega3storitve.si/" target="_blank"><img src="assets/img/mega3storitvebanner.jpg" class="img-responsive img-rounded" alt="Mega 3 storitve" title="Mega 3 storitve"/></a>
                </div>
                <br/>
    </div>

    <div class="col-sm-6">
      <div class="well">
        <h3 style="color:#5BC8FF">{{ $title }}</h3>
          <p class="lead"><small>current category</small></p>
      </div>
      <hr/>
      @include('success')
      @include('error')

      @if (isset($pages))
      @foreach ($pages as $page)
      <h3><img src="/assets/img/{{ $page->picture }}" class="postimg" alt="onz {{ $page->title }}"/> {{ $page->title }} <a href="{{ $page->slug }}" class="links"><i class="fa fa-chevron-down"></i></a></h3>
        <p><small>by <a href="https://ervinselimovic.tech/" target="_blank">Ervin Selimovic</a></small></p>
        <p><small><i class="fa fa-clock-o"></i> Posted on {!! date("F j, Y, g:i a", strtotime($page->created_at)) !!}</small> <small class="pull-right">{{ Onz\Controllers\PageController::estimatedTime($page->page_content) }}</small></p>
          <div class="well blogcontent">
            <p>{!! substr($page->page_content, 0, 150) !!}...</p>
            <p><a href="{{ $page->slug }}">Read more...</a></p>
          </div>
            
      <hr/>
      @endforeach
      @endif

    </div>

    <div class="col-sm-4">
      <hr/>
      <div class="myprofile img-thumbnail">
        
          <img src="assets/img/eeprofile.png" class="img-responsive img-circle eprofile" alt="Ervin Selimovic profile img"/>
        <h4>Ervin Selimovic</h4>
        <p>Just a code lover.</p>
          <small>Freelance web developer, blogging to not forget. </small><br/>
          <small>Suggestions or questions <strong>ervinselimovic10@gmail.com</strong></small><br/>
          <small>Further read at <strong><a href="https://ervinselimovic.tech">ervinselimovic.tech</a></strong></small>

          <div class="text-center socialmedia">
             <a href="https://twitter.com/onesnzeros10" target="_blank"><i class="fa fa-twitter"></i></a>
              <a href="https://github.com/ervinselimovic10" target="_blank"><i class="fa fa-github"></i></a>
          </div>
      </div>
      <hr/>
      <p>Code guides presented in posts:</p>
      <pre class="code">
<span class="imp">namespace </span><span class="nb">Onz\Onz;</span>

class <span class="nb">Onz {</span>
  <span class="imp">private</span> function <span class="function">onesNzeros()</span>
  <span class="nb">{</span>
    <span class="comment">// outputs onesnzeros</span>
    echo <span class="string">"onesnzeros"</span><span class="nb">;</span>
  <span class="nb">}
}</span>
      </pre>
      <p>Terminal guides presented in posts:</p>
      <pre class="terminal">
$ composer dumpautoload
      </pre>

<hr/>

<a class="twitter-timeline" href="https://twitter.com/onesnzeros10" data-widget-id="725317676378238980">Tweets by @onesnzeros10</a>

    </div>
  </div>
</div>
@stop

@section('validatejs') 
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
@stop