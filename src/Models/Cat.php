<?php
namespace Onz\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Cat extends Eloquent
{
    public function pages()
    {
      return $this->hasMany('Onz\Models\Page');
    }
}