<?php
namespace Onz\Validation;

class Hasher 
{
  public function regNonce($first_name, $email)
  {
    $nonce = sha1("registration-".$first_name.$email.getenv('NONCE_SALT'));

    return $nonce;
  }

  public function authNonce($first_name, $email)
  {
    $auth_nonce = sha1("cookie-".$first_name.$email.getenv('AUTH_SALT'));

    return $auth_nonce;
  }

  public function hashPass($pass, $nonce)
  {
    $hashed = hash_hmac(getenv('HASH'), $pass.$nonce, getenv('SITE_KEY'));

    return $hashed;
  }
}