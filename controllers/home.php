<?php

$template = $twig->load('home.twig');

$news = [
            [
                "wallpaper" => "sm",
                "descr"     => "Spider-Man",
                "name"      => "Marvel's Spider-Man",
                "catch"     => "Incarne l'homme-araignée et protège New-York des vilains qui l'a menace !"
            ],
            [
                "wallpaper" => "tr",
                "descr"     => "Tomb-Raider",
                "name"      => "Shadow of the Tomb Raider",
                "catch"     => "Lara doit empêcher l'apocalypse de s'abattre sur Terre et devenir Tomb Raider !"
            ],
            [
                "wallpaper" => "pes",
                "descr"     => "Pro-Evolution-Soccer",
                "name"      => "Pro Evolution Soccer 2019",
                "catch"     => "La référence du ballon rond vidéoludique est de retour pour une nouvelle édition !"
            ]
        ];
        
$bestsellers =  [
                    [
                        "cover"     => "sm",
                        "descr"     => "Spider-Man",
                        "name"      => "Marvel's Spider-Man",
                        "editor"    => "Sony",
                        "developer" => "Insomniac Games",
                        "price"     => "54€99"
                    ],
                    [
                        "cover"     => "tr",
                        "descr"     => "Tomb-Raider",
                        "name"      => "Shadow of the Tomb Raider",
                        "editor"    => "Square Enix",
                        "developer" => "Eidos Montréal",
                        "price"     => "56€99"
                    ],
                    [
                        "cover"     => "pes",
                        "descr"     => "Pro-Evolution-Soccer",
                        "name"      => "Pro Evolution Soccer 2019",
                        "editor"    => "Konami",
                        "developer" => "Konami",
                        "price"     => "49€99"
                    ]
                ];
        
$suggestion =   [
                    "cover"     => "dq",
                    "descr"     => "Dragon-Quest",
                    "name"      => "Dragon Quest XI : Les Combattants de la destinée",
                    "editor"    => "Square Enix",
                    "developer" => "Square Enix",
                    "price"     => "52€99"
                ];
    
echo $template->render  ([
                            "news" => $news, 
                            "bestsellers" => $bestsellers,
                            "suggestion" => $suggestion
                        ]);

