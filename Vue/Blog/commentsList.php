<h2>Comments linked to this article</h2>

<?php
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
  <ul>
    <li>
      Repondre
    </li>
    <li>
      Signaler
    </li>
  </ul>
<?php
// If the array of answers of the current comment is not empty, show it
$answers = findAnsweringComment($comment['article_id'], $comment['id']);
  if (!empty($answers)) {
    var_dump($answers);
  }
}
?>
