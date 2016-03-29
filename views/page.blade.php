@extends('blog-base')

@section('browsertitle')
{{ $browser_title }}
@stop

@section('content')
    <hr/>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            <h3><a href="/blog" class="goback">Go back</a></h3>
            <br/>
            </div>

            <div class="col-sm-8">
                    <!-- Blog post -->
                    <h1 class="hblog">{{ $title }}</h1>
                    <p class="lead">
                        <small>by <a href="https://www.facebook.com/profile.php?id=100008502765306" target="_blank">ervin selimovic</a></small>
                    </p>
                    <p><small><i class="fa fa-clock-o"></i> Posted on {!! $date !!}</small>    <small class="pull-right"> {{ $estimated_time }} to read</small></p>
                    <hr/>
                    @include('error')
                    @include('success')
                    @if ($picture !== null)
                    <img src="/assets/img/{{ $picture }}" class="img-responsive img-rounded" alt="Ervin Selimovic {{ $title }}"/>    
                    <hr/> 
                    @endif

                @if ((Onz\Auth\LoggedIn::user()) && (Onz\Auth\LoggedIn::user()->access_level == 666))
                <form method="post" action="40c2CxwIB370zVGDGsV0905kAK6SWXas" id="editpage" name="editpage">
                    <article id="editablecontent" class="editablecontent" itemprop="description" style="width: 100%; line-height: 2em;">
                        {!! $page_content !!}
                    </article>
                    <article class="admin-hidden">
                        <a class="btn btn-primary" href="#" onclick="saveEditedPage()">Save</a>
                        <a class="btn btn-info" href="#" onclick="turnOffEditing()">Cancel</a>
                        &nbsp;&nbsp;&nbsp;
                        @if ($page_id == 0)
                        <br/><br/>
                        <input type="text" name="browser_title" placeholder="Enter Browser title"/>
                        @endif 
                    </article>
                    <input type="hidden" name="thedata" id="thedata"/>
                    <input type="hidden" name="old" id="old"/>
                    <input type="hidden" name="page_id" value="{!! $page_id !!}"/>
                </form>
                @else 
                    {!! $page_content !!} 
                @endif
                <section id="comments">
                </section>
                <hr/>

                <div>
                    <h3><i class="fa fa-comments-o"></i> Comment section <small>/ currently @if (empty($comments)) {{ 0 }} @else {{ count($comments) }} @endif comment/s</small></h3>
                    <br/>
                </div>

                <!-- Comment -->
                @if (!empty($comments)) 
                @foreach ($comments as $item)
                <div class="media">
                    <div class="pull-left">
                        <i class="fa fa-user"></i>
                      </div>
                    <div class="media-body">
                    {{-- */ $id = $item->user_id; /* --}}
                    {{-- */ $fn = $user->find($id)->first_name; /* --}}
                    {{-- */ $ln = $user->find($id)->last_name; /* --}}
                        <h4 class="media-heading">{{ $fn." ".$ln }}
                        <small>{!! date("F j, Y, g:i a", strtotime($item->created_at)) !!}</small>
                        </h4>
                        <div class="well">
                        <p class="commentfont">{!! nl2br(htmlspecialchars($item->comment)) !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p><strong>Have a question or need help? Write a comment!</strong></p>
                @endif

                <hr/>
                @if (Onz\Auth\LoggedIn::user())
                <!-- Post comment -->
                <div class="well">
                    <h4><i class="fa fa-comment-o"></i> Leave a Comment:</h4>
                    <form action="/{{ $slug }}" method="post" role="form">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}"/>
                            <textarea name="comment" class="form-control" placeholder="Comment here..." rows="4"></textarea>
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-default button">Comment</button>
                    </form>
                </div>
                @else
                <div class="well">
                    <h4><i class="fa fa-comment-o"></i> Leave a Comment:</h4><br/>
                    <p>Sorry, you must be logged in to comment...</p>
                    <p>Login <a href="/login">here</a>!</p>
                    <p><a href="/register">Don't have an account yet?</a></p>
                </div>
                @endif
                <hr/>
            </div>

            <div class="col-sm-2">
            </div>
        </div>
    </div>

<!-- Admin JS -->
@include('admin.admin-js')

@stop