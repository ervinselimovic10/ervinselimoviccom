<?php 
$controller = null;
$method = null;

// Session, AltoRouter
require(__DIR__."/../bootstrap/start.php");
// Get access to .env in root DIR before requiring DB conn
Dotenv::load(__DIR__."/../");
// Require DB conn
require(__DIR__."/../bootstrap/db.php");
// Specified site routes
require(__DIR__."/../routes.php");

// Check for a match between made request and our routes
$match = $router->match();

// Take values from $match['target'] and assign it to variables
// but first explode the $match['target'] at the @ sign
if (is_string($match['target'])) {
  list($controller, $method) = explode('@', $match['target']);
}

// If the method on specific controller object is callable then...
if (($controller !== null) && (is_callable(array($controller, $method)))) {
  // initialize that controller object
  $object = new $controller;
  // and call the object's method and pass it params if there are any
  call_user_func_array(array($object, $method), array($match['params']));
} elseif ($match && is_callable($match['target'])) {
  call_user_func_array($match['target'], $match['params']);
} else {
  //echo "Cannot find $controller -> $method";
  header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
  exit();
}