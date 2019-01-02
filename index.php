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
          
          /*display of all games in the catalogue*/
          if($method == NULL) {
            $catalogueController->index();
          }
          else {
            switch($method) {
              
              /*display of the catalogue after a research via the search bar*/ 
              case "search" :
                $catalogueController->search($_GET);
                break;
                
              /*display of the catalogue after a filtering via filter options*/
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
            
            /*display of the product page of the game*/
            $gameController->index($_GET);
          }
          else {
            throw new Exception();
          }
          break;
        
        /*log*/
        case "log" :
          $logController = new Website\Controllers\log();
          
          /*display of the log in page*/
          if($method == NULL) {
            $logController->index(); 
          }
          
          else {
            switch($method) {
              
              /*if an user wants to connect to his account*/
              case "connection" :
                
                /*an user can only connect if he's not already connected*/
                if(empty($_SESSION['id'])) {
                  $logController->connection($_POST);
                }
                else {
                  throw new Exception();
                }
                break;
                
              /*if an user wants to disconnect from his account*/
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
            
            /*display of the account creation page*/
            if($method == NULL) {
              $signController->index();
            }
            
            else {
              switch($method) {
                
                /*if an user registrated a new account*/
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
            
            /*display of the an user's account informations modification page*/
            if($method == NULL) {
              $accountController->index();
            }
            
            else {
              
              switch($method) {
                
                /*if an user updated his account informations*/
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
            
            /*display of an user's cart*/
            if($method == NULL) {
              $cartController->index();
            }
            
            else {
              switch($method) {
                
                /*if an user added a game to his cart*/
                case "reservation" :
                  $cartController->reservation($_GET);
                  break;
                  
                /*if an user deleted a game from his cart*/
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