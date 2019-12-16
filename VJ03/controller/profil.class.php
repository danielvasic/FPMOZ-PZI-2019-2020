<?php
include ("login.class.php");

class Profil extends Kontroler {
    public function __construct () {
        Login::provjeri_prijavu();
    }

    public function index () {
        $this->ucitaj("static/header", "pogled", array("naslov" => "Dobrodošli"));
        $this->ucitaj("profil", "pogled", array("korisnik" => Login::$korisnik));
        $this->ucitaj("static/footer", "pogled");
    }

    public function odjava(){
        Login::odjava();
        header("Location: index.php");
    }
}