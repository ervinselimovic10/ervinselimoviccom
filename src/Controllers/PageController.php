<?php
namespace Onz\Controllers;

use duncan3dc\Laravel\BladeInstance;

class PageController extends BaseController
{
    public function getHomePage()
    {
      echo $this->blade->render('home');
    }
}
