@extends('base')

@section('browsertitle')
Ervin Selimovic - Register
@stop

@section('content')
        <div class="col-sm-3">
        </div>

        <div class="col-sm-6">
          <br/>
          <br/>
          <section class="pages">
            <h1 class="homelead">Register</h1>
            <p><small class="activationlink">Please, check your spam folder, after you recieve activation link on your email account.</small></p>
            <hr/>
            @include('error')
            <form name="registerform" class="form-horizontal" id="registerform" action="/register" method="post" novalidate>
            <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}"/>
              <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">F. Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control required" id="first_name" placeholder="First Name" name="first_name"/>
                    </div>
                </div>

              <div class="form-group">
                  <label for="last_name" class="col-sm-2 control-label">L. Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control required" id="last_name" placeholder="Last Name" name="last_name"/>
                    </div>
                </div>

              <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control required email" id="email" placeholder="user@example.com" name="email"/>
                    </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control required" id="password" placeholder="Password" name="password"/>
                    </div>
                </div>

                <div class="form-group">
                  <label for="verify_password" class="col-sm-2 control-label">Confirm</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control required" id="verify_password" placeholder="Verify Password" name="verify_password"/>
                    </div>
                </div>

                <hr/>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default button" name="submit">Register</button>
                  </div>
                </div>

            </form>            
          </section>
        </div>

        <div class="col-sm-3">
        </div>
    </div>
  </div>
</section>
@stop

@section('validatejs')
  <script src="/jquery/validate.js"></script>
@stop
