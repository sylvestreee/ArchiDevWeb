<?php

namespace Website\Controllers;

global $twig;
global $entityManager;

class Log {
    private $twig;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    
    public function index() {
        $template = $this->twig->load('log.twig');
        echo $template->render();
    }
    
    public function disconnection() {
        session_destroy();
        header ('location: /home');
    }
}