<?php

$template = $twig->load('user.twig');

$user = [
            "civility"  => "Sir",
            "fname"     => "Martin",
            "name"      => "Heitz",
            "pseudo"    => "sylvestreee",
            "birthday"  => "01/01/1997",
            "email"     => "martin.heitz@etu.unistra.fr"
        ];

echo $template->render  ([
                            "user" => $user
                        ]);