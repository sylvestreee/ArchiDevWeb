<?php

namespace Website\Controllers;
use Website\Models\Game as Game;

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
                    
        $bestsellers    =   $this->entityManager
                            ->getRepository(Game::class)
                            ->createQueryBuilder('Game')
                            ->select('g')
                            ->from('Website\Models\Game', 'g')
                            ->orderBy('g.released', 'DESC')
                            ->distinct()
                            ->setMaxResults(3)
                            ->getQuery()
                            ->getResult();
                            
                            //var_dump($bestsellers);
                
        $template = $this->twig->load("home.twig");
        echo $template->render(["news" => $news, "bestsellers" => $bestsellers]);
    }
}