
<?php
include_once 'Vue/Templates/header.php';
// include_once 'Vue/Templates/navigation.php';
?>
<div class="">
  <div class="content">
    <div id="large-header" class="large-header">
        <canvas id="demo-canvas"></canvas>
        <div class="main-title">
          <h1 class="text-underline">Billet simple pour l'Alaska</h1>
          <div class="container">
            <?php
            // Display the list of articles
            foreach ($articles as $article) { ?>
              <h4>
                <?php echo $article['titre']; ?> -
                <a class="btn btn-primary" href="?Controller=Blog&&Vue=article&&id=<?php echo $article['id'] ?>">
                  Lire la suite
                </a>
              </h4>
              <small>
                <?php echo $article['date_creation']; ?>
              </small>
            <?php }
            ?>
          </div>

        </div>
    </div>

  </div>
</div>


<script src="./Public/js/rAF.js" charset="utf-8"></script>
<script src="./Public/js/background.js" charset="utf-8"></script>
<?php
include_once 'Vue/Templates/footer.php';
?>
