<?php

/**
 * @Entity @Table(name="carts")
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
    
    /** @Column(type="integer") **/
    private $quantity;
    
    public function getId() {
        return $this->id;
    }
    
    public function getGame() {
        return $this->game;
    }
    
    public function getUser() {
        return $this->user;
    }
    
    public function getQuantity() {
        return $this->quantity;
    }
    
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}