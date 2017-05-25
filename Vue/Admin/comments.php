<h2>Here are all the comments of the articles</h2>

<?php
$comments = findAllComments();
foreach ($comments as $comment) { ?>
  <hr>
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
<?php
}
?>
