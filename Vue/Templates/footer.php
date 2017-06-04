<hr>

<footer>
  <h1>Here goes the footer</h1>

  <?php
  if ($path === 'Controller/Blog/index.php') {
  ?>
    <a href="?Controller=Admin">Se connecter</a>
  <?php } else { ?>
    <a href="?Controller=Blog">Se deconnecter</a>
  <?php } ?>

</footer>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
