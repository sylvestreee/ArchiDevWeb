<?php

$template = $twig->load('game.twig');

$game = [
            "cover"     => "sm",
            "descr"     => "Spider-Man",
            "name"      => "Marvel's Spider-Man",
            "editor"    => "Sony",
            "developer" => "Insomniac Games",
            "platform"  => "PlayStation 4",
            "rdate"     => "07/09/18",
            "synopsis"  => "New-York a besoin de son plus grand héros : Spider-Man !
				            Alors qu'une menace sans précédent s'apprête à frapper sa ville, tiraillé entre sa vie personnelle
				            et son devoir de super-héros, l'homme-araigné va devoir devenir plus fort, sous peine d'en
				            payer les terribles conséquences...",
            "price"     => "54€99",
            "trailer"   => "sm"
        ];

echo $template->render  ([
                            "game" => $game
                        ]);