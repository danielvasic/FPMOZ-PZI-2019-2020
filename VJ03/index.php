<?php
$kontroler = isset($_GET["kontroler"]) ? $_GET["kontroler"] : "login";
$metoda = isset($_GET["metoda"]) ? $_GET["metoda"] : "index";

include ("controller/$kontroler.class.php");
$objekt = new $kontroler();
$objekt->$metoda();