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
    
    public function index() {
        $id = $_SESSION['id'];
        $user   =   $this->entityManager
                         ->getRepository(User::class)
                         ->createQueryBuilder('User')
                         ->select('u')
                         ->from('Website\Models\User', 'u')
                         ->where("u.id = $id")
                         ->getQuery()
                         ->getOneOrNullResult();
        
        $template = $this->twig->load('account.twig');
        echo $template->render(["user" => $user]);
    }
    
    public function update($post) {
        $verif_email = '/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
        $verif_pwd = '/^(?=.*\d)(?=.*[A-Z]).{6,}$/';
        $verif_date = '/^((((0[1-9]|[12][0-9]|3[01])[- /.](0[13578]|1[02]))|((0[1-9]|[12][0-9]|30)[- /.](0[469]|11))|((0[1-9]|[12][0-8])[- /.](02)))[- /.]\d{4})|((0[1-9]|[12][0-9])[- /.](02)[- /.](([0-9]{2}(04|08|[2468][048]|[13579][26])|2000)))$/';
        $verif_name = '/^[a-zA-Z -]*[^0-9]$/';
        
        $id = $_SESSION['id'];
        $user   =   $this->entityManager
                         ->getRepository(User::class)
                         ->createQueryBuilder('User')
                         ->select('u')
                         ->from('Website\Models\User', 'u')
                         ->where("u.id = $id")
                         ->getQuery()
                         ->getOneOrNullResult();
        
        foreach($post as $key => $field) {
            if(strlen($field) > 0) {
                switch($key) {
                    case "civility" :
                        $user->setCivility($field);
                        break;
                        
                    case "pseudo" :
                        $user->setPseudo($field);
                        $_SESSION['pseudo'] = $user->getPseudo();
                        break;
                        
                    case "name" :
                        if(preg_match($verif_name, $field)) {
                            $user->setName($field);
                        }
                        break;
                        
                    case "fname" :
                        if(preg_match($verif_name, $field)) {
                            $user->setFname($field);
                        }
                        break;
                        
                    case "birthday" :
                        $date = date('Y-m-d', strtotime(str_replace('/', '-', $field)));
                        $user->setBirthday(new \DateTime($date));
                        break;
                        
                    case "email" :
                        if(preg_match($verif_email, $field)) {
                            $user->setEmail($field);
                        }
                        break;
                        
                    case "pwd" :
                        if(preg_match($verif_pwd, $field)) {
                            $user->setPassword(password_hash($field, PASSWORD_DEFAULT));
                        }
                        break;
                        
                    default :
                        break;
                }
            }
        }
        
        var_dump($user->getBirthday());
        
        $this->entityManager->merge($user);
        $this->entityManager->flush();
        header ('location: /account');
    }
}