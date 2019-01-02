<?php

namespace Website\Controllers;
use Website\Models\User as User;

global $twig;
global $entityManager;

class Account {
    private $twig;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    
    /*gets the informations of the connected user*/
    public function getUser() {
        $id = $_SESSION['id'];
        $user   =   $this->entityManager
                         ->getRepository(User::class)
                         ->createQueryBuilder('User')
                         ->select('u')
                         ->from('Website\Models\User', 'u')
                         ->where("u.id = $id")
                         ->getQuery()
                         ->getOneOrNullResult();
                         
        return $user;
    }
    
    public function index() {
        $warning = array();
        $user = $this->getUser();
    
        $template = $this->twig->load('account.twig');
        echo $template->render(["user" => $user, "warning" => $warning]);
    }
    
    /*searches if a pseudo already exists in the database*/
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
    
    /*searches if an email already exists in the database*/
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
    
    /*searches if a password already exists in the database*/
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
    
    /*update informations function*/
    public function update($post) {
        $verif_email = '/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
        $verif_pwd = '/^(?=.*\d)(?=.*[A-Z]).{6,}$/';        
        $verif_name = '/^[a-zA-Z -]*[^0-9]$/';
        
        $warning = array();
        $user = $this->getUser();
        
        foreach($post as $key => $field) {
            if(strlen($field) > 0) {
                switch($key) {
                    
                    /*civility update*/
                    case "civility" :
                        $user->setCivility($field);
                        break;
                        
                    /*pseudo update*/
                    case "pseudo" :
                        
                        /*verify if the pseudo is already taken or not*/
                        if($this->existPseudo($field)) {
                            array_push($warning, "Pseudonyme déjà pris");
                
                            $template = $this->twig->load('account.twig');
                            echo $template->render(["user" => $user, "warning" => $warning]);
                        } 
                        else {
                            $user->setPseudo($field);
                            $_SESSION['pseudo'] = $user->getPseudo();
                        }
                        break;
                        
                    /*name update*/
                    case "name" :
                        
                        /*name verification*/
                        if(preg_match($verif_name, $field)) {
                            $user->setName($field);
                        }
                        break;
                        
                    /*first name update*/    
                    case "fname" :
                        
                        /*name verification*/
                        if(preg_match($verif_name, $field)) {
                            $user->setFname($field);
                        }
                        break;
                        
                    /*birthday date update*/
                    case "birthday" :
                        $date = date('Y-m-d', strtotime(str_replace('/', '-', $field)));
                        $user->setBirthday(new \DateTime($date));
                        break;
                        
                    /*email update*/
                    case "email" :
                        
                        /*email verification*/
                        if(preg_match($verif_email, $field)) {
                            
                            /*verify if the email is already taken or not*/
                            if($this->existEmail($field)) {
                                array_push($warning, "Adresse mail déjà prise");
                
                                $template = $this->twig->load('account.twig');
                                echo $template->render(["user" => $user, "warning" => $warning]);
                            }
                            
                            else {
                                $user->setEmail($field);
                            }
                        }
                        break;
                        
                    /*password update*/
                    case "pwd" :
                        
                        /*password verification*/
                        if(preg_match($verif_pwd, $field)) {
                            
                            /*verify if the password is already taken or not*/
                            if($this->existPassword($field)) {
                                array_push($warning, "Mot de passe déjà pris");
                
                                $template = $this->twig->load('account.twig');
                                echo $template->render(["user" => $user, "warning" => $warning]);
                            }
                            else {
                                $user->setPassword(password_hash($field, PASSWORD_DEFAULT));
                            }
                        }
                        break;
                        
                    default :
                        break;
                }
            }
        }
        $this->entityManager->merge($user);
        $this->entityManager->flush();
        header ('location: /account');
    }
}