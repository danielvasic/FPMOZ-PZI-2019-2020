<?php
include ("model/korisnik.class.php");
include ("controller/login.class.php");

$korisnik = new Korisnik("daniel", "123456");
Login::prijava($korisnik);
