
<?php require('actions/question/publisQuestionAction.php');
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
    <?php include'includes/nav.php'?>;
<br><br>

<form class="container" method="POST">
  <?php 
  if(isset($errorMsg)){
    echo '<p>'.$errorMsg.'</p>';
  }elseif(isset($successMsg)){
    echo '<p>'.$successMsg.'</p>';
  }
?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre de la Question</label>
    <textarea type="text" class="form-control" name="title" ></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description de question</label>
    <textarea type="text" class="form-control" name="description"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
    <textarea type="text" class="form-control"name="content"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="validate">publier la question</button>
 

</form>
</body>
</html>