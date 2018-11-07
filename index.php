<?php

$url = $_SERVER[REQUEST_URI];

require './views/global/header.html';

switch($url) {
  case "/" :
  case "/home" :
    require './controllers/home.php';
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

require './views/global/footer.html';


