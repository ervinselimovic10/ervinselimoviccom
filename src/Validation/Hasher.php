<?php
namespace Onz\Validation;

class Hasher 
{
  public function generateRS($length = 256) 
  {
    $characters = getenv('RAND_KEY');
    $charactersLength = strlen($characters);
    $randomString = '';

      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
    
    return $randomString;
  }

  public function regNonce($first_name, $email)
  {
    $nonce = sha1("registration-".$first_name.$email.getenv('NONCE_SALT'));

    return $nonce;
  }

  public function authNonce($first_name, $email, $rand)
  {
    $auth_nonce = sha1("cookie-".$first_name.$email.$rand.getenv('AUTH_SALT'));

    return $auth_nonce;
  }

  public function sessNonce($first_name, $email, $rand)
  {
    $sess_nonce = sha1("session-".$first_name.$email.$rand.getenv('SESS_SALT'));

    return $sess_nonce;
  }

  public function phpsessid($rand)
  {
    $phpsessid = sha1("phpsessid-".$rand.getenv('RAND_KEY').getenv('NONCE_SALT').getenv('AUTH_SALT').getenv('SESS_SALT'));

    return $phpsessid;
  }

  public function hashPass($pass, $nonce)
  {
    $hashed = hash_hmac('sha512', $pass.$nonce, getenv('SITE_KEY'));

    return $hashed;
  }
}