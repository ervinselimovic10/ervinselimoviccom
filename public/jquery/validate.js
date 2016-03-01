    $(function(){
      $('#registerform').validate({
        rules: {
          first_name: {
            required: true,
            minlength: 3
          },
          last_name: {
            required: true,
            minlength: 3
          },
          password: {
            required: true,
            minlength: 5
          },
          email: {
            required: true,
            email: true
          },
          verify_password: {
            required: true,
            equalTo: '#password'
          }
        }
      });
    });

    $(function(){
      $('#loginform').validate({
        rules: {
          email: {
            required: true, 
            email: true
          },
          password: {
            required: true,
            minlength: 5
          }
        }
      });
    });

    $(function(){
      $('#newpass').validate({
        rules: {
          email: {
            required: true,
            email: true
          }
        }
      });
    })