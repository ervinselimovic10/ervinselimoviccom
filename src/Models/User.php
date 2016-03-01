<?php
namespace Onz\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    public function comments()
    {
      return $this->hasMany('Onz\Models\Comment');
    }

    public function pages()
    {
      return $this->hasMany('Onz\Models\Page');
    }
}
