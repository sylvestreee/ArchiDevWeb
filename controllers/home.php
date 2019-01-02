<?php

namespace Website\Controllers;
use Website\Models\Game as Game;
use Website\Models\Purchases as Purchases;

global $twig;
global $entityManager;

class Home {
    private $twig;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    
    public function index() {
        
        /*gets the 3 most recent game based on their release date*/
        $news   =   $this->entityManager
                    ->getRepository(Game::class)
                    ->createQueryBuilder('Game')
                    ->select('g')
                    ->from('Website\Models\Game', 'g')
                    ->orderBy('g.released', 'DESC')
                    ->distinct()
                    ->setMaxResults(3)
                    ->getQuery()
                    ->getResult();
                    
        /*gets the 3 most purchased games based of the number of their occurences in the Purchases table*/
        $purchases  =   $this->entityManager
                             ->getRepository(Purchases::class)
                             ->createQueryBuilder('Purchases')
                             ->select('p, count(p.game)')
                             ->from('Website\Models\Purchases', 'p')
                             ->groupBy("p.game")
                             ->orderBy('count(p.game)', 'DESC')
                             ->setMaxResults(3)
                             ->getQuery()
                             ->getResult();
        
        $bestsellers = array();
        foreach($purchases as $i => $p) {
            $bestsellers[$i] = $p[0]->getGame();
        }
                
        $template = $this->twig->load("home.twig");
        echo $template->render(["news" => $news, "bestsellers" => $bestsellers]);
    }
}