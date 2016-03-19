@extends('base')

@section('browsertitle')
  Ervin Selimovic - Login
@stop

@section('content')
        <div class="col-sm-1">
        </div>

        <div class="col-sm-6">
      <br/>
      <br/>
      <section class="pages">
        <h1 class="homelead">Sign in</h1>
        <hr/>
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

                <p><small><a href="/vux0knNl2XPj4qei2az4D82mnWmu5ULp" class="forgotpass">Forgot your password?</a></small></p>

            <hr/>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default button">Sign in</button>
              </div>
            </div>
  
        </form>       
      </section>

        </div>

        <div class="col-sm-1">
        </div>
    </div>
  </div>
</section>
@stop

@section('validatejs')
  <script src="/jquery/validate.js"></script>
@stop
