<?php

namespace Website\Models;

/**
 * @Entity @Table(name="Genre")
 **/

class Genre {
    /** @Id @Column(type="integer") @GeneratedValue **/ 
    private $id;
    
    /** @Column(type="string", unique=true) **/
    private $name;
    
    /**
     * Bidirectional - Many genres are for many games (INVERSE SIDE)
     *
     * @ManyToMany(targetEntity="Game", mappedBy="genres")
     */
     private $games;

    /**
     * constructor
     */
    public function __construct() { }
    
    /**
     * getters
     */
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    
    /**
     * setters
     */
    public function setGames($games) { $this->games = $games; }
}