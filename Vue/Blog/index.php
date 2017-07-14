<?php
include_once 'Vue/Templates/header.php';
?>
<div class="">
  <div class="content">
    <div id="large-header" class="large-header">
        <canvas id="demo-canvas"></canvas>
        <div class="main-title">
          <h1 class="text-underline">Billet simple pour l'Alaska</h1>
          <div class="container">
            <div class="row">

            </div>
            <?php
            // Display the list of articles
            foreach ($Articles as $Article) { ?>
              <h4 class="col-xs-6 col-md-4" >
                <?php echo $Article->getTitre(); ?>
                <br>
                <a
                  class="btn btn-primary cta-button"
                  href="?Controller=Blog&&Vue=article&&id=<?php echo $Article->getId(); ?>"
                >
                  Lire la suite
                </a>
              </h4>
            <?php }
            ?>
          </div>
        </div>
    </div>

  </div>
</div>
<?php
include_once 'Vue/Templates/footer.php';
?>
