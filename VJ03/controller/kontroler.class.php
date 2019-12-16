<?php
include ("baza.class.php");
include ("model/model.class.php");
class Kontroler {
    protected static $baza;

    public static function init () {
        Kontroler::$baza = new Baza();
        Model::init(Kontroler::$baza);
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