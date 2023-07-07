<?php
require('actions/database.php');
$conn=connexion();

// verifier si id de la question est passser dans l'url
if(isset($_GET['id'])AND !empty($_GET['id'])){
    $idOfTheQuestion = $_GET['id'];
    $checkIfQuestionExists = $conn->prepare('SELECT *FROM question WHERE id = ?');
    $checkIfQuestionExists-> execute(array($idOfTheQuestion));
    if($checkIfQuestionExists ->rowCount() > 0){
       //Recuperer toutes les donnees de la question 

       $questionsInfos = $checkIfQuestionExists->fetch();
       // Stocker les les donnnees dans des variables 
       $question_title = $questionsInfos['titre'];
       $question_description = $questionsInfos['description'];
       $question_contenu = $questionsInfos['contenu'];
       $question_IdAuteur = $questionsInfos['id_auteur'];
       $question_pseudoAuteur = $questionsInfos['pseudo_auteur'];
       $question_datePublication = $questionsInfos['date_publication'];


    }

}else{
    $errorMsg="Aucune question n'ete trouvée";
}

?>