@extends('home-base') 

@section('browsertitle')
  onesnzeros | page not found
@stop


@section('content')
<hr/>
<br/>
<br/>
@if (!empty($msg))
<div class="container">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <h1>{{ $msg }}</h1>
    </div>
    <div class="col-sm-2">
    </div>
  </div>
</div> 
@else
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
@endif
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