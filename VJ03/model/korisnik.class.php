<?php

class Korisnik extends Model {
    protected $id;
    protected $korisnickoime;
    protected $lozinka;
    protected $ime;
    protected $prezime;
    protected $email;

    public function __construct ($korisnickoime="", $lozinka="", $id=0, $ime="", $prezime="", $email=""){
        $this->id = $id;
        $this->korisnickoime = $korisnickoime;
        $this->lozinka = md5($lozinka);
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->email = $email;

    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setKorisnickoIme($korisnickoime){
        $this->korisnickoime = $korisnickoime;
    }

    public function getKorisnickoIme(){
        return $this->korisnickoime;
    }

    public function setLozinka($lozinka){
        $this->lozinka = md5($lozinka);
    }

    public function getLozinka(){
        return $this->lozinka;
    }

    public function setIme($ime){
        $this->ime = $ime;
    }

    public function getIme(){
        return $this->ime;
    }

    public function setPrezime($prezime){
        $this->prezime = $prezime;
    }

    public function getPrezime(){
        return $this->prezime;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }
}