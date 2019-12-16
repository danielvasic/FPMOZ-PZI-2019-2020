<?php
session_start();
include ("kontroler.class.php");

class Registracija extends Kontroler {

    public function __construct(){
        $this->ucitaj("korisnik", "model");
    }

    public function index (){
        if (isset($_POST["korisnickoime"])){
            try{
                $korisnik = new Korisnik(
                    $_POST["korisnickoime"],
                    $_POST["lozinka"], 0,
                    $_POST["ime"],
                    $_POST["prezime"],
                    $_POST["email"]
                );
                Model::spasi($korisnik);

                header("Location: index.php");
            } catch(Exception $ex) {
                $this->ucitaj("static/header", "pogled", array("naslov" => "Registrirajte se na sustav"));
                $this->ucitaj("registracija", "pogled", array("greska" => $ex->getMessage()));
                $this->ucitaj("static/footer", "pogled");
            }
        } else {
            $this->ucitaj("static/header", "pogled", array("naslov" => "Registrirajte se na sustav"));
            $this->ucitaj("registracija", "pogled");
            $this->ucitaj("static/footer", "pogled");
        }
    }
}