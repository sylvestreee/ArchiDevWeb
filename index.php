<?php

require_once './vendor/autoload.php';
require_once './bootstrap.php';

$loader = new Twig_Loader_Filesystem('./views');
$twig   = new Twig_Environment($loader);

$url    = $_SERVER['REQUEST_URI'];

$regex = "(\/([a-z0-9]*))";
$regex .= "([?](([a-z-_]+)[=]([a-z-_]+)))*";
$regex .= "([&]([a-z-_]+)[=]([a-z-_]+))*";
$regex .= "(\/([0-9]))*";

preg_match("/$regex/", $url, $match);
$controller = $match[2];

try {
  if()
  else if($controller == '') {
    $homeController = new Website\Controllers\home();
    $homeController->index();
  }
  else {
    throw new Exception();
  }
} catch (Exception $e) {
  $template = $twig->load('error.twig');
  echo $template->render();
}

/*
switch($url) {
  case "/" :
  case "/index.php" :
  case "/home" :
    $homeController = new Website\Controllers\home();
    $homeController->index();
    break;
  case "/catalogue" :
    $catalogueController = new Website\Controllers\catalogue();
    $catalogueController->index();
    break;
  case "/log" :
    require './controllers/log.php';
    break;
  case "/sign" :
    require './controllers/sign.php';
    echo "hey";
    break;
  case "/game" :
  	require './controllers/game.php';
  	break;
  case "/user" :
    require './controllers/user.php';
    break;
  case "/account" :
    require './controllers/account.php';
    break;
  case "/cart" :
    require './controllers/cart.php';
    break;
  default :
  	require './controllers/error.php';
    break;
}*/
