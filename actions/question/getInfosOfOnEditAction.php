<?php
require('actions/database.php');
$conn=connexion();

// valider le formulaire
if(isset($_GET['id']) AND !empty($_GET['id'])){
    //verifier si les champs ne sont pas vide
    $idQuestion = $_GET['id'];
    $checkIfQuestionExists = $conn->prepare('SELECT *FROM question WHERE id= ?');
    $checkIfQuestionExists -> execute(array($idQuestion));
    if($checkIfQuestionExists->rowCount() > 0){
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_auteur'] == $_SESSION['id']){
            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['description'];
            $question_contenu = $questionInfos['contenu'];
            $question_date = $questionInfos['date_publication'];
            $question_description = str_replace('<br />','',$question_description);
            $question_contenu = str_replace('<br />','',$question_contenu);



        }else{
            $errorMsg ="Vous n'etes pas l'auteur de cette question";
        }

         
    }else{
        $errorMsg ="Aucun question n'a ete trouvee";
    }

}else{
    $errorMsg ="Aucun question n'a ete trouvée";
}


?>