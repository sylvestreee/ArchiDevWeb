<?php

session_start();
// session_destroy();

require_once './vendor/autoload.php';
require_once './bootstrap.php';

$loader = new Twig_Loader_Filesystem('./views');
$twig   = new Twig_Environment($loader);
$twig->addGlobal("session", $_SESSION);

$url    = $_SERVER['REQUEST_URI'];

$regex  = '/[\/]*([A-Z0-9a-z]+)[\/]*';
$regex .= '(([A-Z0-9a-z]*)';
$regex .= '([\?][a-zA-Z\[\]]*[\=][a-zA-Z]*';
$regex .= '([\&][a-zA-Z\[\]]*[\=][a-zA-Z]*)*';
$regex .= '\/*)*|[\/]*)/';

preg_match($regex, $url, $match);
//var_dump($match)
$controller = $match[1];
//var_dump($controller);
$method = $match[3];
//var_dump($method);

// var_dump($_GET);
// index($_GET);

try {
  if($controller == NULL || $controller == "index") {
    $homeController = new Website\Controllers\home();
    $homeController->index();
  }
  else {
    if(is_file("./controllers/".$controller.".php")) {
      switch($controller) {
        
        /*home*/
        case "home" :
          $homeController = new Website\Controllers\home();
          $homeController->index();
          break;
        
        /*catalogue*/
        case "catalogue" :
          $catalogueController = new Website\Controllers\catalogue();
          
          /*if the user only wants to see the catalogue*/
          if($method == NULL) {
            $catalogueController->index();
          }
          else {
            
            /*if the user did a research in the navbar*/
            switch($method) {
              case "search" :
                $catalogueController->search($_GET);
                break;
                
              case "filter" :
                $catalogueController->filter($_GET);
                break;
              
              default :
                throw new Exception();
                break;
            }
          }
          break;
          
        /*game*/
        case "game" :
          $gameController = new Website\Controllers\game();
          if($gameController->exist($_GET)) {
            $gameController->index($_GET);
          }
          else {
            throw new Exception();
          }
          break;
        
        /*log*/
        case "log" :
          require './controllers/log.php';
          break;
          
        /*sign*/
        case "sign" :
          $signController = new Website\Controllers\sign();
          
          if($method == NULL) {
            $signController->index();
          }
          
          else {
            
            /*if the user did a research in the navbar*/
            switch($method) {
              case "connexion" :
                $signController->connexion($_POST);
                break;
              
              default :
                throw new Exception();
                break;
            }
          }
          break;
          
        /*user*/
        case "user" :
          require './controllers/user.php';
          break;
  
        /*account*/
        case "account" :
          require './controllers/account.php';
          break;
          
        /*cart*/
        case "cart" :
          require './controllers/cart.php';
          break;
          
        default :
          throw new Exception();
      }
    }
    else {
      throw new Exception();
    }
  }
} catch (Exception $e) {
  $template = $twig->load('error.twig');
  echo $template->render();
}