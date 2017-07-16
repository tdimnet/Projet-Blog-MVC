<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./">Billet simple pour l'Alaska</a>
    </div>

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
      <li>
        <a href="./">
          Accueil
        </a>
      </li>
      <?php
      if ($_GET['Controller'] === 'Admin') {
      ?>
      <li>
        <a href="./?Controller=Admin">
          Administration
        </a>
      </li>
      <li><a href="?Controller=Admin&&Action=deconnexion">Se deconnecter</a></li>
      <?php
      }
      ?>
    </ul>
  </div>
</nav>
