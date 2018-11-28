<?php

namespace Website\Models;

/**
 * @Entity @Table(name="Purchases")
 **/

class Purchases {
    /** @Id @ManyToOne(targetEntity="Game") */
    private $game;
    
    /** @Id @ManyToOne(targetEntity="User") */
    private $user;
    
    /** @Column(type="date") **/
    private $purchased;
    
    /**
     * constructor
     */
    public function __construct() { }
    
    /**
     * getters
     */
    public function getGame() { return $this->game; }
    public function getUser() { return $this->user; }
    public function getPurchased() { return $this->purchased; }
}