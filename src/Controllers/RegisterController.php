<?php
namespace Onz\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Onz\Validation\Validator;
use Onz\Validation\Hasher;
use Onz\Models\User;

class RegisterController extends BaseController
{
    public function getRegisterPage()
    {
        echo $this->blade->render('register');
    }

    public function postRegisterPage()
    {
        $errors = [];

        $validation_data = [
          'first_name' => 'min:3',
          'last_name' => 'min:3',
          'email' => 'email|equalTo:verify_email',
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

        // JUST A TEST --> REARRANGE WHEN YOU SEE CODE BELOW
        setcookie('onesnzeros[user]', $user->first_name, 0, '', '', '', true);
        setcookie('onesnzeros[authID]', $user->password, 0, '', '', '', true);
        echo "<hr/>Posted<hr/>";
    }
}