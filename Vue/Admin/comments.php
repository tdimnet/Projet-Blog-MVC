<h3 class="text-center">Here are all the comments of the articles</h3>

<?php
$Comment = new Comment();
$comments = $Comment->findAllComments();
foreach ($comments as $comment) { ?>
  <hr>
  <h4>
    Comment author : <?php echo $comment['full_name']; ?>
    <br>
    <small>
      Author email address : <?php echo $comment['email_address']; ?>
    </small>
  </h4>

  <h5><a href="#">Moderate the article comment</a></h5>
  <p>
    Commnent :
    <br>
    <?php echo $comment['comment']; ?>
  </p>
<?php
}
?>
