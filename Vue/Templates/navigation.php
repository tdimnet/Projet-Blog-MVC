<nav class="navbar navbar-default">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">Billet simple pour l'Alaska</a>
    <?php
    if ($_GET['Controller'] === 'Blog' && $_GET['Vue'] === 'article') {
    ?>
    <ul class="nav navbar-nav navbar-left">
      <li>
        <a
          href="?Controller=Blog&&Vue=article&&id=<?php echo $article->getId(); ?>"
        >
          Nom de l'episode : <?php echo $article->getTitre(); ?>
        </a>
    </li>
    </ul>
    <?php
    }
    ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="./">Home</a></li>
      <?php
      if ($_GET['Controller'] === 'Admin') {
      ?>
      <li>
        <a href="./?Controller=Admin">
          Admin
        </a>
      </li>
      <li><a href="?Controller=Admin&&Action=deconnexion">Se deconnecter</a></li>
      <?php
      }
      ?>
    </ul>
  </div>
</nav>
