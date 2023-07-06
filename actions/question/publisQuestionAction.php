<?php
require 'actions/database.php';
$conn=connexion();

if (isset($_POST['validate'])) {
    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['id'])) {
        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {
            $question_title = htmlspecialchars($_POST['title']);
            $question_description =nl2br(htmlspecialchars($_POST['description']));
            $question_content =nl2br(htmlspecialchars($_POST['content'])) ;
            $question_id_date = date('d/n/y');

            $question_id_author = $_SESSION['id'];
            $question_pseudo_author = $_SESSION['pseudo'];
            
            // Effectuer l'insertion dans la base de données
            $insertQuestionONWebSite = $conn->prepare('INSERT INTO question (titre, description, contenu, id_auteur, pseudo_auteur, date_publication) VALUES (?, ?, ?, ?, ?, ?)');
            $insertQuestionONWebSite->execute(array($question_title, $question_description, $question_content, $question_id_author, $question_pseudo_author, $question_id_date));
            
            $successMsg = "Votre question a bien été publiée sur le site.";
        } else {
            $errorMsg = "Veuillez remplir tous les champs...";
        }
    } else {
        $errorMsg = "Vous devez être connecté pour publier une question.";
    }
}
?>
