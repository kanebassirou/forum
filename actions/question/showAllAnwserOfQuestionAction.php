<?php 
// require('actions/database.php');
// $conn=connexion();

$getAllAnswersOfThisQuestion = $conn-> prepare('SELECT id_auteur,pseudo_auteur,id_question,contenu FROM reponse WHERE id_question = ? ORDER BY id DESC');
$getAllAnswersOfThisQuestion -> execute(array($idOfTheQuestion));

?>