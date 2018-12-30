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
$method = $match[3];

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
            switch($method) {
              
              /*use of the navbar*/ 
              case "search" :
                $catalogueController->search($_GET);
                break;
                
              /*use of the filter options*/
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
          
          /*test if the game exists or not*/
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
              
              /*connection to an account*/
              case "connection" :
                
                /*an user can only connect if he's not already connected*/
                if(empty($_SESSION['id'])) {
                  $logController->connection($_POST);
                }
                else {
                  throw new Exception();
                }
                break;
                
              /*disconnection from an account*/
              case "disconnection" :
                
                /*an user can only disconnect if he's connected*/
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
          
          /*an user can only create a new account if he's not connected*/
          if(empty($_SESSION['id'])) {
            $signController = new Website\Controllers\sign();
            
            if($method == NULL) {
              $signController->index();
            }
            
            else {
              
              switch($method) {
                
                /*registration of a new account*/
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
          
          /*an user can only see his account informations if he's connected*/
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
          
          /*an user can only modify his account informations if he's connected*/
          if(!empty($_SESSION['id'])) {
            $accountController = new Website\Controllers\account();
            
            if($method == NULL) {
              $accountController->index();
            }
            
            else {
              
              switch($method) {
                
                /*update account informations*/
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
          
          /*an user can only see and modify his cart if he's connected*/
          if(!empty($_SESSION['id'])) {
            $cartController = new Website\Controllers\cart();
            
            if($method == NULL) {
              $cartController->index();
            }
            
            else {
              switch($method) {
                
                /*add a game to the cart*/
                case "reservation" :
                  $cartController->reservation($_GET);
                  break;
                  
                /*delete a game from the cart*/
                case "cancel" :
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