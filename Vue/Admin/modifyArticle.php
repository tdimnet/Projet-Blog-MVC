<?php
include_once 'Vue\Templates\header.php';
include_once 'Vue\Templates\navigation.php';
?>

<div class="container">
  <h2>Modify an existing article</h2>
  <hr>
  <form class="" method="post">
    <div class="form-group">
      <label for="titre">Titre de l'episode</label>
      <input id="titre" class="form-control" type="text" name="titre" placeholder="Episode title" value="<?php echo $article['titre']; ?>">
    </div>
    <div class="form-group">
      <label for="episode">Contenu de l'episode</label>
      <textarea id="episode" class="form-control" name="episode" placeholder="Episode text"><?php echo $article['episode']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="status">Status de l'episode</label>
      <select id="status" class="form-control" name="status">
        <option value="0">Not Publish</option>
        <option value="1">Publish</option>
      </select>
    </div>
    <button class="btn btn-default" type="submit" name="button">
      Modify your episode
    </button>
  </form>
</div>



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
include_once 'Vue\Templates\footer.php';
?>
