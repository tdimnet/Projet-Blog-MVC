  <footer class="footer">

    <?php
    if ($path === 'Controller/Blog/index.php') {
    ?>
      <a href="?Controller=Admin">Se connecter</a>
    <?php } else { ?>
      <a href="?Controller=Blog">Se deconnecter</a>
    <?php } ?>

  </footer>

  <?php
  if (isset($_GET['Controller']) && $_GET['Controller'] === 'Admin') {
  ?>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
  tinymce.init({
    selector: 'textarea',
    height: 500,
    menubar: false,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table contextmenu paste code'
    ],
    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  });
  </script>
  <?php
  }
  ?>

</body>
</html>
