<?php

require_once './vendor/autoload.php';
require_once './bootstrap.php';

$loader = new Twig_Loader_Filesystem('./views');
$twig   = new Twig_Environment($loader);

$url    = $_SERVER['REQUEST_URI'];

switch($url) {
  case "/" :
  case "/index.php" :
  case "/home" :
    $homeController = new Website\Controllers\home();
    $homeController->index();
    break;
  case "/catalogue" :
    require './controllers/catalogue.php';
    break;
  case "/log" :
    require './controllers/log.php';
    break;
  case "/sign" :
    require './controllers/sign.php';
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
}
