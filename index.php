<?php

session_start();

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
          $logController = new Website\Controllers\log();
          
          if($method == NULL) {
            $logController->index(); 
          }
          
          else {
            switch($method) {
              case "connection" :
                $logController->connection($_POST);
                break;
                
              case "disconnection" :
                $logController->disconnection();
                break;
                
              default :
                throw new Exception();
                break;
            }
          }
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
              case "registration" :
                $signController->registration($_POST);
                break;
              
              default :
                throw new Exception();
                break;
            }
          }
          break;
          
        /*user*/
        case "user" :
          $userController = new Website\Controllers\user();
          $userController->index();
          break;
  
        /*account*/
        case "account" :
          require './controllers/account.php';
          break;
          
        /*cart*/
        case "cart" :
          $cartController = new Website\Controllers\cart();
          
          if($method == NULL) {
            $cartController->index();
          }
          
          else {
            switch($method) {
              case "reservation" :
                $cartController->reservation($_GET);
                break;
              
              default :
                throw new Exception();
                break;
            }
          }
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