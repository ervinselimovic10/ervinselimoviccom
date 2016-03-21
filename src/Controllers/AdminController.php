<?php
namespace Onz\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Onz\Models\Page;
use Onz\Models\User;
use Onz\Models\Comment;
use Onz\Models\Cat;
use Onz\Auth\LoggedIn;
use Onz\Validation\Validator;
use Cocur\Slugify\Slugify;
use Onz\Email\SendEmail;

class AdminController extends BaseController
{
  public function getAddPage()
  {
    $user_id = LoggedIn::user()->id;
    $user_fn = LoggedIn::user()->first_name;
    $cats = Cat::all(); 

    echo $this->blade->render('add-page', [
        'user_id' => $user_id,
        'user_fn' => $user_fn,
        'cats' => $cats
      ]);
  }

  public function postAddPage()
  {
      if (isset($_FILES["file"]["name"])) {
        $targetPath = "assets/img/";
        $targetPath = $targetPath.basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath);
      }
      
      $page = new Page;
      $slugify = new Slugify;
      $page->user_id = $_POST['id'];
      $page->browser_title = $_POST['b_title'];
      $page->title = $_POST['title'];
      $page->page_content = $_POST['page_content'];
      $page->picture = $_FILES["file"]["name"];
      $page->slug = $slugify->slugify($_POST['b_title']);
      if ($page->where('slug', '=', $page->slug)->exists()) {
        $_SESSION['msg'] = ["Slug already exists!"];
        header("Location: /E4tHR2ItQGcka7MBHXxkCDO1oGM8JC8m");
        exit();
      }
      $page->cat_id = $_POST['cat'];
      $page->save();

      // Send mail to all users 
      if (isset($_POST['sendall'])) {
        $users = new User;
        $slugify = new Slugify;
        $users = $users::all();
        $page_title = $_POST['title'];
        $page_slug = $slugify->slugify($_POST['b_title']);
        foreach ($users as $user) {
          $message = $this->blade->render('email.newpost', ['title' => $page_title, 'slug' => $page_slug]);
          SendEmail::send($user->email, "New post added on .onz, dear ".$user->first_name."!", $message, $from = '');
        }
      }

      $_SESSION['success'] = ["Page successfully added!"];
      header("Location: /".$page->slug);
      exit();
  }

  public function getDeletePage()
  {
    $user_fn = LoggedIn::user()->first_name;

    echo $this->blade->render('delete-page', 
      ['user_fn' => $user_fn]
      );
  }

  public function postDeletePage()
  {
    $slug = $_POST['delete'];
    $page = Page::where('slug', '=', $slug);
    $user_fn = LoggedIn::user()->first_name;

    if ($page->exists()) {
      $page = $page->get();
      
      foreach ($page as $item) {
        $page_id = $item->id;
      }

      Comment::where('page_id', '=', $page_id)->delete();
      Page::where('slug', '=', $slug)->delete();
    } else {
      $_SESSION['msg'] = [$user_fn.", page you attempt to delete <strong>does not exist</strong>!"];
      header("Location: /6qOdy7uoRhYAHG5ZuNPROvPTlvQ84069");
      exit();
    }

    $_SESSION['success'] = [$user_fn.", page was deleted successfully!"];
    header("Location: /6qOdy7uoRhYAHG5ZuNPROvPTlvQ84069");
    exit();
  }

  public function postSavePage()
  {
    $page_id = $_POST['page_id'];
    $page_content = $_POST['thedata'];

    $page = Page::find($page_id);
    $page->page_content = $page_content;
    $page->save();

    echo "Saved!";
  }

  public function getAddCat()
  {
    $user_fn = LoggedIn::user()->first_name;

    echo $this->blade->render('add-cat', [
        'user_fn' => $user_fn
      ]);
  }

  public function postAddCat()
  {
    if (isset($_POST['submit-delete'])) {
        $slug = $_POST['delete'];
        $user_fn = LoggedIn::user()->first_name;
        $cat = Cat::where('slug', '=', $slug)->get();

        foreach ($cat as $item) {
          $cat_id = $item->id;
        }

        if (Page::where('cat_id', '=', $cat_id)->exists()) {
          $page = Page::where('cat_id', '=', $cat_id)->get();

          foreach ($page as $item) {
            $page_id = $item->id;
          }

          if (Comment::where('page_id', '=', $page_id)->exists()) {
            Comment::where('page_id', '=', $page_id)->delete();
          }

          Page::where('cat_id', '=', $cat_id)->delete();
        }

        Cat::where('slug', '=', $slug)->delete();

        $_SESSION['success'] = [$user_fn.", <strong>NOTE!</strong> Category, it's posts and post's comments were deleted permanently!"];
        header("Location: /Pt6u79I8GFnSvJl8bAS3mv0LcJEvrhae");
        exit();
    } else {
        $user_fn = LoggedIn::user()->first_name;
        $cat = new Cat;
        $slugify = new Slugify;
        $cat->browser_title = $_POST['b_title'];
        $cat->title = $_POST['title'];
        $cat->slug = $slugify->slugify($_POST['b_title']);
        $cat->save();

        $_SESSION['success'] = [$user_fn.", category successfully added!"];
        header("Location: /".$cat->slug);
        exit();
    }
  }

  public function getUsers()
  {
    $user_fn = LoggedIn::user()->first_name;

    echo $this->blade->render('add-user', [
        'user_fn' => $user_fn,
        'users' => User::all()
      ]);
  }

  public function postUsers()
  {
    $delete = $_POST['delete'];

    foreach ($delete as $id) {
      if (Comment::where('user_id', '=', $id)->exists()) {
        Comment::where('user_id', '=', $id)->delete();
      }
      
      User::where('id', '=', $id)->delete();
    }

    $user_fn = LoggedIn::user()->first_name;
    $_SESSION['success'] = [$user_fn.", <strong>NOTE!</strong> User and his footprints were deleted permanently!"];
    header("Location: /x1dB59d3Sr60f8OxA8m0739KMfvey7EZ");
    exit();
  }
}