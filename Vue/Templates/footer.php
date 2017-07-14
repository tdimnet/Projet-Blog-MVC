  <footer class="footer">
    <?php if ($path === 'Controller/Blog/index.php'): ?>
      <a href="?Controller=Blog&&Vue=connexion">Se connecter</a>
    <?php else: ?>
      <div class="container">
        <div class="row">
          <hr>
          <p class="text-center">
            &copy; Best web site
          </p>
        </div>
      </div>
    <?php endif; ?>
  </footer>

  <?php
    if ($path === 'Controller/Blog/index.php') {
  ?>
    <script src="./Public/js/rAF.js" charset="utf-8"></script>
    <script src="./Public/js/background.js" charset="utf-8"></script>
  <?php
    } else if (isset($_GET['Controller']) && isset($_GET['Vue']) && $_GET['Controller'] === 'Blog') { ?>
      <script
      src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous"></script>
      <script src="./Public/js/app.js" charset="utf-8"></script>
  <?php
    }
  ?>


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

  <?php
  // The include script for adding new comments
    if (isset($_GET['Controller']) && isset($_GET['Vue']) && isset($_GET['id'])) {
      if ($_GET['Controller'] === 'Blog' && $_GET['Vue'] === 'article') {
        ?>
          <script src="./Public/js/addComment.js" charset="utf-8"></script>
        <?php
      }
    }
  ?>

</body>
</html>
