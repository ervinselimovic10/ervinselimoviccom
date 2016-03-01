<?php
namespace Onz\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{
    //public $timestamps = false;

    public function user()
    {
      return $this->hasOne('Onz\Models\User');
    }

    public function page()
    {
      return $this->hasOne('Onz\Models\Page');
    }
}