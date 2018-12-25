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
    
    //editor option
    public function editorFilter($word) {
        $game   =   $this   ->entityManager
                            ->getRepository(Game::class)
                            ->createQueryBuilder('Game')
                            ->select('g')
                            ->from('Website\Models\Game', 'g')
                            ->where('upper(g.editor) LIKE upper(:word)')
                            ->setParameter('word', '%'.$word.'%')
                            ->orderBy('g.id', 'ASC')
                            ->getQuery()
                            ->getResult();
        
        return $game;
    }
    
    //developer option
    public function developerFilter($word) {
        $game   =   $this   ->entityManager
                            ->getRepository(Game::class)
                            ->createQueryBuilder('Game')
                            ->select('g')
                            ->from('Website\Models\Game', 'g')
                            ->where('upper(g.developer) LIKE upper(:word)')
                            ->setParameter('word', '%'.$word.'%')
                            ->orderBy('g.id', 'ASC')
                            ->getQuery()
                            ->getResult();
                            
        return $game;
    }
    
    //platform option
    public function platformFilter($word) {
        $game   =   $this   ->entityManager
                            ->getRepository(Game::class)
                            ->createQueryBuilder('Game')
                            ->select('g')
                            ->from('Website\Models\Game', 'g')
                            ->where('upper(g.platform) LIKE upper(:word)')
                            ->setParameter('word', '%'.$word.'%')
                            ->orderBy('g.id', 'ASC')
                            ->getQuery()
                            ->getResult();
                            
        return $game;
    }
    
    //released period option
    public function releasedFilter($word) {
        switch($word) {
            case "<0" :
                $game   =   $this ->entityManager
                                  ->getRepository(Game::class)
                                  ->createQueryBuilder('Game')
                                  ->select('g')
                                  ->from('Website\Models\Game', 'g')
                                  ->where('g.released >= CURRENT_DATE()')
                                  ->orderBy('g.id', 'ASC')
                                  ->getQuery()
                                  ->getResult();
                break;
                
            case "-3" :
                $game   =   $this ->entityManager
                                  ->getRepository(Game::class)
                                  ->createQueryBuilder('Game')
                                  ->select('g')
                                  ->from('Website\Models\Game', 'g')
                                  ->where('g.released >= CURRENT_DATE() AND g.released <= DATE_ADD(CURRENT_DATE(), INTERVAL 3 MONTH)')
                                  ->orderBy('g.id', 'ASC')
                                  ->getQuery()
                                  ->getResult();
                break;
            
            case "3-6" :
                $game   =   $this ->entityManager
                                  ->getRepository(Game::class)
                                  ->createQueryBuilder('Game')
                                  ->select('g')
                                  ->from('Website\Models\Game', 'g')
                                  ->where('g.released >= DATE_ADD(CURRENT_DATE(), INTERVAL 3 MONTH) AND g.released <= DATE_ADD(CURRENT_DATE(), INTERVAL 6 MONTH)')
                                  ->orderBy('g.id', 'ASC')
                                  ->getQuery()
                                  ->getResult();
                break;
            
            case "6-12" :
                $game   =   $this ->entityManager
                                  ->getRepository(Game::class)
                                  ->createQueryBuilder('Game')
                                  ->select('g')
                                  ->from('Website\Models\Game', 'g')
                                  ->where('g.released >= DATE_ADD(CURRENT_DATE(), INTERVAL 6 MONTH) AND g.released <= DATE_ADD(CURRENT_DATE(), INTERVAL 12 MONTH)')
                                  ->orderBy('g.id', 'ASC')
                                  ->getQuery()
                                  ->getResult();
                break;
                
            case ">12" :
                $game   =   $this ->entityManager
                                  ->getRepository(Game::class)
                                  ->createQueryBuilder('Game')
                                  ->select('g')
                                  ->from('Website\Models\Game', 'g')
                                  ->where('g.released >= DATE_ADD(CURRENT_DATE(), INTERVAL 12 MONTH)')
                                  ->orderBy('g.id', 'ASC')
                                  ->getQuery()
                                  ->getResult();
                break;
                
            default :
                return NULL;
                break;
        }
        
        return $game;
    }
    
    //price option
    public function priceFilter($word) {
        switch($word) {
            case "<25" :
                $game   =   $this ->entityManager
                                  ->getRepository(Game::class)
                                  ->createQueryBuilder('Game')
                                  ->select('g')
                                  ->from('Website\Models\Game', 'g')
                                  ->where('g.price <= 25')
                                  ->orderBy('g.id', 'ASC')
                                  ->getQuery()
                                  ->getResult();
                break;
                
            case "25-50" :
                $game   =   $this ->entityManager
                                  ->getRepository(Game::class)
                                  ->createQueryBuilder('Game')
                                  ->select('g')
                                  ->from('Website\Models\Game', 'g')
                                  ->where('g.price >= 25 AND g.price <= 50')
                                  ->orderBy('g.id', 'ASC')
                                  ->getQuery()
                                  ->getResult();
                break;
            
            case "50-75" :
                $game   =   $this ->entityManager
                                  ->getRepository(Game::class)
                                  ->createQueryBuilder('Game')
                                  ->select('g')
                                  ->from('Website\Models\Game', 'g')
                                  ->where('g.price >= 50 AND g.price <= 75')
                                  ->orderBy('g.id', 'ASC')
                                  ->getQuery()
                                  ->getResult();
                break;
            
            case ">75" :
                $game   =   $this ->entityManager
                                  ->getRepository(Game::class)
                                  ->createQueryBuilder('Game')
                                  ->select('g')
                                  ->from('Website\Models\Game', 'g')
                                  ->where('g.price >= 75')
                                  ->orderBy('g.id', 'ASC')
                                  ->getQuery()
                                  ->getResult();
                break;
                
            default :
                return NULL;
                break;
        }
        
        return $game;
    }
    
    public function filter($get) {
        $games;
        foreach($get as $key => $option) {
            if($key == "editor") {
                foreach($option as $editor) {
                    var_dump($editor);
                }
            }
            
            else if($key == "developer") {
                foreach($option as $developer) {
                    var_dump($developer);
                }
            }
            
            else if($key == "platform") {
                foreach($option as $platform) {
                    var_dump($platform);
                }
            }
            
            else if($key == "released") {
                foreach($option as $released) {
                    var_dump($released);
                }
            }
            
            else if($key == "price") {
                foreach($option as $price) {
                    var_dump($price);
                }
            }
            
            else {
                echo "yolo";
            }
        }
        
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
}