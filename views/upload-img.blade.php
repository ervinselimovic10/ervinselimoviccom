@extends('blog-base')

@section('browsertitle')
  Ervin Selimovic - Upload Img
@stop

@section('content')
<section>
  <div class="container">
    <div class="row">
      <hr/>
      <div class="col-md-3">
      </div>

      <div class="col-md-6">
        <div class="pages">
            <h3>Upload Image <small>/ current admin: {{ $user_fn }}</small></h3>
            <hr/>
            @include('error')
            @include('success')
            <form action="/dUsJm6kP499O409X0BDTIT0SbB1UH2cc" method="post" enctype="multipart/form-data" class="form-horizontal">

              <div class="form-group">
                <label for="file">Upload Img</label>
                <input type="file" id="file" name="file" class="form-control"/>
              </div>

              <button type="submit" name="submit" class="btn btn-info">Add Img</button>
              <hr/>
            </form>
        </div>
      </div>

      <div class="col-md-3">
      </div>

    </div>
  </div>
</section>
@stop