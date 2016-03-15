@extends('base')

@section('browsertitle')
  ervinselimovic fwd | profile
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-2">
    <h3>Your Profile</h3>
      <div class="avatar">
        <img src="/assets/img/avataricon.jpg" class="img-thumbnail" alt="onz avatar"/>
      </div>
      <br/>
          <p class="lead">signed in as {{ $user_fn." ".$user_ln }}</p> 
        <hr/>           
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Manage profile</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a href="/5E32JWSATE1cqzs2iCHcP3ixsx1z308d" class="ilinks">Change Password</a></td>
            </tr>
            <tr>
              <td><a href="/MRT99y1i73Xsej9KZr0K8O77t7DTldnQ" class="ilinks">Delete Account</a></td>
            </tr>
          </tbody>
        </table>
    </div>

    <div class="col-sm-6">
      <h3>Your Comments (total: {{ count($comments) }})</h3>
        <p class="lead">Delete a comment</p>
        @include('error')
        @include('success')
      <hr/>

    <form action="/profile" method="post" class="form">
      @if ($comments !== null)
        @foreach ($comments as $comment)
        {{-- */ $id = $comment->page_id; /* --}}
        {{-- */ $title = $page->find($id)->title; /* --}}
        <h5>comment from {{ $title }}</h5>
          <p><small><span class="glyphicon glyphicon-time"></span> Posted on {{ date("F j, Y, g:i a", strtotime($comment->created_at)) }}</small></p>
            <div class="well">
              <input type="checkbox" name="id[]" value="{{ $comment->id }}" class="pull-right"/>
              <p>{{ substr($comment->comment, 0, 200) }}</p>
            </div>      
        <hr/>
        @endforeach
        <div class="form-group">
          <button type="submit" class="btn btn-danger" name="delete_comment">Delete</button>
        </div>
        @else
        <h5>You have no comments posted...</h5>
      @endif
    </form>

    </div>

    <div class="col-sm-4">
    </div>
  </div>
</div>
@stop