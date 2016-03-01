@extends('base') 

@section('browsertitle')
  onesnzeros | cookie use
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h3><a href="/" class="goback">Go back</a></h3>
      <br/>
    </div>

    <div class="col-sm-6">
        <div id="co" class="center-block hco">
          <h3>Our use of cookies</h3>
          <p>Onesnzeros uses cookies for your greater experience on our site, 
            like every other dynamic web site out there.</p> 
          <p>In our case that means, to provide you with displaying success and error messages for 
            dealing with every form on our site, keeping you logged in until you exit the browser,
            ensuring you to manage your profile, check our post content and write comments.</p>
          <p>If you have cookies disabled, it means you will not be able to do anything on our site.
            By using our services, you agree to our cookie use.</p>
          <h3>What are cookies?</h3>
            <p>An HTTP cookie (also called web cookie, Internet cookie, browser cookie or simply cookie), 
            is a small piece of data sent from a website and stored in the user's web browser while the user is browsing it. 
            Every time the user loads the website, 
            the browser sends the cookie back to the server to notify the user's previous activity. 
            Cookies were designed to be a reliable mechanism for websites to remember stateful information 
            (such as items added in the shopping cart in an online store) 
            or to record the user's browsing activity (including clicking particular buttons, logging in, or recording which pages were visited in the past). 
            Cookies can also store passwords and form content a user has previously entered, such as a credit card number or an address.<br/>
            <small>Source from <a href="https://en.wikipedia.org/wiki/HTTP_cookie">Wikipedia</a></small></p>
        </div>
    </div>

    <div class="col-sm-3">
    </div>
  </div>
</div>
@stop