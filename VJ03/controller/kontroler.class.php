<?php
include ("baza.class.php");
class Kontroler {
    protected static $baza;

    public static function init () {
        Kontroler::$baza = new Baza();
    }

    protected function ucitaj ($naziv, $vrsta = "pogled", $podaci = array()){
        if ($vrsta == "pogled") {
            extract($podaci);
            include("view/$naziv.php");
        } else {
            include("model/$naziv.class.php");
        }

    }
}
Kontroler::init();