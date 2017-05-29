<?php

include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';
?>

<h1>Hello from the admin panel</h1>

<h2>What do you want to do?</h2>
<ul>
  <li>
    <a href="?Controller=Admin&&Vue=newArticle">Write a new article</a>
  </li>
  <li>
    <a href="#">Read your articles</a>
  </li>
  <li>
    <a href="#">Modify an existing article</a>
  </li>
  <li>
    <a href="#">Delete an article</a>
  </li>
</ul>


<?php
include_once 'Vue/Admin/comments.php';
include_once 'Vue/Templates/footer.php';
?>
