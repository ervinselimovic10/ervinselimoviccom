          @if (isset($_SESSION['msg']))
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5>Verification Alert!</h5>
              @foreach($_SESSION['msg'] as $error)
                <p style="font-size:11px;">{!! $error !!}</p>
              @endforeach
          </div>
          {{-- */ unset($_SESSION['msg']); /* --}}
          @endif