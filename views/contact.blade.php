@extends('base')

@section('browsertitle')
  onesnzeros | contact-me
@stop

@section('content')
<hr/>
  <div class="container">
    <div class="row">

    <div class="col-sm-6">
      <h3>Have a question, {{ $user_fn }}?</h3>
      <p class="lead">feel free to contact me!</p>
      <p><small>Fill out the form and send me an email! I'll try to get back to you within next few hours!</small></p>
    </div>

    <div class="col-sm-6">
      <h3>Have a recommendation, {{ $user_fn }}?</h3>
      <p class="lead">feel free to recommend your idea or report bugs!</p>
      <p><small>Send me a message, and i'll do my best to take care of your wishes!</small></p>
    </div>

    </div>
  </div>

<hr/>

<div class="container mailer">
  <div class="row">
      <div class="col-sm-3">
      </div>

    <div class="col-sm-6">
    @include('error')

      <form action="/contact" method="post" class="form-horizontal" novalidate>
        <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}"/>
        <div class="form-group">
          <label for="name">Full name</label>
          <input type="text" id="name" name="name" value="{{ $user_fn." ".$user_ln }}" class="form-control" readonly/>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" value="{{ $email }}" class="form-control" readonly/>
        </div>

        <div class="form-group">
          <label for="subject">Enter subject</label>
          <input type="text" id="subject" name="subject" placeholder="Subject here..." class="form-control"/>
        </div>

        <div class="form-group">
          <label for="message">Enter message</label>
          <textarea name="message" id="message" class="form-control cmon" placeholder="Message here..." rows="3"></textarea>
        </div>

        <div class="form-group">
          <button type="submit" name="sendemail" class="btn btn-default button">Send</button>
        </div>

      </form>
    </div>

    <div class="col-sm-3">
    </div>

  </div>
</div>

@stop