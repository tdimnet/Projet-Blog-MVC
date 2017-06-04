<?php

include_once 'Vue\Templates\header.php';
?>

<h2>This is the view where you can modify your articles</h2>
<form class="" method="post">
  <input type="text" name="titre" placeholder="Episode title" value="<?php echo $article['titre']; ?>">
  <br>
  <textarea name="episode" rows="8" cols="80" placeholder="Episode text"><?php echo $article['episode']; ?></textarea>
  <br>
  status
  <select name="status">
    <option value="0">Not Publish</option>
    <option value="1">Publish</option>
  </select>
  <br>
  <button type="submit" name="button">
    Send your episode
  </button>
</form>

<?php
include_once 'Vue\Templates\footer.php';
?>
