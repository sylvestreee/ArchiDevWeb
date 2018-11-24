<?php

$template = $twig->load('catalogue.twig');

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
                    "price"     => "52€99"
                ]
            ];

echo $template->render  ([
                            "editors"       => $editors, 
                            "developers"    => $developers,
                            "platforms"     => $platforms,
                            "games"         => $games
                        ]);
