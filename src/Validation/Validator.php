<?php
namespace Onz\Validation;

use Respect\Validation\Validator as v;

class Validator
{
    public function isValid($validation_data)
    {
        $errors = [];

      foreach ($validation_data as $name => $value) {
          if (isset($_POST[$name])) {
            $input = $_POST[$name];
          } else {
            $ip = $_SERVER['REMOTE_ADDR'];

            unset($_SESSION['onz[user]']);
            session_destroy();
            session_start();
            $_SESSION['msg'] = ["Logged out because of some strange attempt: <strong>".$ip."</strong>"];
            header("Location: /");
            exit();
          }
          $rules = explode('|', $value);
                  
              foreach ($rules as $rule) {
                  $exploded = explode(':', $rule);

                  switch ($exploded[0]) {
                    case 'min':
                        $min = $exploded[1];
                        $name = $this->nameSet($name);

                          if (v::stringType()->notEmpty()->validate($input) == false) {
                            $errors[] = "Field <strong>".$name."</strong> should not be empty!";
                          } elseif (v::stringType()->length($min, 20)->validate($input) == false) {
                            $errors[] = "<strong>".$name."</strong> should be at least <strong>".$min."</strong> characters long and max. 20 characters!";
                          } elseif (v::stringType()->noWhitespace()->validate($input) == false) {
                            $errors[] = "Your input <strong>'".$input."'</strong> in field <strong>".$name."</strong> sould not contain whitespace!";
                          } elseif (v::stringType()->alpha()->validate($input) == false) {
                            $errors[] = "Your input <strong>'".$input."'</strong> in field <strong>".$name."</strong> contains strange characters!";
                          }             
                          break;

                    case 'pass':
                        $pass = $exploded[1];
                        $name = $this->nameSet($name);

                          if (v::stringType()->notEmpty()->validate($input) == false) {
                            $errors[] = "Field <strong>".$name."</strong> should not be empty!";
                          } elseif (v::stringType()->length($pass, null)->validate($input) == false) {
                            $errors[] = "<strong>".$name."</strong> must be at least ".$pass." characters long!";
                          }
                          break;

                    case 'email':
                        $name = $this->nameSet($name);

                          if (v::stringType()->notEmpty()->validate($input) == false) {
                            $errors[] = "Field <strong>".$name."</strong> should not be empty!";
                          } elseif (v::stringType()->email()->length(5, 65)->validate($input) == false) {
                            $errors[] = "<strong>'".$input."'</strong> is not a valid email address!";
                          }
                          break;

                    case 'equalTo':
                        $name = $this->nameUnset($name);

                          if (v::identical($input)
                                 ->validate($_POST[$exploded[1]]) == false) {
                              $name = $this->nameSet($name);
                              $errors[] = '<strong>'.$name.'s</strong> must be identical!';
                          }
                          break;

                    case 'unique':
                      $name = $this->nameUnset($name);
                      $model = "Onz\\Models\\".$exploded[1];
                      $table = new $model;
                      $results = $table::where($name, '=', $input)->get();
                      
                        foreach ($results as $item) {
                          $errors[] = "<strong>".$input."</strong> already exists in our system! Please retry.";
                        }
                          break;

                    default:
                      $errors[] = "NO VALUE FOUND!";
                  }
              }
      }
        return $errors;
    }

    protected function nameSet($name)
    {
        $name = ucfirst($name);
        if (strpos($name, '_') !== false) {
            $name = str_replace('_', ' ', $name);
        }
        return $name;
    }

    protected function nameUnset($name)
    {
        if (strpos($name, ' ') !== false) {
            $name = str_replace(' ', '_', $name);
        }
        $name = strtolower($name);
        return $name;
    }
}
