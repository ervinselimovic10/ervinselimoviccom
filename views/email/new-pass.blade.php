<div style="font-family:Georgia;">
<h1>{{ $user_fn }}, you've requested a new password!</h1>
<p>You have requested a new password for your account on my site,
if you don't know anything about this, please contact me right away!<br/>
But in every case, change your password as soon as you can,
because of your own security!</p>
<p>Your new password: {!! $password !!}</p>
<p><a href="{!! getenv('HOST') !!}/login">Sign In</a></p><br/>
  <p>Enjoy!</p>
  <hr/>
    <ul style="list-style:none;">
      <li>Visit <a href="{!! getenv('HOST') !!}">ervinselimovic.com</a></li>
      <li>Find me on <a href="https://twitter.com/onesnzeros10">twitter</a></li>
    </ul>

  <br/><strong>Do not reply.</strong>
</div>
