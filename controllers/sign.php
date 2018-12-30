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
        $warning = array();
        
        $template = $this->twig->load('sign.twig');
        echo $template->render(["warning" => $warning]);
    }
    
    public function existPseudo($pseudo) {
        $user   =   $this->entityManager
                         ->getRepository(User::class)
                         ->createQueryBuilder('User')
                         ->select('u')
                         ->from('Website\Models\User', 'u')
                         ->where("u.pseudo LIKE :pseudo")
                         ->setParameter('pseudo', $pseudo)
                         ->getQuery()
                         ->getOneOrNullResult();
                         
        if($user == NULL) {
            return false;
        }
        else {
            return true;
        }
    }
    
    public function existEmail($email) {
        $user   =   $this->entityManager
                         ->getRepository(User::class)
                         ->createQueryBuilder('User')
                         ->select('u')
                         ->from('Website\Models\User', 'u')
                         ->where("u.email LIKE :email")
                         ->setParameter('email', $email)
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
        $users  =   $this->entityManager
                         ->getRepository(User::class)
                         ->createQueryBuilder('User')
                         ->select('u')
                         ->from('Website\Models\User', 'u')
                         ->distinct()
                         ->getQuery()
                         ->getResult();
                         
        foreach($users as $user) {
            if(password_verify($pwd, $user->getPassword())) {
                return true;
            }
        }
        return false;
    }
    
    public function registration($post) {
        $verif_email = '/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
        $verif_pwd = '/^(?=.*\d)(?=.*[A-Z]).{6,}$/';
        $warning = array();
        
        /*verify if the pseudo is already taken or not*/
        if($this->existPseudo($post['pseudo'])) {
            array_push($warning, "Pseudonyme déjà pris");
                
            $template = $this->twig->load('sign.twig');
            echo $template->render(["warning" => $warning]);
        }
        
        else {
            
            /*email verification*/
            if(preg_match($verif_email, $post['email'])) {
            
                /*verify if the email is already taken or not*/
                if($this->existEmail($post['email'])) {
                    array_push($warning, "Adresse mail déjà prise");
                    
                    $template = $this->twig->load('sign.twig');
                    echo $template->render(["warning" => $warning]);
                }
                
                else {
                    
                    /*password verification*/
                    if(preg_match($verif_pwd, $post['pwd'])) {
                        
                        /*verify if the password is already taken or not*/
                        if($this->existPassword($post['pwd'])) {
                            array_push($warning, "Mot de passe déjà pris");
                            
                            $template = $this->twig->load('sign.twig');
                            echo $template->render(["warning" => $warning]);
                        }
                        
                        /*everything is clear*/
                        else {
                            $user = new User;
                            $user->setPseudo($post['pseudo']);
                            $user->setEmail($post['email']);
                            $user->setPassword(password_hash($post['pwd'], PASSWORD_DEFAULT));
                            $this->entityManager->persist($user);
                            $this->entityManager->flush();
                            $_SESSION['id'] = $user->getId();
                            $_SESSION['pseudo'] = $post['pseudo'];
                            header ('location: /home');
                        }
                    }
                } 
            }
        }
    }
}