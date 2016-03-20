@extends('blog-base')

@section('browsertitle')
  Ervin Selimovic - Users
@stop

@section('content')
<section>
  <div class="container">
    <div class="row">
      <hr/>
        <div class="col-md-2">
        </div>

        <div class="col-md-8">
          <div class="pages">
              <h3>Users Table <small>/ current admin: {{ $user_fn }}</small></h3>
              <hr/>

              @include('success')

              <form name="users" class="form-horizontal" id="users" action="/x1dB59d3Sr60f8OxA8m0739KMfvey7EZ" method="post">

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Active state</th>
                      <th>Access level</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->first_name." ".$user->last_name }}</td>
                      <td>{{ $user->email }}</td>
                      @if ($user->active == 616)
                        <td style="color:green;">Active</td>
                      @else
                        <td style="color:red;">Not Active</td>
                      @endif
                      @if ($user->access_level == 666)
                        <td style="color:green;"><strong>ADMIN</strong></td>
                      @else
                        <td>User</td>
                      @endif
                      <td><input type="checkbox" name="delete[]" value="{{ $user->id }}"/></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                <hr/>
                  <div class="form-group">
                    <p><small style="color:red;">NOTE! User and all of his comments will be deleted permanently!</small></p>
                      <button type="submit" name="submit" class="btn btn-danger">Delete User</button>
                  </div> 
                </form>       
            </div>
          </div>

          <div class="col-md-2">
          </div>

    </div>
  </div>
</section>
@stop