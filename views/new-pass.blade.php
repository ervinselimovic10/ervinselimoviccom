@extends('home-base')

@section('browsertitle')
  ervinselimovic fwd | login
@stop

@section('content')
  <div class="container">
    <div class="row">

      <div class="col-sm-3">
      </div>

      <div class="col-sm-6">
      <hr/>
      <br/>
        <h1 class="page-header">Forgot your password?</h1>
        <p class="lead">Type in your email. 
          Message will be sent on your provided address with newly generated secure password.
          But no matter what, change it as soon as you make next log in!</p>
        @include('error')
          
        <form action="/vux0knNl2XPj4qei2az4D82mnWmu5ULp" method="post" name="newpass" id="newpass" class="form-horizontal" novalidate>

          <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}"/>

          <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="user@example.com">
                </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default button">Send me new password</button>
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