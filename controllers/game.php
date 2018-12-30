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
    
    public function getGame($game) {
        $game   =   $this->entityManager
                         ->getRepository(GameModel::class)
                         ->createQueryBuilder('Game')
                         ->select('g')
                         ->from('Website\Models\Game', 'g')
                         ->where("g.id = $game")
                         ->getQuery()
                         ->getOneOrNullResult();
                         
        return $game;
    }
    public function index($get) {
        $game = $this->getGame($get['id']);

        $template = $this->twig->load("game.twig");
        echo $template->render(["game" => $game]);
    }
    
    public function exist($get) {
        $game = $this->getGame($get['id']);
                         
        if($game == NULL) {
            return false;
        }
        else {
            return true;
        }
    }
}