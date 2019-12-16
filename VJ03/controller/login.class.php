<?php
session_start();
include ("kontroler.class.php");

class Login extends Kontroler {
    public static $korisnik;

    public function __construct () {
        $this->ucitaj("korisnik", "model");
    }

    public function index () {
        if(isset($_POST["korisnickoime"])){
            try {
                $korisnik = new Korisnik($_POST["korisnickoime"], $_POST["lozinka"]);
                self::prijava($korisnik);
                header("Location: index.php?kontroler=profil&metoda=index");
            } catch (Exception $e) {
                $this->ucitaj("static/header", "pogled", array("naslov" => "Prijava na sustav"));
                $this->ucitaj(
                    "login", 
                    "pogled", 
                    array("greska" => $e->getMessage())
                );
                $this->ucitaj("static/footer", "pogled");
            }
        } else {
            $this->ucitaj("static/header", "pogled", array("naslov" => "Prijava na sustav"));
            $this->ucitaj("login", "pogled");
            $this->ucitaj("static/footer", "pogled");
        }
        
    }

    public static function prijava ($korisnik){
        $sql  = "SELECT id FROM korisnik";
        $sql .= " WHERE korisnickoIme='" . $korisnik->getKorisnickoIme() . "'";
        $sql .= " AND lozinka='" . $korisnik->getLozinka() . "'";

        $konekcija = self::$baza->getKonekcija();
        $rezultat = $konekcija->query($sql);

        $korisnik = $rezultat->fetch();
        if ($korisnik){
            $_SESSION["id"] = $korisnik["id"];
            return true;
        } else {
            throw new Exception("Nastala je greška, korisnički podaci su neispravni.");
            return false;
        }
    }

    public static function odjava(){
        unset($_SESSION["id"]);
        session_destroy();
    }

    public static function provjeri_prijavu (){
        include ("model/korisnik.class.php");
        $id = intval($_SESSION['id']);
        $sql = "SELECT * FROM korisnik";
        $sql .= " WHERE id=" . $id;

        $konekcija = self::$baza->getKonekcija();
        $rezultat = $konekcija->query($sql);
        $objekt = $rezultat->fetch();

        if (count($objekt) == 0) {
            throw new Exception("Nastala je pogreška: Korisnik nije prijavljen.");
        } else {
            self::$korisnik = new Korisnik(
                $objekt["korisnickoIme"],
                $objekt["lozinka"],
                $objekt["id"],
                $objekt["ime"],
                $objekt["prezime"],
                $objekt["email"]
            );
        }

    }
}