<?php
namespace Onz\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Onz\Validation\Validator;
use Onz\Auth\LoggedIn;
use Onz\Email\SendEmail;
use Onz\Models\User;

class ContactController extends BaseController
{
  public function getContact()
  {
    $user_id = LoggedIn::user()->id;
    $user_fn = LoggedIn::user()->first_name;
    $user_ln = LoggedIn::user()->last_name;
    $user = new User;
    $user = $user->find($user_id);
    $email = $user->email;

    echo $this->blade->render('contact', [
        'user_fn' => $user_fn,
        'user_ln' => $user_ln,
        'email' => $email,
        'signer' => $this->signer
      ]);
  }

  public function postContact()
  {
    if ((LoggedIn::user()) && (isset($_POST['sendemail'])) && (isset($_POST['email']))) {
    // CSRF Check
      if (!$this->signer->validateSignature($_POST['_token'])) {
        header("HTTP/1.0 400 Bad Request");
        exit();
      }
      
      $errors = [];

      $validation_data = [
        'subject' => 'pass:5',
        'message' => 'pass:15',
        'email' => 'email'
      ];

      // Validate Data
      $validator = new Validator;
      $errors = $validator->isValid($validation_data);

      // Manually not allowed characters 
      $no = ['š','č','ž','đ','ć'];
      foreach ($no as $i) {
        if (strpos($_POST['message'], $i) !== false) {
          $_SESSION['msg'] = ["Sorry, message contained characters that are not allowed."];
          header('Location: /contact');
          exit();
        }
      }

      if (strlen($_POST['message']) > 600) {
        $errors[] = "Sorry, the length of a message was too long.";
      }

        // If validation fails -> back to register page
        // Display error messages
      if ((sizeof($errors) > 0) || (!empty($errors))) {
        $_SESSION['msg'] = $errors;
        header('Location: /contact');
        exit();
      }

      // Gather info
      $from = $_POST['email'];
      $message = $_POST['message'];
      $subject = $_POST['subject'];
      $to = getenv('ADMIN_MAIL');

      // Send Email
      SendEmail::send($to, $subject, $message, $from);

      $_SESSION['success'] = ["Message sent successfully! Don't hasitate to continue surfing!"];
      header("Location: /");
      exit();
    } else {
      $_SESSION['error'] = ["Something went wrong...Please retry."];
      header("Location: /contact");
      exit();
    }
  }
}