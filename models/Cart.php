<?php

namespace Website\Models;

/**
 * @Entity @Table(name="Cart")
 **/

class Cart {
    /** @Id @Column(type="integer") @GeneratedValue **/ 
    private $id;
    
    /**
     * @ManyToOne(targetEntity="Game")
     * @JoinColumn(nullable=false)
     */
    private $game;
    
    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(nullable=false)
     */
    private $user;
    
    /**
     * constructor
     */
    public function __construct() { }
    
    /**
     * getters
     */
    public function getGame() { return $this->game; }
    public function getUser() { return $this->user; }
    
    /**
     * setters
     */
    public function setGame($game) { $this->game = $game; }
    public function setUser($user) { $this->user = $user; }
}