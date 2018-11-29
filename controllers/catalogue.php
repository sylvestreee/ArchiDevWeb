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
}
/*
$editors =  [
                [
                    "name" => "Sony"
                ],
                [
                    "name" => "Square Enix"
                ],
                [
                    "name" => "Konami"
                ]
            ];
            
$developers =   [
                    [
                        "name" => "Insomniac Games"
                    ],
                    [
                        "name" => "Eidos Montréal"
                    ],
                    [
                        "name" => "Konami"
                    ],
                    [
                        "name" => "Square Enix"
                    ]
                ];
                
$platforms =    [
                    [
                        "name" => "PlayStation 4"
                    ],
                    [
                        "name" => "Xbox One"
                    ],
                    [
                        "name" => "Nintendo Switch"
                    ],
                    [
                        "name" => "PC"
                    ]
                ];

$games =    [
                [
                    "cover"     => "sm",
                    "descr"     => "Spider-Man",
                    "name"      => "Marvel's Spider-Man",
                    "editor"    => "Sony",
                    "developer" => "Insomniac Games",
                    "platform"  => "PlayStation 4",
                    "rdate"     => "07/09/18",
                    "rating"    => "5",
                    "price"     => "54€99"
                ],
                [
                    "cover"     => "tr",
                    "descr"     => "Tomb-Raider",
                    "name"      => "Shadow of the Tomb Raider",
                    "editor"    => "Square Enix",
                    "developer" => "Eidos Montréal",
                    "platform"  => "PlayStation 4",
                    "rdate"     => "14/09/18",
                    "rating"    => "4",
                    "price"     => "56€99"
                ],
                [
                    "cover"     => "pes",
                    "descr"     => "Pro-Evolution-Soccer",
                    "name"      => "Pro Evolution Soccer 2019",
                    "editor"    => "Konami",
                    "developer" => "Konami",
                    "platform"  => "PlayStation 4",
                    "rdate"     => "30/08/18",
                    "rating"    => "3",
                    "price"     => "49€99"
                ],
                [
                    "cover"     => "dq",
                    "descr"     => "Dragon-Quest",
                    "name"      => "Dragon Quest XI : Les Combattants de la destinée",
                    "editor"    => "Square Enix",
                    "developer" => "Square Enix",
                    "platform"  => "PlayStation 4",
                    "rdate"     => "04/09/18",
                    "rating"    => "4",
                    "price"     => "52€99"
                ]
            ];

echo $template->render  ([
                            "editors"       => $editors, 
                            "developers"    => $developers,
                            "platforms"     => $platforms,
                            "games"         => $games
                        ]);
*/