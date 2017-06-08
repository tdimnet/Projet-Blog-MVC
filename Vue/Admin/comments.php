<h3 class="text-center">Vos cinq derniers commentaires</h3>
<hr>
<?php
$Comment = new Comment();
$comments = $Comment->findAllComments();
foreach ($comments as $comment) { ?>
  <h4>
    Comment author : <?php echo $comment['full_name']; ?>
    <br>
    <small>
      Author email address : <?php echo $comment['email_address']; ?>
    </small>
  </h4>
  <p>
    Commnent :
    <br>
    <?php echo $comment['comment']; ?>
  </p>
  <p>
    <a class="btn btn-danger" href="?Controller=Admin&&Action=moderateComment&&id=<?php echo $comment['id'] ?>">Moderate the article comment</a>
  </p>
  <hr>
<?php
}
?>
