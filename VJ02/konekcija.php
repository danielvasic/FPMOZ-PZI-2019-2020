<?php

$korisnik = "root";
$lozinka = "";
$host = "localhost";
try{
    $konekcija = new PDO("mysql:host=$host;dbname=pzi", $korisnik, $lozinka);
    $konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e){
    $konekcija = NULL;
    print ("Nastala je pogreška: ".$e->getMessage());
}

?>