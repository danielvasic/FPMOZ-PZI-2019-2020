<?php
session_start();
include ("baza.class.php");


class Login {
    private static $baza;

    public static function prijava ($korisnik){
        self::$baza = new Baza();
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
        if (!self::$baza) self::$baza = new Baza();
    }
}