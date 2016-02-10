<?php
namespace Onz\Validation;

use Respect\Validation\Validator as v;

class Validator
{
    public function isValid($validation_data)
    {
        $errors = [];

      foreach ($validation_data as $name => $value) {
          $input = $_POST[$name];

          if (isset($input)) {
              $rules = explode('|', $value);
                  
              foreach ($rules as $rule) {
                  $exploded = explode(':', $rule);

                  switch ($exploded[0]) {
                    case 'min':
                      $min = $exploded[1];
                      if (v::stringType()
                             ->alpha()
                             ->notEmpty()
                             ->length($min, null)
                             ->noWhitespace()
                             ->validate($input) == false) {  
                          $name = $this->nameSet($name);

                          if (v::notEmpty()->validate($input) == false) {
                            $errors[] = "Field <strong>".$name."</strong> should not be empty!";
                          } elseif(v::length($min, null)->validate($input) == false) {
                            $errors[] = "<strong>".$name."</strong> should be at least <strong>".$min."</strong> characters long!";
                          } elseif(v::noWhitespace()->validate($input) == false) {
                            $errors[] = "Your input <strong>'".$input."'</strong> in field <strong>".$name."</strong> sould not contain whitespace!";
                          } else {
                            $errors[] = "Your input <strong>'".$input."'</strong> in field <strong>".$name."</strong> contains strange characters!";
                          }
                      }
                    break;

                    case 'pass':
                      $pass = $exploded[1];
                      if (v::stringType()
                             ->notEmpty()
                             ->length($pass, null)
                             ->validate($input) == false) {
                          $name = $this->nameSet($name);

                          if (v::notEmpty()->validate($input) == false) {
                            $errors[] = "Field <strong>".$name."</strong> should not be empty!";
                          } else {
                            $errors[] = "<strong>".$name."</strong> must be at least ".$pass." characters long!";
                          }
                      }
                    break;

                    case 'email':
                      if (v::stringType()
                             ->email()
                             ->notEmpty()
                             ->length(5, null)
                             ->validate($input) == false) {
                          $name = $this->nameSet($name);

                          if (v::notEmpty()->validate($input) == false) {
                            $errors[] = "Field <strong>".$name."</strong> should not be empty!";
                          } else {
                            $errors[] = "<strong>'".$input."'</strong> is not a valid email address!";
                          }
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

                    default:
                      // Nothing for default
                  }
              }
          } else {
              $errors[] = "NO VALUE FOUND!";
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
