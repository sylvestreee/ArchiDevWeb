<?php

namespace Website\Models;

/**
 * @Entity @Table(name="Game")
 **/

class Game {
    /** @Id @Column(type="integer") @GeneratedValue **/ 
    private $id;

    /** @Column(type="string", unique=true) **/
    private $title;
    
    /** @Column(type="string") **/
    private $editor;
    
    /** @Column(type="string") **/
    private $developer;
    
    /** @Column(type="string") **/
    private $platform;
    
    /** @Column(type="string", unique=true) **/
    private $catchphrase;
    
    /** @Column(type="string", unique=true) **/
    private $synopsis;
    
    /** @Column(type="string", unique=true) **/
    private $illustration;
    
    /** @Column(type="date") **/
    private $released;
    
    /** @Column(type="integer") **/
    private $rating;
    
    /** @Column(type="float") **/
    private $price;
    
    /**
     * Bidirectional - Many games have Many genres (OWNING SIDE)
     *
     * @ManyToMany(targetEntity="Genre", inversedBy="games")
     * @JoinTable(name="Game_Genre")
     */
    private $genres;
    
    /**
     * Bidirectional - Many games are purchased by Many users (INVERSE SIDE)
     *
     * @ManyToMany(targetEntity="User", mappedBy="purchases")
     */
    private $purchased;
    
    /**
     * constructor
     */
    public function __construct() { 
        $this->genres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->purchased = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * getters
     */
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getEditor() { return $this->editor; } 
    public function getDeveloper() { return $this->developer; }
    public function getPlatform() { return $this->platform; }
    public function getCatchphrase() { return $this->catchphrase; }
    public function getSynopsis() { return $this->synopsis; }
    public function getIllustration() { return $this->illustration; }
    public function getReleased() { return $this->released; }
    public function getRating() { return $this->rating; }
    public function getPrice() { return $this->price; }
    public function getGenres() { return $this->genres; }
    
    /**
     * setters
     */
    public function setPrice($price) { $this->price = $price; }
}