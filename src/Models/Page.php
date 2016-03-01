<?php
namespace Onz\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Page extends Eloquent
{
    public function user()
    {
      return $this->hasOne('Onz\Models\User');
    }

    public function comments()
    {
      return $this->hasMany('Onz\Models\Comment'); 
    }

    public function cat()
    {
      return $this->hasOne('Onz\Models\Cat');
    }
}