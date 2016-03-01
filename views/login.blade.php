@extends('home-base')

@section('browsertitle')
  onesnzeros | login
@stop

@section('content')
  <div class="container">
    <div class="row">

      <div class="col-md-3">
      </div>

      <div class="col-md-6">
      <hr/>
      <br/>
        <h1 class="page-header">Sign in</h1>

        @include('error')
        @include('success')
        
        <form action="/login" method="post" name="loginform" id="loginform" class="form-horizontal" novalidate>

          <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}"/>

          <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="user@example.com">
                </div>
            </div>

            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>

                <p>&nbsp;&nbsp;&nbsp;<small><a href="/vux0knNl2XPj4qei2az4D82mnWmu5ULp" class="forgotpass">Forgot your password?</small></a></p>

            <hr/>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default button">Sign in</button>
              </div>
            </div>
  
        </form>       
      </div>

      <div class="col-md-3">
      </div>

    </div>
  </div>
@stop

@section('validatejs')
  <script src="/jquery/validate.js"></script>
@stop
