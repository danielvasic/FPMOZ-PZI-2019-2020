<?php
class Baza {
    private $host;
    private $korisnik;
    private $lozinka;
    private $shema;

    private $konekcija;

    public function __construct (){
        $this->konekcija = new PDO(
            "mysql:host=$this->host;dbname=$this->shema", 
            $this->korisnik, 
            $this->lozinka
        );
        $this->konekcija->setAttribute(
            PDO::ATTR_ERRMODE, 
            PDO::ERRMODE_EXCEPTION
        );
    }

    public function getKonekcija(){
        return $this->konekcija;
    }
}