@extends('home-base')

@section('browsertitle')
  ervinselimovic fwd | register
@stop

@section('content')
	<div class="container">
		<div class="row">

			<div class="col-sm-3">
        <hr/>
        <br/>
        <h5 style="color:green;">Offers</h5>
        <p>As soon as you register, you'll recieve an email with activation link (PLEASE CHECK YOUR SPAM FOLDER).
        When you activate your account and log in, you will have full control over your account.
        Profile button will appear in the right corner of navigation, 
        where you can manage comments you make, change your password, and even delete your account
        with a simple step. I have no meanings to hold you on my site, that is your free will, and it should be like that, no doubt.
        But you'll not be sorry, as soon as you see the guides and tips I'm providing you with. C'mon, jump in!</p>
        <p style="color:green;">Your sensitive credentials will not be exposed to public!</p>
			</div>

      <div class="col-sm-6">
      <hr/>
      <br/>
        <div class="page-header"><h1>Register</h1></div>
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
			</div>

			<div class="col-sm-3">
			</div>
    </div>
  </div>
@stop

@section('validatejs')
  <script src="/jquery/validate.js"></script>
@stop
