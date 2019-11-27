<?php

class Korisnik {
    private $id;
    private $korisnickoime;
    private $lozinka;
    private $ime;
    private $prezime;
    private $email;

    public function __construct ($korisnickoime, $lozinka){
        $this->korisnickoime = $korisnickoime;
        $this->lozinka = md5($lozinka);
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function getKorisnickoIme(){
        return $this->korisnickoime;
    }

    public function getLozinka(){
        return $this->lozinka;
    }
}