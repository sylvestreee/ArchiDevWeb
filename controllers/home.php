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
                    ->setMaxResults(3)
                    ->getQuery()
                    ->getResult();
                    
        $bestsellers    =   $this->entityManager
                            ->getRepository(Game::class)
                            ->createQueryBuilder('Game')
                            ->select('g')
                            ->from('Website\Models\Game', 'g')
                            ->orderBy('g.id', 'ASC')
                            ->setMaxResults(3)
                            ->getQuery()
                            ->getResult();
                            
        $bestsellers    =   $this->entityManager
                            ->getRepository(Game::class)
                            ->createQueryBuilder('Game')
                            ->select('g')
                            ->from('Website\Models\Game', 'g')
                            ->innerJoin('g', 'Website\Models\Purchases', 'p', 'g.id = p.game_id')
                            ->groupBy()
                            ->select('c.name', 'i.type', 'count(i)'])
                            ->from('AppBundle:Category', 'c')
                            ->innerJoin('c.items','i')
                            ->groupBy('c.name')
                            ->addGroupBy('i.type');
                
        $template = $this->twig->load("home.twig");
        echo $template->render(["news" => $news, "bestsellers" => $bestsellers]);
    }
}