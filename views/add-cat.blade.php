@extends('base')

@section('browsertitle')
  Ervin Selimovic - Categories
@stop

@section('content')
      <div class="col-md-2">
      </div>

      <div class="col-md-4">
        <div class="pages">
            <h3>Add Category <small>/ current admin: {{ $user_fn }}</small></h3>
            <hr/>
            @include('success')
            <form action="/Pt6u79I8GFnSvJl8bAS3mv0LcJEvrhae" method="post" name="add" class="form-horizontal">

              <div class="form-group">
                <label for="b_title">Browser title <small>(converts to slug)</small></label>
                <input type="text" placeholder="onesnzeros | newcategory" id="b_title" name="b_title" class="form-control"/>
              </div>

              <div class="form-group">
                <label for="title">Category title</label>
                <input type="text" placeholder="Javascript....." id="title" name="title" class="form-control"/>
              </div>

              <button type="submit" name="submit" class="btn btn-success">Add Category</button>
              <hr/>
            </form>

            <hr/>
            <h3>Delete Category <small>/ current admin: {{ $user_fn }}</small></h3>
            <hr/>
            <form action="/Pt6u79I8GFnSvJl8bAS3mv0LcJEvrhae" name="delete" method="post" class="form-horizontal">

              <div class="form-group">
                <label for="delete">Enter category slug to delete:</label>
                <p><small style="color:red;">NOTE! Category and it's posts will be deleted permanently!</small></p>
                <input type="text" placeholder="onesnzeros-delete-category" id="delete" name="delete" class="form-control"/>
              </div>

              <button type="submit" name="submit-delete" class="btn btn-danger">Delete Category</button>
              <hr/>
            </form>
        </div>
      </div>

      <div class="col-md-2">
      </div>

    </div>
  </div>
</section>
@stop