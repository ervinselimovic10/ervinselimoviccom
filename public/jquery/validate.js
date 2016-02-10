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
          verify_email: {
            required: true,
            email: true,
            equalTo: '#email'
          },
          verify_password: {
            required: true,
            equalTo: '#password'
          }
        }
      });
    });