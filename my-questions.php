<?php require ('actions/question/my-questionAction.php');
if(!isset($_SESSION['auth'])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include'includes/head.php';?>
</head>
<body>
<?php include'includes/nav.php';?>
<br> <br>
<div class="container">
<?php
while($question = $getAllMyQuestions->fetch()){
    ?>
    <div class="card">
  <div class="card-header">
    <?= $question['titre']; ?>
  </div>
  <div class="card-body">
    <p class="card-text">
    <?= $question['description']; ?>
    </p>
    <a href="#" class="btn btn-primary">Acceder à la question</a>
    <a href="edit-question.php?id=<?=$question['id'];?>" class="btn btn-warning ">Modifier la question</a>
    <a href="actions/question/deleteQuestionAction.php?id=<?=$question['id'];?>" class="btn btn-danger ">Supprimer la question</a>
  </div>
</div>
<br>


    <?php
  

}  



?>
</div>


    
</body>
</html>