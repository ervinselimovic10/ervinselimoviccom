<?php
namespace Onz\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Kunststube\CSRFP\SignatureGenerator;

class BaseController
{
  protected $signer;
  protected $blade;

  public function __construct()
  {
    $this->signer = new SignatureGenerator(getenv('CSRF'));
    $this->blade = new BladeInstance('/home/httpd/ervinselimovic.com/http/onesnzeros/views/', '/home/httpd/ervinselimovic.com/http/onesnzeros/cache/views/');
  }
}