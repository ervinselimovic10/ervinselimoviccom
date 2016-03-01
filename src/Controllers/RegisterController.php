<?php
namespace Onz\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Onz\Validation\Validator;
use Onz\Validation\Hasher;
use Onz\Email\SendEmail;
use Onz\Models\User;
use Onz\Models\UserPending;

class RegisterController extends BaseController
{
    public function getRegisterPage()
    {
        echo $this->blade->render('register', ['signer' => $this->signer]);
    }

    public function postRegisterPage()
    {
        // CSRF Check
        if (!$this->signer->validateSignature($_POST['_token'])) {
          header("HTTP/1.0 400 Bad Request");
          exit();
        }
        
        $errors = [];

        $validation_data = [
          'first_name' => 'min:3',
          'last_name' => 'min:3',
          'email' => 'email|unique:User',
          'password' => 'pass:5|equalTo:verify_password' 
        ];

        // Validate Data
        $validator = new Validator;
        $errors = $validator->isValid($validation_data); 

        // If validation fails -> back to register page
        // Display error messages
        if ((sizeof($errors) > 0) || (!empty($errors))) {
          $_SESSION['msg'] = $errors;
          header('Location: /register');
          exit();
        }

        // Save data into database
        $hash = new Hasher;
        $user = new User;

        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->email = $_POST['email'];
        $user->password = $hash->hashPass($_POST['password'], 
                          $hash->regNonce($user->first_name, $user->email));
        $user->save();
        
        // Generate a Token for Activation link
        $rand = $hash->generateRS();
        $nonce = $hash->authNonce($user->first_name, $user->last_name, $rand);
        $token = $hash->hashPass($user->email, $nonce);

        // Assign a Token to Registered user
        $user_pending = new UserPending;
        $user_pending->token = $token;
        $user_pending->user_id = $user->id;
        $user_pending->save();

        // Send activation link on email of registered user (Assign token to template!)
        $message = $this->blade->render('email.activation', ['token' => $token]);
        SendEmail::send($user->email, 'Welcome, '.$user->first_name.'!', $message);

        // Set success message and redirect
        $_SESSION['success'] = ["You have been successfully registered! The activation link has been sent to your email address! <strong>Please confirm your account!</strong>"];
        header("Location: /login");
        exit();
    }

    public function getActivateAcc()
    {
        $user_id = 0;
        
        if (isset($_GET['id'])) {
            // Look up the Token
            $user_pending = UserPending::where('token', '=', $_GET['id'])->get();

            foreach ($user_pending as $item) {
                $user_id = $item->user_id;
            }
        }

        if ($user_id > 0) {
            // Make User Account Active
            $user = User::find($user_id);
            $user->active = 616;
            $user->save();

            UserPending::where('token', '=', $_GET['id'])->delete();

            $_SESSION['success'] = ["<strong>Great, ".$user->first_name."!</strong> Your account has now been <strong>activated</strong>! Enjoy!"];
            header("Location: /login");
            exit();
        } else {
            header("Location: /page-not-found");
            exit();
        }
    }
}