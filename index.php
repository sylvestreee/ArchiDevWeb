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
                if(empty($_SESSION['id'])) {
                  $logController->connection($_POST);
                }
                else {
                  throw new Exception();
                }
                break;
                
              case "disconnection" :
                if(!empty($_SESSION['id'])) {
                  $logController->disconnection();
                }
                else {
                  throw new Exception();
                }
                break;
                
              default :
                throw new Exception();
                break;
            }
          }
          break;
          
        /*sign*/
        case "sign" :
          if(empty($_SESSION['id'])) {
            $signController = new Website\Controllers\sign();
            
            if($method == NULL) {
              $signController->index();
            }
            
            else {
              
              switch($method) {
                case "registration" :
                  $signController->registration($_POST);
                  break;
                
                default :
                  throw new Exception();
                  break;
              }
            }
          }
          else {
            throw new Exception();
          }
          break;
          
        /*user*/
        case "user" :
          if(!empty($_SESSION['id'])) {
            $userController = new Website\Controllers\user();
            $userController->index();
          }
          else {
            throw new Exception();
          }
          break;
  
        /*account*/
        case "account" :
          if(!empty($_SESSION['id'])) {
            $accountController = new Website\Controllers\account();
            
            if($method == NULL) {
              $accountController->index();
            }
            
            else {
              
              switch($method) {
                case "update" :
                  $accountController->update($_POST);
                  break;
                
                default :
                  throw new Exception();
                  break;
              }
            }
          }
          else {
            throw new Exception();
          }
          break;
          
        /*cart*/
        case "cart" :
          if(!empty($_SESSION['id'])) {
            $cartController = new Website\Controllers\cart();
            
            if($method == NULL) {
              $cartController->index();
            }
            
            else {
              switch($method) {
                case "reservation" :
                  $cartController->reservation($_GET);
                  break;
                  
                case "cancel" :
                  echo "yolo";
                  $cartController->cancel($_GET);
                  break;
                
                default :
                  throw new Exception();
                  break;
              }
            }
          }
          else {
            throw new Exception();
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