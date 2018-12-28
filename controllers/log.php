<?php

namespace Website\Controllers;
use Website\Models\User as User;

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
        $warning = array();
        
        $template = $this->twig->load('log.twig');
        echo $template->render(["warning" => $warning]);
    }
    
    public function connection($post) {
        $verif_email = '/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
        $warning = array();
        
        $users  =   $this->entityManager
                         ->getRepository(User::class)
                         ->createQueryBuilder('User')
                         ->select('u')
                         ->from('Website\Models\User', 'u')
                         ->distinct()
                         ->getQuery()
                         ->getResult();
                         
        if(preg_match($verif_email, $post['email'])) {
            foreach($users as $user) {
                if(($user->getEmail() == $post['email']) && password_verify($post['pwd'], $user->getPassword())) {
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['pseudo'] = $user->getPseudo();
                    header ('location: /home');
                }
            }
            array_push($warning, "Adresse mail / mot de passe incorrect(e)");
            
            $template = $this->twig->load('log.twig');
            echo $template->render(["warning" => $warning]);
        }
    }
    
    public function disconnection() {
        session_destroy();
        header ('location: /home');
    }
}