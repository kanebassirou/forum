<?php 
require('actions/question/getInfosOfOnEditAction.php');
//verification du formulaire
if(isset($_POST['validate'])){
    //  verifier si les champs sont remplis
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        //les donnees passer dans la requete
        $newQuestion_title =nl2br(htmlspecialchars($_POST['title']));
        $newQuestion_description =nl2br(htmlspecialchars($_POST['description']));
        $newQuestion_content =nl2br( htmlspecialchars($_POST['content']));
        // modifier les informations de la question qui possede l'id rentre en parametre
        $editQuestionOnWebSite = $conn->prepare('UPDATE question SET titre = ?, description = ?, contenu = ? WHERE id = ?');
        $editQuestionOnWebSite->execute(array($newQuestion_title, $newQuestion_description, $newQuestion_content, $idQuestion));
        
        header('Location: my-questions.php');

    }else{
        $errorMsg =" Veuillez completez tous les champs.....";
    }
}
?>