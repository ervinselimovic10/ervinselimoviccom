@extends('base')

@section('browsertitle')
  onesnzeros | register
@stop

@section('content')
	<div class="container">
		<div class="row">

			<div class="col-md-2">
			</div>

      <div class="col-md-8">
        <div class="page-header"><h1>Register</h1></div>

        @include('error')

				<form name="registerform" class="form-horizontal" id="registerform" action="/register" method="post" novalidate>

				 	<div class="form-group">
    					<label for="first_name" class="col-sm-2 control-label">First Name</label>
    						<div class="col-sm-10">
      							<input type="text" class="form-control required" id="first_name" placeholder="First Name" name="first_name"/>
    						</div>
  					</div>

				 	<div class="form-group">
    					<label for="last_name" class="col-sm-2 control-label">Last Name</label>
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
    					<label for="verify_email" class="col-sm-2 control-label">Verify Email</label>
    						<div class="col-sm-10">
      							<input type="email" class="form-control required" id="verify_email" placeholder="user@example.com" name="verify_email"/>
    						</div>
  					</div>

  					<div class="form-group">
    					<label for="password" class="col-sm-2 control-label">Password</label>
    						<div class="col-sm-10">
      							<input type="password" class="form-control required" id="password" placeholder="Password" name="password"/>
    						</div>
  					</div>

  					<div class="form-group">
    					<label for="verify_password" class="col-sm-2 control-label">Verify Password</label>
    						<div class="col-sm-10">
      							<input type="password" class="form-control required" id="verify_password" placeholder="Verify Password" name="verify_password"/>
    						</div>
  					</div>

  					<hr/>

  					<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-info" name="submit">Register</button>
    					</div>
  					</div>

				</form>				
			</div>

			<div class="col-md-2">
			</div>
    </div>
  </div>
@stop

@section('validatejs')
  <!--<script src="jquery/validate.js"></script>-->
@stop
