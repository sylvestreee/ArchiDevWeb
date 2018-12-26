<?php

namespace Website\Models;

/**
 * @Entity @Table(name="Purchases")
 **/

class Purchases {
    /** @Id @Column(type="integer") @GeneratedValue **/ 
    private $id;
    
    /**
     * @ManyToOne(targetEntity="Game", inversedBy="purchased")
     * @JoinColumn(name="game_id", referencedColumnName="id", nullable=false)
     */
    private $game;
    
    /** 
     * @ManyToOne(targetEntity="User", inversedBy="purchases") 
     * @JoinColumn(name="user_id", referencedColumnName="id", nullable=false) 
     */
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