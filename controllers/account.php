<?php

$template = $twig->load('account.twig');

$user = [
            "civility"  => "M",
            "pseudo"    => "sylvestreee",
            "name"      => "Heitz",
            "fname"     => "Martin",
            "birthday"  => "01/01/1997",
            "email"     => "martin.heitz@etu.unistra.fr"
        ];

echo $template->render  ([
                            "user" => $user
                        ]);