<?php

/**
 * @Entity @Table(name="genres")
 **/

class Genre {
    /** @Id @Column(type="integer") @GeneratedValue **/ 
    private $id;
    
    /**
     * Bidirectional - Many genres have Many games (OWNING SIDE)
     *
     * @ManyToMany(targetEntity="Game", inversedBy="gameGenres")
     * @JoinTable(name="genres_games")
     */
    private $games;
    
    /** @Column(type="string") **/
    private $name;
    
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
}