<?php

$template = $twig->load('cart.twig');

$game = [
            "cover"     => "sm",
            "descr"     => "Spider-Man",
            "name"      => "Marvel's Spider-Man",
            "editor"    => "Sony",
            "developer" => "Insomniac Games",
            "platform"  => "PlayStation 4",
            "rdate"     => "07/09/18",
            "price"     => "54€99"
        ];
        
echo $template->render  ([
                            "game" => $game
                        ]);