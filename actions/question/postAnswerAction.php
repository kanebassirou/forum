<?php
// require('actions/database.php');
// $conn=connexion();
if(isset($_POST['validate'])){
    if(!empty($_POST['answer'])){
        $user_answer = nl2br(htmlspecialchars($_POST['answer']));
        $insertAnwer = $conn->prepare('INSERT INTO reponse (id_auteur,pseudo_auteur,id_question,contenu) VALUES(?,?,?,?)');
        $insertAnwer->execute(array($_SESSION['id'],$_SESSION['pseudo'],$idOfTheQuestion,$user_answer));


    }
}

?>