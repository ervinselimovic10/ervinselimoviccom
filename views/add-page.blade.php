@extends('blog-base')

@section('browsertitle')
  Ervin Selimovic - Add Page
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
            <h3>Add Page <small>/ current admin: {{ $user_fn }}</small></h3>
            <hr/>
            @include('error')
            <form action="/E4tHR2ItQGcka7MBHXxkCDO1oGM8JC8m" method="post" enctype="multipart/form-data" class="form-horizontal">

              <div class="form-group">
                <label for="id">Admin's ID</label>
                <input type="text" value="{{ $user_id }}" id="id" name="id" class="form-control" readonly/>
              </div>

              <div class="form-group">
                <label for="cat">Category</label>
                  <select name="cat" id="cat">
                    @foreach ($cats as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endforeach
                  </select>
              </div>

              <div class="form-group">
                <label for="b_title">Browser title <small>(converts to slug)</small></label>
                <input type="text" placeholder="onesnzeros | newpage" id="b_title" name="b_title" class="form-control"/>
              </div>

              <div class="form-group">
                <label for="title">Topic title</label>
                <input type="text" placeholder="PHP Nowadays....." id="title" name="title" class="form-control"/>
              </div>

              <div class="form-group">
                <label for="file">Choose picture</label>
                <input type="file" id="file" name="file" class="form-control"/>
              </div>

              <div class="form-group">
                <label for="page_content">Topic content</label>
                <textarea id="page_content" placeholder="PHP is now a strong OOP language....." name="page_content" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label for="sendall">Send mail to all users</label>
                <input type="checkbox" id="sendall" name="sendall" value="" /> 
              </div>
              <button type="submit" name="submit" class="btn btn-info">Add Page</button>
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