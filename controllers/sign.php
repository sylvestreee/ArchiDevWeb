<?php

namespace Website\Controllers;

global $twig;
global $entityManager;

class Sign {
    private $twig;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    
    public function index() {
        $template = $this->twig->load('sign.twig');
        echo $template->render();
    }
    
    public function connexion($post) {
        $_SESSION['login'] = $post['email'];
        $_SESSION['pseudo'] = "sylvestreee";
        $template = $this->twig->load('account.twig');
        echo $template->render();
    }
}