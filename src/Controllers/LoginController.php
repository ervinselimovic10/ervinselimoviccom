<?php
namespace Onz\Controllers;

use Onz\Models\User;
use duncan3dc\Laravel\BladeInstance;
use Onz\Validation\Validator;
use Onz\Validation\Hasher;
use Onz\Auth\LoggedIn;

class LoginController extends BaseController
{
  public function getLoginPage()
  {
    echo $this->blade->render('login', ['signer' => $this->signer]);
  }

  public function postLoginPage()
  {
    // CSRF Check
    if (!$this->signer->validateSignature($_POST['_token'])) {
      header("HTTP/1.0 400 Bad Request");
      exit();
    }

    // Take input
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    // Set rules
    $data = [
      'email' => 'email',
      'password' => 'pass:5'
    ];

    // Validate
    $validator = new Validator;
    $errors = $validator->isValid($data);

    // If validation fails -> back to login page
    // Display error messages
    if ((sizeof($errors) > 0) || (!empty($errors))) {
      $_SESSION['msg'] = $errors;
      header('Location: /login');
      exit();
    }

    // Look up the User
    $user = User::where('email', '=', $email)->first();

        // User Found or Not
        if ($user != null) {
          if ($user->active === 616) {
                $existing_fn = $user->first_name;
                $existing_mail = $user->email;
                $existing_pass = $user->password;

                $hash = new Hasher;
                // Prepare Input Password for Check
                $input_password = $hash->hashPass($password, 
                            $hash->regNonce($existing_fn, $existing_mail));

                  if ($input_password == $existing_pass) {
                      // Generate random key and set NONCE 
                      $random_string = $hash->generateRS();
                      $sess = $hash->sessNonce($existing_fn, $existing_mail, $random_string);
                      // Hash ID, mail, pass based on NONCE and random key
                      //$sess_id = $hash->hashPass($user->id, $sess);
                      $sess_mail = $hash->hashPass($user->email, $sess);
                      $sess_pass = $hash->hashPass($user->password, $sess);
                      // Set the hashed value to user's ID, email, pass
                      //$user->id = $sess_id;
                      $user->email = $sess_mail;
                      $user->password = $sess_pass;
                      // Set User into Session
                      if (!isset($_SESSION['onz[user]'])) {
                        $_SESSION['onz[user]'] = $user;
                      } else {
                        $_SESSION['success'] = ["You are already <strong>logged in</strong>!"];
                        header("Location: /");
                        exit();
                      }
                      // Success message
                      $_SESSION['success'] = ["You have been successfully logged in! Don't hesitate to continue surfing!"];

                        if (isset($_POST['staylogged'])) {
                          // Generate NONCE with random key
                          $stay = $hash->authNonce($existing_fn, $existing_mail, $random_string);
                          // Hash User's pass
                          $stay_pass = $hash->hashPass($user->password, $stay);
                          // Set Cookies and Redirect
                          setcookie('onz[usr]', $existing_fn, 0, '', '', '', true);
                          setcookie('onz[auth]', $stay_pass, 0, '', '', '', true);
                          header("Location: /");
                          exit();
                        }
                          header("Location: /");
                          exit();
                  } else {
                    // No email/pass match message and redirect
                    $_SESSION['msg'] = ["Your <strong>email</strong> and <strong>password</strong> did not match! Try again!"];
                    header("Location: /login");
                    exit();
                  }
          } else {
            // User Account is not Activated
            $_SESSION['msg'] = ["<strong>Your account has not been activated yet!</strong> Please check your email inbox."];
            header("Location: /login");
            exit();
          }
        } else {
          // User not found in DB
          $_SESSION['msg'] = ["<strong>".$email."</strong> does not exist in our system! Please register first."];
          header("Location: /login");
          exit();
        }
  }

  public function getLogout()
  {
    // If cookies set -> unset
    if (isset($_COOKIE['.onz'])) {
      setcookie('onz[usr]', '', -3600, '', '', '', true);
      setcookie('onz[auth]', '', -3600, '', '', '', true);
    }
    // Unset user session/destroy and set new session to display success message -> redirect
    unset($_SESSION['user']);
    session_destroy();
    session_start();
    $_SESSION['success'] = ["You have been successfully logged out! <strong>Come back soon!</strong>"];
    header("Location: /login");
    exit();
  }
}