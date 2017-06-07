<?php
include_once 'Vue\Templates\header.php';
include_once 'Vue\Templates\navigation.php';
?>

<div class="container">
  <h2>Write a new article</h2>
  <hr>

  <form class="" method="post">
    <div class="form-group">
      <label for="titre">Titre de l'épisode</label>
      <input id="titre" class="form-control" type="text" name="titre" placeholder="Episode title">
    </div>
    <div class="form-group">
      <label for="episode">Votre episode</label>
      <textarea id="episode" class="form-control" name="episode">
      </textarea>
    </div>
    <div class="form-group">
      <label for="status">Souhaitez-vous publier l'article ?</label>
      <select id="status" class="form-control" name="status">
        <option value="0">Not Publish</option>
        <option value="1">Publish</option>
      </select>
    </div>
    <button type="submit" class="btn btn-default" name="button">
      Save/Send your episode
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
