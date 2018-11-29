<?php

namespace Website\Models;

/**
 * @Entity @Table(name="User")
 **/

class User {
    /** @Id @Column(type="integer") @GeneratedValue **/ 
    private $id;
    
    /** @Column(type="string", nullable=true) **/
    private $civility;
    
    /** @Column(type="string", unique=true, nullable=true) **/
    private $pseudo;
    
    /** @Column(type="string", nullable=true) **/
    private $name;
    
    /** @Column(type="string", nullable=true) **/
    private $fname;
    
    /** @Column(type="date", nullable=true) **/
    private $birthday;
    
    /** @Column(type="string", unique=true) **/
    private $email;
    
    /** @Column(type="string", unique=true) **/
    private $password;
    
    /** @OneToMany(targetEntity="Cart", mappedBy="user") */
    private $reserved;
    
    /**
     * Bidirectional - Many users have Many games purchased (OWNING SIDE)
     *
     * @ManyToMany(targetEntity="Game", inversedBy="purchased")
     * @JoinTable(name="Purchases")
     */
     private $purchases;
    
    /**
     * constructor
     */
    public function __construct() { 
        $this->purchases = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * getters
     */
    public function getId() { return $this->id; }
    public function getCivility() { return $this->civility; }
    public function getPseudo() { return $this->pseudo; }
    public function getName() { return $this->name; }
    public function getFname() { return $this->fname; }
    public function getBirthday() { return $this->birthday; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password;}
    public function getReserved() { return $this->reserved; }
    public function getPurchases() { return $this->purchases; }
    
    /**
     * setters
     */
    public function setCivility($civility) { $this->civility = $civility; }
    public function setPseudo($pseudo) { $this->pseudo = $pseudo; }
    public function setName($name) { $this->name = $name; }
    public function setFname($fname) { $this->fname = $fname; }
    public function setBirthday($birthday) { $this->birthday = $birthday; }
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = $password; }
    public function setReserved($reserved) { $this->reserved = $reserved; }
    public function setPurchases($purchases) { $this->purchases = $purchases; }
}