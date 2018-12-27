<?php

namespace Website\Controllers;
use Website\Models\User as User;

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
    
    public function existEmail($email) {
        $user   =   $this->entityManager
                         ->getRepository(User::class)
                         ->createQueryBuilder('User')
                         ->select('u.email')
                         ->from('Website\Models\User', 'u')
                         ->where("u.email = $email")
                         ->getQuery()
                         ->getOneOrNullResult();
                         
        if($user == NULL) {
            return false;
        }
        else {
            return true;
        }
    }
    
    public function existPassword($pwd) {
        $password = password_hash($pwd);
        $user   =   $this->entityManager
                         ->getRepository(User::class)
                         ->createQueryBuilder('User')
                         ->select('u.password')
                         ->from('Website\Models\User', 'u')
                         ->where("u.password = $password")
                         ->getQuery()
                         ->getOneOrNullResult();
                         
        if($user == NULL) {
            return false;
        }
        else {
            return true;
        }
    }
    
    public function connection($post) {
        $verif_email = '/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
        $verif_pwd = '/^(?=.*\d)(?=.*[A-Z]).{6,}$/';
        
        //email verification
        if(preg_match($verif_email, $post['email'])) {
            $is     =   $this->entityManager
                        ->getRepository(Genre::class)
                        ->createQueryBuilder('Genre')
                        ->select('g.name')
                        ->from('Website\Models\Genre', 'g')
                        ->orderBy('g.name', 'ASC')
                        ->distinct()
                        ->getQuery()
                        ->getResult();
        }
        else {
            $_SESSION['pseudo'] = "non";
        }
        $_SESSION['login'] = $post['email'];
        header ('location: /home');
    }
    
    //mettre dans log
    public function disconnection() {
        session_destroy();
        header ('location: /home');
    }
}