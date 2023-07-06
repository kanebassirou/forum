<?php
require('actions/database.php');
$conn=connexion();
// recuperer les question par defaut
$getAllQuestions = $conn->query('SELECT id,id_auteur,titre,description,pseudo_auteur,date_publication FROM question ORDER BY id DESC LIMIT 0,5'); 
    // verifier si la recherche est rentre par l'utilisateur

if(isset($_GET['search']) AND !empty($_GET['search'])){
    //la recherche
    $usersSearch = $_GET['search'];
    // recuperer tous les question qui correspond a la en fonction du titre
    $getAllQuestions =$conn-> query('SELECT id,id_auteur,titre,description,pseudo_auteur,date_publication FROM question WHERE titre LIKE"%'.$usersSearch.'%" ORDER BY id DESC');

}

 ?>