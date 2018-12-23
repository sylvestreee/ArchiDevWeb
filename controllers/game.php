<?php

namespace Website\Controllers;
use Website\Models\Game as GameModel;
use Website\Models\Genre as Genre;

global $twig;
global $entityManager;

class Game {
    private $twig;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    
    //
    public function index($get) {
        $id = $get["id"];
        $game   =   $this->entityManager
                         ->getRepository(GameModel::class)
                         ->createQueryBuilder('Game')
                         ->select('g')
                         ->from('Website\Models\Game', 'g')
                         ->where("g.id = $id")
                         ->getQuery()
                         ->getOneOrNullResult();

        $template = $this->twig->load("game.twig");
        echo $template->render(["game" => $game]);
    }
    
    public function exist($get) {
        $id = $get["id"];
        $game   =   $this->entityManager
                         ->getRepository(GameModel::class)
                         ->createQueryBuilder('Game')
                         ->select('g')
                         ->from('Website\Models\Game', 'g')
                         ->where("g.id = $id")
                         ->getQuery()
                         ->getOneOrNullResult();
                         
        if($game == NULL) {
            return false;
        }
        else {
            return true;
        }
    }
}