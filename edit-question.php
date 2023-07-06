<?php

// require('actions/question/getInfosOfOnEditAction.php');
require('actions/question/editQuestionAction.php');
if(!isset($_SESSION['auth'])){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include'includes/head.php'?>
</head>
<body>
<?php include'includes/nav.php'?>
<div class="container">
<?php 
  if(isset($errorMsg))
  {
    echo '<p>'.$errorMsg.'</p>'; 
  }
  
?>
<?php
if(isset($question_date)){
  ?>
  <form method="POST">
<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Titre de la Question</label>
  <input type="text" class="form-control" name="title" value="<?=$question_title;?>" >
</div>
<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Description de question</label>
  <textarea type="text" class="form-control" name="description">
  <?=$question_description;?>
  </textarea>
</div>
<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
  <textarea type="text" class="form-control"name="content">
  <?=$question_contenu;?>

  </textarea>
</div>
<button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
</form>
  <?php

}
?>

</div>
</body>
</html>