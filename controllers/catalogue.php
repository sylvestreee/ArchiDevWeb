<?php

namespace Website\Controllers;
use Website\Models\Game as Game;
use Website\Models\Genre as Genre;

global $twig;
global $entityManager;

class Catalogue {
    private $twig;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    
    //
    public function index() {
        $editors    =   $this->entityManager
                        ->getRepository(Game::class)
                        ->createQueryBuilder('Game')
                        ->select('g.editor')
                        ->from('Website\Models\Game', 'g')
                        ->orderBy('g.editor', 'ASC')
                        ->distinct()
                        ->getQuery()
                        ->getResult();
                        
        $developers =   $this->entityManager
                        ->getRepository(Game::class)
                        ->createQueryBuilder('Game')
                        ->select('g.developer')
                        ->from('Website\Models\Game', 'g')
                        ->orderBy('g.developer', 'ASC')
                        ->distinct()
                        ->getQuery()
                        ->getResult();
                            
        $platforms  =   $this->entityManager
                        ->getRepository(Game::class)
                        ->createQueryBuilder('Game')
                        ->select('g.platform')
                        ->from('Website\Models\Game', 'g')
                        ->orderBy('g.platform', 'ASC')
                        ->distinct()
                        ->getQuery()
                        ->getResult();
                            
        $genres     =   $this->entityManager
                        ->getRepository(Genre::class)
                        ->createQueryBuilder('Genre')
                        ->select('g.name')
                        ->from('Website\Models\Genre', 'g')
                        ->orderBy('g.name', 'ASC')
                        ->distinct()
                        ->getQuery()
                        ->getResult();
                        
       $games       =   $this->entityManager
                        ->getRepository(Game::class)
                        ->createQueryBuilder('Game')
                        ->select('g')
                        ->from('Website\Models\Game', 'g')
                        ->orderBy('g.id', 'ASC')
                        ->getQuery()
                        ->getResult();

        $template = $this->twig->load("catalogue.twig");
        echo $template->render(["editors" => $editors, "developers" => $developers, "platforms" => $platforms, "genres" => $genres, "games" => $games]);
    }
    
    public function search($get) {
        $editors    =   $this->entityManager
                        ->getRepository(Game::class)
                        ->createQueryBuilder('Game')
                        ->select('g.editor')
                        ->from('Website\Models\Game', 'g')
                        ->orderBy('g.editor', 'ASC')
                        ->distinct()
                        ->getQuery()
                        ->getResult();
                        
        $developers =   $this->entityManager
                        ->getRepository(Game::class)
                        ->createQueryBuilder('Game')
                        ->select('g.developer')
                        ->from('Website\Models\Game', 'g')
                        ->orderBy('g.developer', 'ASC')
                        ->distinct()
                        ->getQuery()
                        ->getResult();
                            
        $platforms  =   $this->entityManager
                        ->getRepository(Game::class)
                        ->createQueryBuilder('Game')
                        ->select('g.platform')
                        ->from('Website\Models\Game', 'g')
                        ->orderBy('g.platform', 'ASC')
                        ->distinct()
                        ->getQuery()
                        ->getResult();
                            
        $genres     =   $this->entityManager
                        ->getRepository(Genre::class)
                        ->createQueryBuilder('Genre')
                        ->select('g.name')
                        ->from('Website\Models\Genre', 'g')
                        ->orderBy('g.name', 'ASC')
                        ->distinct()
                        ->getQuery()
                        ->getResult();
                        
        if(array_key_exists('title', $get)) {
            $word = $get["title"];
            $games  =   $this->entityManager
                             ->getRepository(Game::class)
                             ->createQueryBuilder('Game')
                             ->select('g')
                             ->from('Website\Models\Game', 'g')
                             ->where('upper(g.title) LIKE upper(:word)')
                             ->setParameter('word', '%'.$word.'%')
                             ->orderBy('g.id', 'ASC')
                             ->getQuery()
                             ->getResult();
        }
        else if(array_key_exists('editor', $get)) {
            $word = $get["editor"];
            $games  =   $this->entityManager
                             ->getRepository(Game::class)
                             ->createQueryBuilder('Game')
                             ->select('g')
                             ->from('Website\Models\Game', 'g')
                             ->where('upper(g.editor) LIKE upper(:word)')
                             ->setParameter('word', '%'.$word.'%')
                             ->orderBy('g.id', 'ASC')
                             ->getQuery()
                             ->getResult();
        }
        else if(array_key_exists('developer', $get)) {
            $word = $get["developer"];
            $games  =   $this->entityManager
                             ->getRepository(Game::class)
                             ->createQueryBuilder('Game')
                             ->select('g')
                             ->from('Website\Models\Game', 'g')
                             ->where('upper(g.developer) LIKE upper(:word)')
                             ->setParameter('word', '%'.$word.'%')
                             ->orderBy('g.id', 'ASC')
                             ->getQuery()
                             ->getResult();
        }
        else if(array_key_exists('platform', $get)) {
            $word = $get["platform"];
            $games  =   $this->entityManager
                             ->getRepository(Game::class)
                             ->createQueryBuilder('Game')
                             ->select('g')
                             ->from('Website\Models\Game', 'g')
                             ->where('upper(g.platform) LIKE upper(:word)')
                             ->setParameter('word', '%'.$word.'%')
                             ->orderBy('g.id', 'ASC')
                             ->getQuery()
                             ->getResult();
        }
        
        $template = $this->twig->load("catalogue.twig");
        echo $template->render(["editors" => $editors, "developers" => $developers, "platforms" => $platforms, "genres" => $genres, "games" => $games]);
    }
}