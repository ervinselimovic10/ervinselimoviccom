@extends('home-base') 

@section('browsertitle')
  ervinselimovic fwd | page not found
@stop


@section('content')
<hr/>
<br/>
<br/>
<div class="container">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <h1>404 ;| It's okay, everybody gets a little lost sometimes...</h1>
    </div>
    <div class="col-sm-2">
    </div>
  </div>
</div> 
<div style="margin-top:-150px;" class="container">
<div class="row">
<div class="col-sm-12">
  <canvas id="myCanvas"></canvas>
  </div>
  </div>
</div>
@stop

@section('validatejs')
    <script src="/jquery/alphabet.js"></script>
    <script src="/jquery/bubbles.js"></script>
    <script src="/jquery/effect.js"></script>
@stop