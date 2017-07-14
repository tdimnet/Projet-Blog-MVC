<?php
require_once 'Services/flashMessagesService.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Billet simple pour l'Alaska</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="Public/css/background.css">
  <link rel="stylesheet" href="Public/css/main.css">

</head>
<body>
  <header>
    <?php
      if (isset($flashMessage)) { ?>
        <div class="alert alert-success text-center">
          <?php echo $flashMessage; ?>
        </div>
    <?php
    }
    ?>
  </header>
