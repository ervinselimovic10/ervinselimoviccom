<?php
namespace Onz\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Onz\Models\Cat;
use Onz\Models\Page;

class CatController extends BaseController
{
  public $target;

  public function getCatPage()
  {
    $cat = Cat::where('slug', '=', $this->target)->get();

    foreach ($cat as $item) {
      $cat_id = $item->id;
      $b_title = $item->browser_title;
      $title = $item->title;
    }

    $pages = Page::where('cat_id', '=', $cat_id)->orderBy('created_at', 'DESC')->get();

    echo $this->blade->render('category', [
        'b_title' => $b_title,
        'title' => $title,
        'pages' => $pages,
        'cats' => Cat::all()
      ]);
  }
}