<?php
require('actions/question/showArticleContentAction.php');
require('actions/question/postAnswerAction.php');
require('actions/question/showAllAnwserOfQuestionAction.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include'includes/head.php'; ?>
</head>
<body>
<?php include'includes/nav.php'; ?>
<br><br>
<div class="container">
    <?php
    if(isset($errorMsg)){ echo $errorMsg;}
    if(isset($question_datePublication)){
        ?>
        <section class="row-content">
        <h3><?=$question_title;?></h3>
        <hr>
        <p><?=$question_contenu;?></p>
        <hr>
        <small><?=$question_pseudoAuteur . '' . $question_datePublication; ?></small>
        </section>
        <br>
        <div class="section show-answers">
          <form class="form-group" method="POST">
            <div class="mb-3">
            <label for="exampleInputEmail1" class ="form-label">Reponse</label>
            </div>
            <textarea name="answer"  class="form-control"></textarea>
            <br>
            <button class="btn btn-primary" type="submit" name="validate">Répondre</button>

          </form>  
          <?php
          while($answer = $getAllAnswersOfThisQuestion ->fetch()){
            ?>
            <div class="card">
                <div class="card-header">
                    <?= $answer['pseudo_auteur'];?>

                </div>
                <div class="card-body">
                <?= $answer['contenu'];?>
                </div>
            </div>
            <br>
            <?php
          }
          ?>
        </div>


        <?php
    }
    ?>

</div>

    
</body>
</html>