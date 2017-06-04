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

// Prevoir un include pour cette FANNConnection
// Créer une variable pour préciser a chaque que je rentre dans la fonction => si la variable atteint son nombre max (4 niveau de reponses) => on stop

// If the array of answers of the current comment is not empty, show it
$answers = $Comment->findAnsweringComment($comment['id']);
  if (!empty($answers)) {
    var_dump($answers);
    // The way to access the last answers (not more tree sub-levels of comment)
    // For now, we are just fetching the first item inside the array
    // 'last_answer' => string '1' = true / else false
    $lasts = $Comment->findAnsweringComment($answers[0]['id']);
    foreach ($lasts as $last) {
      if(!empty($last)) {
        var_dump('last answer ',$last);
      }
    }
  }
}
?>
