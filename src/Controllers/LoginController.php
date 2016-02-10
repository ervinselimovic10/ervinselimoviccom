<?php
namespace Onz\Controllers;

use duncan3dc\Laravel\BladeInstance;

class LoginController extends BaseController
{
  public function getLoginPage()
  {
    echo $this->blade->render('login');
  }

  public function postLoginPage()
  {

  }
}