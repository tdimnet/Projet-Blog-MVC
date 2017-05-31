<?php

include_once 'Vue\Templates\header.php';
?>

<h2>Here is the list of all your articles: you can either modify it or publish it.</h2>

<?php
foreach ($articles as $article) { ?>
  <hr>
  <h4>Article name: <?php echo $article['titre']; ?></h4>
  <ul>
    <li>
      <a href="#">Modify the article</a>
    </li>
    <li>
      Article status: waiting / published
    </li>
  </ul>

<?php
}
?>

<?php
include_once 'Vue\Templates\footer.php';
?>
