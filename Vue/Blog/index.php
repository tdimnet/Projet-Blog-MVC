
<?php
include_once 'Vue/Templates/header.php';
// include_once 'Vue/Templates/navigation.php';
?>
<div class="container demo-4">
  <div class="content">
    <div id="large-header" class="large-header">
        <canvas id="demo-canvas"></canvas>
        <h1 class="main-title">Billet simple pour l'Alaska</span></h1>
    </div>
    <?php
    // Display the list of articles
    foreach ($articles as $article) { ?>
      <!-- <h4>
        <?php echo $article['titre']; ?> -
        <small>
          <?php echo $article['date_creation']; ?>
        </small>
      </h4> -->

      <!-- <a href="?Controller=Blog&&Vue=article&&id=<?php echo $article['id'] ?>">
        Lire la suite
      </a>
      <br> -->
    <?php }
    ?>
  </div>
</div>


<script src="./Public/js/rAF.js" charset="utf-8"></script>
<script src="./Public/js/background.js" charset="utf-8"></script>
<?php
include_once 'Vue/Templates/footer.php';
?>
