<?php
include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';
?>

<div class="container">
  <h2>Veuillez vous identifier</h2>
  <hr>
  <form class="" action="?Controller=Admin" method="post">
    <div class="form-group">
      <label for="identifier">Identifiant</label>
      <input id="identifier" class="form-control" type="text" placeholder="Votre identifiant">
    </div>
    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input id="password" class="form-control" type="password" placeholder="Votre mot de passe">
    </div>
    <button type="submit" class="btn btn-default" name="button">S'identifier</button>
  </form>
</div>

<?php
include_once 'Vue/Templates/footer.php';
?>
