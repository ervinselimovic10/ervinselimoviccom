@extends('blog-base')

@section('browsertitle')
Ervin Selimovic - Delete Account
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-2">
        <h3>My Profile</h3>
        <div class="avatar">
          <img src="/assets/img/avataricon.jpg" class="img-responsive img-thumbnail" alt="avatar"/>
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
              <td><a href="/profile" class="ilinks">Back to Profile</a></td>
            </tr>
            <tr>
              <td><a href="/5E32JWSATE1cqzs2iCHcP3ixsx1z308d" class="ilinks">Change Password</a></td>
            </tr>
          </tbody>
        </table>
    </div>

    <div class="col-sm-6">
      <h3>Really, {{ $user_fn }}?</h3>
        <p class="lead">end of our journey?</p>
        @include('error')
        @include('success')
      <hr/>

    <form action="/MRT99y1i73Xsej9KZr0K8O77t7DTldnQ" method="post" class="form-horizontal">
      <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}"/>
      <h3>Follow the procedure below:</h3><br/>
      <p>If there was anything that you didn't like or you have an idea of improving something, 
         really feel free to contact me! I'll be glad to hear from you, {{ $user_fn }}!
         Let's collaborate together!</p>
      <p><small style="color:green;">Having any trouble? Feel free to contact me on <strong>ervinselimovic10@gmail.com</strong>!</small></p>
      <br/>
      <h5>Enter your current password, click the button and your account will be permanently deleted:</h5>
      <p><small>(You are free to come back any time!)</small></p>
            <div class="form-group">
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Current password">
                    <br/>
                    <button type="submit" name="delete_acc" class="btn btn-danger">Delete Account</button>
                </div>
            </div> 
    </form>

    </div>

    <div class="col-sm-4">
    </div>
  </div>
</div>
@stop