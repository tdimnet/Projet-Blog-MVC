<?php

include_once 'Vue\Templates\header.php';
?>

<h2>This is where I write all my articles</h2>

<form class="" method="post">
  <input type="text" name="titre" placeholder="Episode title">
  <br>
  <textarea name="episode" rows="8" cols="80" placeholder="Episode text"></textarea>
  <br>
  <button type="submit" name="button">
    Send your episode
  </button>
</form>


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
