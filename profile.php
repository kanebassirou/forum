<?php 
require'actions/users/showOneUserProfileAction.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('includes/head.php');?>
</head>
<body>
<?php include('includes/nav.php');?>
<?php
if(isset($errorMsg)){echo $errorMsg;}
if(isset($getThisQuestion)){
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $user_pseudo?></h4>
            <hr>
            <p><?= $user_lastname . ' ' . $user_firstname?></p>
        </div>
    </div>
    <br>
    <?php
    while($question = $getThisQuestion->fetch()){
        ?>
        <div class="card">
            <div class="card-header">
                <?= $question['titre']; ?>

            </div>
            <div class="card-body">
            <?= $question['description']; ?>
            </div>
            <div class="card-footer">
            <?= $question['pseudo_auteur']; ?> le <?= $question['date_publication']; ?>



            </div>
        </div>
        <?php
    }

}
?>

    
</body>
</html>