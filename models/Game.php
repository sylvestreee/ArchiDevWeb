<?php

/**
 * @Entity @Table(name="games")
 **/

class Game {
    /** @Id @Column(type="integer") @GeneratedValue **/ 
    private $id;
    
    /**
     * Bidirectional - Many games have Many genres (INVERSE SIDE)
     *
     * @ManyToMany(targetEntity="Genre", mappedBy="games")
     */
    private $gameGenres;
    
    /**
     * Bidirectional - Many games are purchased by Many users (INVERSE SIDE)
     *
     * @ManyToMany(targetEntity="User", mappedBy="purchases")
     */
    private $gamePurchased;
    
    /** @Column(type="string") **/
    private $title;
    
    /** @Column(type="string") **/
    private $editor;
    
    /** @Column(type="string") **/
    private $developer;
    
    /** @Column(type="string") **/
    private $platform;
    
    /** @Column(type="string") **/
    private $catchphrase;
    
    /** @Column(type="text") **/
    private $synopsis;
    
    /** @Column(type="string") **/
    private $illustration;
    
    /** @Column(type="date") **/
    private $released;
    
    /** @Column(type="integer") **/
    private $rating;
    
    /** @Column(type="float") **/
    private $price;
    
    public function getId() {
        return $this->id;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getEditor() {
        return $this->editor;
    }
    
    public function getDeveloper() {
        return $this->developer;
    }
    
    public function getPlatform() {
        return $this->platform;
    }
    
    public function getCatchphrase() {
        return $this->catchphrase;
    }
    
    public function getSynopsis() {
        return $this->synopsis;
    }
    
    public function getIllustration() {
        return $this->illustration;
    }
    
    public function getReleased() {
        return $this->released;
    }
    
    public function getRating() {
        return $this->rating;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function setEditor($editor) {
        $this->editor = $editor;
    }
    
    public function setDeveloper($developer) {
        $this->developer = $developer;
    }
    
    public function setPlatform($platform) {
        $this->platform = $platform;
    }
    
    public function setCatchphrase($catchphrase) {
        $this->catchphrase = $catchphrase;
    }
    
    public function setSynopsis($synopsis) {
        $this->synopsis = $synopsis;
    }
    
    public function setIllustration($illustration) {
        $this->illustration = $illustration;
    }
    
    public function setReleased($released) {
        $this->released = $released;
    }
    
    public function setRating($rating) {
        $this->rating = $rating;
    }
    
    public function setPrice($price) {
        $this->price = $price;
    }
}