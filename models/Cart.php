<?php

namespace Website\Models;

/**
 * @Entity @Table(name="Cart")
 **/

class Cart {
    /** @Id @ManyToOne(targetEntity="Game") */
    private $game;
    
    /** @Id @ManyToOne(targetEntity="User") */
    private $user;
    
    /** @Column(type="integer") **/
    private $quantity;
    
    /**
     * constructor
     */
    public function __construct() { }
    
    /**
     * getters
     */
    public function getGame() { return $this->game; }
    public function getUser() { return $this->user; }
    public function getQuantity() {return $this->quantity; }
    
    /**
     * setter
     */
    public function setQuantity($quantity) { $this->quantity = $quantity; }
}