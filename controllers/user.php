<?php

namespace Website\Controllers;
use Website\Models\User as UserModel;

global $twig;
global $entityManager;

class User {
    private $twig;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    
    public function index() {
        $id = $_SESSION['id'];
        $user   =   $this->entityManager
                         ->getRepository(UserModel::class)
                         ->createQueryBuilder('User')
                         ->select('u')
                         ->from('Website\Models\User', 'u')
                         ->where("u.id = $id")
                         ->getQuery()
                         ->getOneOrNullResult();
        
        $template = $this->twig->load('user.twig');
        echo $template->render(["user" => $user]);
    }
}