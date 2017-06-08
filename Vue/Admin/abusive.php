<h3 class="text-center">Les commentaires signalés</h3>
<hr>
<?php
foreach ($signaledComments as $comment) { ?>
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
    <a class="btn btn-info" href="?Controller=Admin&&Action=moderateComment&&id=<?php echo $comment['id'] ?>">
      No problem with it
    </a>
    <a class="btn btn-danger" href="?Controller=Admin&&Action=moderateComment&&id=<?php echo $comment['id'] ?>">
      Moderate this comment
    </a>
  </p>
  <hr>
<?php
}
?>
