<?php

namespace Website\Controllers;
use Website\Models\User as User;
use Website\Models\Game as Game;
use Website\Models\Cart as CartModel;

global $twig;
global $entityManager;

class Cart {
    private $twig;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    
    public function index() {
        $id = $_SESSION['id'];
        $reserved   =   $this->entityManager
                             ->getRepository(CartModel::class)
                             ->createQueryBuilder('Cart')
                             ->select('c')
                             ->from('Website\Models\Cart', 'c')
                             ->distinct()
                             ->getQuery()
                             ->getResult();
        
        $games = array();
        foreach($reserved as $res) {
            if($res->getUser()->getId() == $id) {
                array_push($games, $res->getGame());
            }
        }
        
        $template = $this->twig->load('cart.twig');
        echo $template->render(["games" => $games]);
    }
    
    public function reservation($get) {
        $user_id = $_SESSION['id'];
        $game_id = $get['id'];
        
        $game   =   $this->entityManager
                         ->getRepository(Game::class)
                         ->createQueryBuilder('Game')
                         ->select('g')
                         ->from('Website\Models\Game', 'g')
                         ->where("g.id = $game_id")
                         ->getQuery()
                         ->getOneOrNullResult(); 
                         
        $user   =   $this->entityManager
                         ->getRepository(User::class)
                         ->createQueryBuilder('User')
                         ->select('u')
                         ->from('Website\Models\User', 'u')
                         ->where("u.id = $user_id")
                         ->getQuery()
                         ->getOneOrNullResult(); 
                         
        $cart = new CartModel;
        $cart->setGame($game);
        $cart->setUser($user);
        $this->entityManager->persist($cart);
        $this->entityManager->flush();
        header ('location: /cart');
    }
}