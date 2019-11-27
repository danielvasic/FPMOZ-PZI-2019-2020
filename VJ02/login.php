<?php
include ("konekcija.php");
$uspjeh = false;
if (isset($_POST["korisnickoIme"])) {
    $korisnickoIme = $_POST["korisnickoIme"];
    $lozinka = $_POST["lozinka"];

    $sql = "INSERT INTO login VALUES(null, '$korisnickoIme', '$lozinka')";
    $uspjeh = $konekcija->query($sql);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Prijava na sustav</title>
    </head>
    <body>
        <?php
        if($uspjeh) print("Uspjesno ste registrirani");
        ?>
        <form action="" method="POST">
            <label>Korisničko ime:</label>
            <input type="text" name="korisnickoIme" placeholder="Unesite korisničko ime"/>
            <label>Lozinka:</label>
            <input type="password" name="lozinka" placeholder="Unesite lozinku" />
            <input type="submit" value="Registriraj se" />
        </form>
    </body>
</html>