@extends('blog-base')

@section('browsertitle')
Ervin Selimovic - Change Password
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
              <td><a href="/MRT99y1i73Xsej9KZr0K8O77t7DTldnQ" class="ilinks">Delete Account</a></td>
            </tr>
          </tbody>
        </table>
    </div>

    <div class="col-sm-6">
      <h3>Password</h3>
        <p class="lead">change your password</p>
        @include('error')
        @include('success')
      <hr/>

    <form action="/5E32JWSATE1cqzs2iCHcP3ixsx1z308d" method="post" class="form-horizontal">
      <h3>Follow the procedure below:</h3><br/>
      <p><small style="color:green;">Having any trouble? Feel free to contact me on <strong>ervinselimovic10@gmail.com</strong>!</small></p>
      @if ($okay === false)
      <h5>1. Enter your OLD password first to verify your account:</h5>
            <div class="form-group">
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old password">
                    <br/>
                    <button type="submit" name="verify_op" class="btn btn-info">Verify</button>
                </div>
            </div> 
      @else
      <h5>2. Enter your NEW password:</h5>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" name="password" placeholder="New password">
                    <br/>
                </div>
            </div>
      <h5>3. VERIFY your NEW password::</h5>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="verify_password" name="verify_password" placeholder="Verify new password">
                    <br/>
                    <button type="submit" name="change_password" class="btn btn-info">Change</button>
                </div>
            </div>
            <br/>
      @endif


    </form>

    </div>

    <div class="col-sm-4">
    </div>
  </div>
</div>
@stop