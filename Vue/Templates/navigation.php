<nav class="navbar navbar-default">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">Billet simple pour l'Alaska</a>
    <?php
    if ($_GET['Controller'] === 'Blog') {
    ?>
    <ul class="nav navbar-nav navbar-left">
      <li>
        <a href="?Controller=Blog&&Vue=article&&id=<?php echo $article['id']; ?>">
          Nom de l'episode : <?php echo $article['titre']; ?>
        </a>
    </li>
    </ul>
    <?php
    }
    ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="./">Retourner à l'accueil</a></li>
    </ul>
  </div>
</nav>
