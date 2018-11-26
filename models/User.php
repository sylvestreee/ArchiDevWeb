<?php

/**
 * @Entity @Table(name="users")
 **/

class User {
    /** @Id @Column(type="integer") @GeneratedValue **/ 
    private $id;
    
    /**
     * Bidirectional - Many users have Many games purchased (OWNING SIDE)
     *
     * @ManyToMany(targetEntity="Game", inversedBy="gamePurchased")
     * @JoinTable(name="purchases")
     */
     private $purchases;
    
    /** @Column(type="string") **/
    private $civility;
    
    /** @Column(type="string") **/
    private $pseudo;
    
    /** @Column(type="string") **/
    private $name;
    
    /** @Column(type="string") **/
    private $fname;
    
    /** @Column(type="date") **/
    private $birthday;
    
    /** @Column(type="string") **/
    private $email;
    
    /** @Column(type="string") **/
    private $password;
    
    public function getId() {
        return $this->id;
    }
    
    public function getCivility() {
        return $this->civility;
    }
    
    public function getPseudo() {
        return $this->pseudo;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getFname() {
        return $this->fname;
    }
    
    public function getBirthday() {
        return $this->birthday;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setCivility($civility) {
        $this->civility = $civility;
    }
    
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function setFname($fname) {
        $this->fname = $fname;
    }
    
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
}