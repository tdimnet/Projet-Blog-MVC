  <footer>

    <?php
    if ($path === 'Controller/Blog/index.php') {
    ?>
      <a href="?Controller=Admin">Se connecter</a>
    <?php } else { ?>
      <a href="?Controller=Blog">Se deconnecter</a>
    <?php } ?>

  </footer>
</body>
</html>
