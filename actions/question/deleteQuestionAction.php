<?php
require('../database.php');
$conn=connexion();
if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idOftheQuestion = $_GET['id'];
    $checkIdQuestionExists = $conn-> prepare('SELECT id_auteur FROM question WHERE id = ?');
    $checkIdQuestionExists -> execute(array($idOftheQuestion));
    if($checkIdQuestionExists->rowCount() > 0){
       $userInfos = $checkIdQuestionExists ->fetch();
       if($userInfos['id_auteur'] == $_SESSION['id']){
        $deleteThisQuestion = $conn -> prepare('DELETE FROM question WHERE id = ?');
        $deleteThisQuestion -> execute(array($idOftheQuestion));
        header('Location: ../../my-questions.php');

       }else{
        echo"vous n'avez pas le droit de supprime une question qui ne vous appartient pas";
       }   
         
    }

}else{
    echo"Aucun question n'a ete trouvee";
}
?>