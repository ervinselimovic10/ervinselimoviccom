<?php
namespace Onz\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Onz\Auth\LoggedIn;
use Onz\Validation\Validator;
use Onz\Validation\Hasher;
use Onz\Models\Comment;
use Onz\Models\User;
use Onz\Models\Page;

class ProfileController extends BaseController
{
  public function getProfile()
  {
    $user_id = LoggedIn::user()->id;
    $user_fn = LoggedIn::user()->first_name;
    $user_ln = LoggedIn::user()->last_name;

    if (Comment::where('user_id', '=', $user_id)->exists()) {
      $comments = Comment::where('user_id', '=', $user_id)->orderBy('created_at', 'DESC')->get();
      $page = new Page;
    } else {
      $comments = null;
      $page = null;
    }

    echo $this->blade->render('profile', [
        'user_id' => $user_id,
        'user_fn' => $user_fn,
        'user_ln' => $user_ln,
        'comments' => $comments,
        'page' => $page
      ]);
  }

  public function postProfile()
  {
    if ((LoggedIn::user()) && (isset($_POST['id']) && (isset($_POST['delete_comment'])))) {
      foreach ($_POST['id'] as $id) {
        Comment::where('id', '=', $id)->delete();
      }

      $_SESSION['success'] = ["Comment/s deleted successfully!"];
      header("Location: /profile");
      exit();
    } else {
      $_SESSION['msg'] = ["No money, no music..."];
      header("Location: /profile");
      exit();
    }
  }

  public function getChangePass()
  {
    $user_id = LoggedIn::user()->id;
    $user_fn = LoggedIn::user()->first_name;
    $user_ln = LoggedIn::user()->last_name;

    echo $this->blade->render('change-pass', [
        'user_fn' => $user_fn,
        'user_ln' => $user_ln,
        'okay' => false
      ]);
  }

  public function postChangePass()
  {       
        $errors = [];

        if (isset($_POST['change_password'])) {
            $validation_data = [
              'password' => 'pass:5|equalTo:verify_password',
            ];
        } else {
          $validation_data = [
            'old_password' => 'pass:5'
          ];
        }

        // Validate Data
        $validator = new Validator;
        $errors = $validator->isValid($validation_data);

        // If validation fails -> back to register page
        // Display error messages
        if ((sizeof($errors) > 0) || (!empty($errors))) {
          $_SESSION['msg'] = $errors;
          header('Location: /5E32JWSATE1cqzs2iCHcP3ixsx1z308d');
          exit();
        }
        
        // Verify old password
        if ((LoggedIn::user()) && (isset($_POST['old_password'])) && (isset($_POST['verify_op']))) {
          $hash = new Hasher;
          $user = new User;

          // Search for loggedin user in DB
          $user_id = LoggedIn::user()->id;
          $user = $user->find($user_id);

          // Hash old password
          $old_password = $hash->hashPass($_POST['old_password'], 
                          $hash->regNonce($user->first_name, $user->email));

          // Compare
          if ($user->password === $old_password) {
            $user_id = LoggedIn::user()->id;
            $user_fn = LoggedIn::user()->first_name;
            $user_ln = LoggedIn::user()->last_name;

            $_SESSION['success'] = ["Correct password! Please continue."];
            echo $this->blade->render('change-pass', [
                'user_fn' => $user_fn,
                'user_ln' => $user_ln,
                'okay' => true
              ]);
            exit();
          } else {
            $_SESSION['msg'] = ["Password you entered is not correct!"];
            header("Location: /5E32JWSATE1cqzs2iCHcP3ixsx1z308d");
            exit();
          }
        } elseif ((LoggedIn::user()) && (isset($_POST['password'])) && (isset($_POST['change_password']))) {
          $hash = new Hasher;
          $user = new User;
          $user_id = LoggedIn::user()->id;
          $user = $user->find($user_id);

          $user->first_name = $user->first_name;
          $user->last_name = $user->last_name;
          $user->email = $user->email;
          $user->password = $hash->hashPass($_POST['password'], 
                            $hash->regNonce($user->first_name, $user->email));
          $user->active = 616;

          if ($user->access_level === 666) {
            $user->access_level = 666;
          } else {
            $user->access_level = 1;
          }

          $user->save();

          unset($_SESSION['user']);
          session_destroy();
          session_start();
          $_SESSION['success'] = ["Your password was successfully changed! Please login again."];
          header("Location: /login");
          exit();
        } else {
          $_SESSION['msg'] = ["Something went wrong. Please retry."];
          header('Location: /5E32JWSATE1cqzs2iCHcP3ixsx1z308d');
          exit();
        }
  }

  public function getDeleteAcc()
  {
    $user_id = LoggedIn::user()->id;
    $user_fn = LoggedIn::user()->first_name;
    $user_ln = LoggedIn::user()->last_name;

    echo $this->blade->render('delete-acc', [
        'user_id' => $user_id,
        'user_fn' => $user_fn, 
        'user_ln' => $user_ln,
        'signer' => $this->signer
      ]);
  }

  public function postDeleteAcc()
  {
        // CSRF Check
        if (!$this->signer->validateSignature($_POST['_token'])) {
          header("HTTP/1.0 400 Bad Request");
          exit();
        }    

        $errors = [];

        $validation_data = [
          'password' => 'pass:5'
        ];

        // Validate Data
        $validator = new Validator;
        $errors = $validator->isValid($validation_data);

        // If validation fails -> back to register page
        // Display error messages
        if ((sizeof($errors) > 0) || (!empty($errors))) {
          $_SESSION['msg'] = $errors;
          header('Location: /MRT99y1i73Xsej9KZr0K8O77t7DTldnQ');
          exit();
        }
        
        // Verify old password
        if ((LoggedIn::user()) && (isset($_POST['password'])) && (isset($_POST['delete_acc']))) {
          $hash = new Hasher;
          $user = new User;

          // Search for loggedin user in DB
          $user_id = LoggedIn::user()->id;
          $user = $user->find($user_id);

          // Hash old password
          $password = $hash->hashPass($_POST['password'], 
                          $hash->regNonce($user->first_name, $user->email));

          // Compare
          if ($user->password === $password) {
            Comment::where('user_id', '=', $user->id)->delete();
            $user->delete();

            unset($_SESSION['user']);
            session_destroy();
            session_start();
            $_SESSION['success'] = ["Your account was deleted permanently. Feel free to come back any time."];
            header("Location: /");
            exit();
          } else {
            $_SESSION['msg'] = ["Password you entered is not correct!"];
            header("Location: /MRT99y1i73Xsej9KZr0K8O77t7DTldnQ");
            exit();
          }
        }
  }
}