<?php
namespace Onz\Controllers;

use Onz\Models\User;
use duncan3dc\Laravel\BladeInstance;
use Onz\Validation\Validator;
use Onz\Validation\Hasher;
use Onz\Email\SendEmail;
use Onz\Controllers\PageController;

class NewPassController extends BaseController 
{
  public function getNewPass()
  {
    echo $this->blade->render('new-pass', [
        'signer' => $this->signer
      ]);
  }

  public function postNewPass()
  {
    // CSRF Check
    if (!$this->signer->validateSignature($_POST['_token'])) {
      header("HTTP/1.0 400 Bad Request");
      exit();
    }

    // Take input
    $email = $_POST['email'];

    $errors = [];

    // Set rules
    $data = [
      'email' => 'email',
    ];

    // Validate
    $validator = new Validator;
    $errors = $validator->isValid($data);

    // If validation fails -> back to login page
    // Display error messages
    if ((sizeof($errors) > 0) || (!empty($errors))) {
      $_SESSION['msg'] = $errors;
      header('Location: /vux0knNl2XPj4qei2az4D82mnWmu5ULp');
      exit();
    }

    // Look up the User
    $user = User::where('email', '=', $email)->first();

        // User Found or Not
        if ($user != null) {
          if ($user->active == 616) {
            $page = new PageController;
            $date = date('Y-m-d');
            if ($user->updated_at == true) {
              $updated = date('Y-m-d', strtotime($user->updated_at));

              if ($updated === $date) {
                $_SESSION['msg'] = ["Your password was already changed today! Please check your email inbox."];
                header("Location: /");
                exit();
              }
            }
            $hash = new Hasher;
            $random = $hash->generateRS(20);
            $user->password = $hash->hashPass($random, 
                          $hash->regNonce($user->first_name, $user->email));
            $user->save();

            $message = $this->blade->render('email.new-pass', ['user_fn' => $user->first_name, 'password' => $random]);
            SendEmail::send($user->email, ".onz - Request for password update", $message);

            $_SESSION['success'] = ["Your password is now updated! Please check your email and change your password soon!"];
            header("Location: /");
            exit();
          } else {
            $_SESSION['msg'] = ["<strong>User not active!</strong> Please activate your account first."];
            header("Location: /vux0knNl2XPj4qei2az4D82mnWmu5ULp");
            exit();
          }
        } else {
          $_SESSION['msg'] = ["<strong>".$_POST['email']."</strong> doesn't exist in our system!"];
          header("Location: /vux0knNl2XPj4qei2az4D82mnWmu5ULp");
          exit();
        }
  }
}