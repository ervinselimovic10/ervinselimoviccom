<?php
namespace Onz\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Onz\Auth\LoggedIn;
use Onz\Models\Page;
use Onz\Models\Comment;
use Onz\Models\User;
use Onz\Models\Cat;
use Cocur\Slugify\Slugify;
use Onz\Validation\Validator;
use Onz\Controllers\CatController;

class PageController extends BaseController
{
    public function getHomePage()
    {
      echo $this->blade->render('home');
    }

    public static function myActiveClass($path)
    {
      $uri = $_SERVER['REQUEST_URI'];

      if ($uri == $path) {
        return "class='myactive'";
      } else {
        return "";
      }
    }

    public function getCookies()
    {
      echo $this->blade->render('cookies');
    }

    public function getBlog()
    {
      if ((isset($_GET['search'])) && !(empty($_GET['search']))) {
        $value = strval($_GET['search']);
        htmlspecialchars($value);

        if (Page::where('title', 'LIKE', '%'.$value.'%')->exists()) {
            $page = Page::where('title', 'LIKE', '%'.$value.'%')->get();

            echo $this->blade->render('blog', [
              'signer' => $this->signer,
              'cats' => Cat::all(),
              'pages' => $page
            ]);
            exit();
        } elseif (Page::where('page_content', 'LIKE', '%'.$value.'%')->exists()) {
            $page = Page::where('page_content', 'LIKE', '%'.$value.'%')->get();

            echo $this->blade->render('blog', [
              'signer' => $this->signer,
              'cats' => Cat::all(),
              'pages' => $page
            ]);
            exit();
        } else {
          $_SESSION['msg'] = ["Sorry, no results found..."];
          header("Location: /blog");
          exit();
        }
      }  

      echo $this->blade->render('blog', [
          'signer' => $this->signer,
          'cats' => Cat::all(),
          'pages' => Page::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public static function estimatedTime($post_content) 
    {
      $words = str_word_count( strip_tags( $post_content ) );
      $minutes = floor( $words / 120 );
      $seconds = floor( $words % 120 / ( 120 / 60 ) );

      if ( 1 <= $minutes ) {
          $estimated_time = $minutes . ' minute' . ($minutes == 1 ? '' : 's') . ', ' . $seconds . ' second' . ($seconds == 1 ? '' : 's');
      } else {
          $estimated_time = $seconds . ' second' . ($seconds == 1 ? '' : 's');
      }

      return $estimated_time;
    }

    public function getPage()
    {
      // Extract page name from the URL
      $uri = explode("/", $_SERVER['REQUEST_URI']);
      $target = $uri[1];

      if (count($uri) > 2) {
        echo "<h1 style='text-align:center;'>404 PAGE NOT FOUND</h1><hr/>";
        exit();
      }
      
      // Find matching category or page in the DB
      $cat_exists = Cat::where('slug', '=', $target)->exists();
      $page_exists = Page::where('slug', '=', $target)->exists();

      if ($cat_exists == true) {
        $cat = new CatController;
        $cat->target = $target;
        $cat->getCatPage();
        exit();
      }

      // If page exists and if user loggedin -> display page
      if ($page_exists == true) {

            $page = Page::where('slug', '=', $target)->get();

            foreach ($page as $item) {
              $page_id = $item->id;
              $browser_title = $item->browser_title;
              $title = $item->title;
              $page_content = $item->page_content;
              if (!empty($item->picture)) {
                $picture = $item->picture;
              } else {
                $picture = null;
              }
              $slug = $item->slug;
              $date = $this->formatDate($item->created_at);
            }
      } else {
        echo $this->blade->render('404');
        exit();
      }

      // Find matching comment for existing page
      $comment_exists = Comment::where('page_id', '=', $page_id)->exists();

      // Get the comments if there are any
      if ($comment_exists == true) {
        $user = new User;
        $comments = Comment::where('page_id', '=', $page_id)->orderBy('created_at', 'ASC')->get();
      } else {
        $comments = "";
        $user = "";
      }

      // Get estimated time
      $estimated_time = $this->estimatedTime($page_content);

      // Pass the content to template
      echo $this->blade->render('page', [
          'signer' => $this->signer,
          'page_id' => $page_id,
          'browser_title' => $browser_title,
          'title' => $title,
          'page_content' => $page_content,
          'picture' => $picture,
          'slug' => $slug,
          'date' => $date,
          'comments' => $comments,
          'user' => $user,
          'estimated_time' => $estimated_time
        ]);
    }

    public function postPage()
    {
      // CSRF Check
      if (!$this->signer->validateSignature($_POST['_token'])) {
        header("HTTP/1.0 400 Bad Request");
        exit();
      }

      // Extract page name from the URL
      $uri = explode("/", $_SERVER['REQUEST_URI']);
      $target = $uri[1];

      $page = new Page;
      $comment = new Comment;

      $page_id = Page::where('slug', '=', $target)->get();

      foreach ($page_id as $item) {
        $page_id = $item->id;
        $slug = $item->slug;
      }

      // Validate
      $errors = [];

      $validation_data = [
        'comment' => 'pass:10'
      ];

      // Validate Data
      $validator = new Validator;
      $errors = $validator->isValid($validation_data);

      // Manually not allowed characters 
      $no = ['š','č','ž','đ','ć'];
      foreach ($no as $i) {
        if (strpos($_POST['comment'], $i) !== false) {
          $_SESSION['msg'] = ["Sorry, comment contained characters that are not allowed."];
          header('Location: /'.$slug);
          exit();
        }
      }

      if (strlen($_POST['comment']) > 1000) {
        $errors[] = "Sorry, the length of a comment was too long.";
      }

      // If validation fails -> back to slug of page
      // Display error messages
      if ((sizeof($errors) > 0) || (!empty($errors))) {
        $_SESSION['msg'] = $errors;
        header('Location: /'.$slug);
        exit();
      }

      // Save comment in DB
      $comment->page_id = $page_id;
      $comment->user_id = LoggedIn::user()->id;
      $comment->comment = $_POST['comment'];
      $comment->save();

      header("Location: /".$slug);
      $_SESSION['success'] = ['Comment posted successfully!'];
      exit();
    }

    public function formatDate($date) 
    {
      $date = date("F j, Y, g:i a", strtotime($date));

      return $date;
    }
}
