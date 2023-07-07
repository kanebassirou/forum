<?php 
require('actions/database.php');
$conn=connexion();
// recuperer l'id de l'utilisateur
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idOfUser = $_GET['id'];
    $checkIdUserExists = $conn -> prepare('SELECT pseudo,lastname,firstname FROM users WHERE id = ?');
    $checkIdUserExists -> execute(array($idOfUser));
    if($checkIdUserExists->rowCount() >0){
        // recuperer toutes les donnees de l'utilisateur
        $userInfos = $checkIdUserExists -> fetch();
        $user_pseudo = $userInfos['pseudo'];
        $user_lastname = $userInfos['lastname'];
        $user_firstname = $userInfos['firstname'];
        // recuperer toutes question publier par utilisateur
        $getThisQuestion = $conn->prepare('SELECT * FROM question where id_auteur = ? ');
        $getThisQuestion -> execute(array($idOfUser));



    }else{
        $errorMsg ="Aucun utilsateur trouve";

    }

}else{
    $errorMsg ="Aucun utilsateur trouve";
}
 ?>