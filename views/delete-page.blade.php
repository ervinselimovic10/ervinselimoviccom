@extends('base')

@section('browsertitle')
  onesnzeros | admin-delete
@stop

@section('content')
<hr/>
  <div class="container">
    <div class="row">
    <div class="col-md-4">
    </div>

      <div class="col-md-4">
        <h3>{{ $user_fn }} <small>(current admin)</small></h3>
        <hr/>
        @include('success')
        @include('error')
        <form action="/6qOdy7uoRhYAHG5ZuNPROvPTlvQ84069" method="post" class="form-horizontal">

          <div class="form-group">
            <label for="delete">Enter a slug of page:</label>
            <input type="text" placeholder="onesnzeros-page-to-delete" id="delete" name="delete" class="form-control"/>
          </div>

          <button type="submit" name="submit" class="btn btn-info">Delete Page</button>
          <hr/>
        </form>
      </div>

      <div class="col-md-4">
      </div>

    </div>
  </div>
@stop