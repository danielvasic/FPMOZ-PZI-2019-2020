<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo ($korisnik->getIme() . " " . $korisnik->getPrezime()); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?kontroler=profil&metoda=odjava">Odjavite se</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col">
      <table class="table">
        <tr>
          <td>Id</td>
          <td><?php echo ($korisnik->getId()) ?></td>
        </tr>

        <tr>
          <td>Ime</td>
          <td><?php echo ($korisnik->getIme()) ?></td>
        </tr>

        <tr>
          <td>Prezime</td>
          <td><?php echo ($korisnik->getPrezime()) ?></td>
        </tr>

        <tr>
          <td>Email</td>
          <td><?php echo ($korisnik->getEmail()) ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>