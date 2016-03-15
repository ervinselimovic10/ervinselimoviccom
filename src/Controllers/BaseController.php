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
    $this->blade = new BladeInstance(getenv('BLADE_PATH'), getenv('BLADE_CACHE_PATH'));
  }
}