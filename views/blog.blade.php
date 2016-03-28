@extends('blog-base') 

@section('browsertitle')
  Ervin Selimovic - Blog
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-2">
    <div class="fix">
      <h3 class="hblog">Search</h3>
        <p class="lead">Search for posts</p>
        <form action="/blog" method="get">
          <input type="text" name="search" class="form-control"/>
          <br/>
          <button type="submit" class="btn btn-default button">Search</button>
        </form>
      <hr/>

        <h3 class="hblog">Categories</h3>
          <p class="lead">Select the category</p> 
        <hr/>           
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Category title</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cats as $cat)
            <tr>
              <td><a href="/{{ $cat->slug }}" class="ilinks">{{ $cat->title }}</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <hr/>
    </div>
    </div>

    <div class="col-sm-6">
    <div class="auto">
      <h3 class="hblog">Posts <a href="/blog" class="links"><i class="fa fa-refresh"></a></i></h3>
        <p class="lead">All posts available <small>/ currently {{ count($pages) }} posts</small></p>
      <hr/>
      @include('success')
      @include('error')

      @foreach ($pages as $page)
      <h3><img src="/assets/img/{{ $page->picture }}" class="postimg" alt="Ervin Selimovic {{ $page->title }}"/> {{ $page->title }} <a href="{{ $page->slug }}" class="links"><i class="fa fa-chevron-down"></i></a></h3>
        <p><small>by <a href="https://www.facebook.com/profile.php?id=100008502765306" target="_blank">Ervin Selimovic</a></small> <small> - timezone Europe/Ljubljana</small></p>
        <p><small><i class="fa fa-clock-o"></i> Posted on {!! date("F j, Y, g:i a", strtotime($page->created_at)) !!}</small> <small class="pull-right">{{ Onz\Controllers\PageController::estimatedTime($page->page_content) }}</small></p>
          <div class="well w">
            <p>{!! substr($page->page_content, 0, 150) !!}...</p>
            <p><a href="{{ $page->slug }}">Read more...</a></p>
          </div>
            
      <hr/>
      @endforeach
    </div>
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

@if (!isset($_POST['search']))
<h3 class="hblog">Recent 5 <small>/ check</small></h3>
  @if (count($pages) < 5)
  <p>No recents...</p>
  @else 
<ul class="latest">
    @for ($i = 0; $i <= 4; $i++)
    <li><img src="/assets/img/{{ $pages[$i]->picture }}" class="rpostimg img-rounded" alt="Ervin Selimovic {{ $pages[$i]->title }}"/><a href="/{{ $pages[$i]->slug }}" class="links"> {{ $pages[$i]->title }}</a></li>
    @endfor
</ul>  @endif
@else 
<h3 class="hblog">Recent 2 <small>/ check</small></h3>
  @if (count($pages) < 2)
    <p>No recents...</p>
  @else
<ul class="latest">
  @for ($i = 0; $i <= 1; $i++)
  <li><img src="/assets/img/{{ $pages[$i]->picture }}" class="rpostimg img-rounded" alt="onesnzeros {{ $pages[$i]->title }}"/><a href="/{{ $pages[$i]->slug }}" class="links"> {{ $pages[$i]->title }}</a></li>
  @endfor
</ul>
  @endif
@endif
    </div>
  </div>
</div>
@stop