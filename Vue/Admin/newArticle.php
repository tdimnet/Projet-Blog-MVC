<?php

include_once 'Vue\Templates\header.php';
?>

<h2>This is where I write all my articles</h2>

<form class="" method="post">
  <input type="text" name="titre" placeholder="Episode title">
  <br>
  <textarea name="episode" rows="8" cols="80" placeholder="Episode text"></textarea>
  <br>
  <button type="submit" name="button">
    Send your episode
  </button>
</form>

<?php
include_once 'Vue\Templates\footer.php';
?>
