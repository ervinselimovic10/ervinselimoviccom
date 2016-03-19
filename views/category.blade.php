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
      <h3><img src="/assets/img/{{ $page->picture }}" class="postimg" alt="onz {{ $page->title }}"/> {{ $page->title }} <a href="{{ $page->slug }}" class="links"><span class="glyphicon glyphicon-menu-down"></span></a></h3>
        <p><small>by <a href="https://www.facebook.com/profile.php?id=100008502765306" target="_blank">Ervin Selimovic</a></small></p>
        <p><small><span class="glyphicon glyphicon-time"></span> Posted on {!! date("F j, Y, g:i a", strtotime($page->created_at)) !!}</small> <small class="pull-right">{{ Onz\Controllers\PageController::estimatedTime($page->page_content) }}</small></p>
          <div class="well w">
            <p>{!! substr($page->page_content, 0, 150) !!}...</p>
            <p><a href="{{ $page->slug }}">Read more...</a></p>
          </div>
            
      <hr/>
      @endforeach
      @endif

    </div>

    <div class="col-sm-4">
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
    </div>
  </div>
</div>
@stop