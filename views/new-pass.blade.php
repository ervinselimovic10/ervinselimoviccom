@extends('base')

@section('browsertitle')
Ervin Selimovic - New Password
@stop

@section('content')
        <div class="col-sm-3">
        </div>

        <div class="col-sm-6">
          <br/>
          <br/>
          <section class="pages">
            <h1 class="homelead">Forgot your password?</h1>
            <p class="lead white">Type in your email. 
              Message will be sent on your provided address with newly generated secure password.
              But no matter what, change it as soon as you do the next log in!</p>
            <p><small class="activationlink">Please, check your spam folder, after you recieve new password on your email account.</small></p>
            <hr/>
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