<?php 
namespace Onz\Auth;

use Onz\Model\User;

class LoggedIn
{
  public static function user()
  {
    if ((isset($_SESSION['onz[user]'])) && (!empty($_SESSION['onz[user]']))) {
      $user = $_SESSION['onz[user]'];

      return $user;
    } else {
      return false;
    }
  }
}