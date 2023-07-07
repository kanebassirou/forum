<?php
require('actions/question/showArticleContentAction.php')
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
        <h3><?=$question_title;?></h3>
        <hr>
        <p><?=$question_contenu;?></p>
        <hr>
        <small><?=$question_pseudoAuteur . '' . $question_datePublication; ?></small>

        <?php
    }
    ?>

</div>

    
</body>
</html>