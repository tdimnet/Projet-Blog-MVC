<h3 class="text-center">Les commentaires signalés</h3>
<hr>
<?php
foreach ($signaledComments as $comment) { ?>
  <h4>
    Comment author : <?php echo $comment->getFull_name() ?>
    <br>
  </h4>
  <p>
    Commnent :
    <br>
    <?php echo $comment->getComment(); ?>
  </p>
  <p>
    <a
    class="btn btn-primary"
    href="?Controller=Admin&&Action=unmoderateComment&&id=<?php echo $comment->getId(); ?>"
    >
      Retrieve original comment
    </a>
    <br>
    <a
    class="btn btn-info"
    href="?Controller=Admin&&Action=unsignalComment&&id=<?php echo $comment->getId(); ?>"
    >
      No problem with it
    </a>
    <br>
    <a
    class="btn btn-danger"
    href="?Controller=Admin&&Action=moderateComment&&id=<?php echo $comment->getId(); ?>"
    >
      Moderate this comment
    </a>
  </p>
  <?php
   if ($comment->getModerate()) {
   ?>
     <div class="alert alert-info">
       Ce commentaire a été moderé.
     </div>
  <?php
   }
  ?>
  <hr>
<?php
}
?>
