<?php
require('actions/database.php');
$conn=connexion();
// VALIDATION DES DONNNES DANS FORMULAIRE
if(isset($_POST['validate'])){
    // Verifier si le pseudo et pwd existe
    if(!empty($_POST['pseudo']) AND !empty($_POST['password']))
    {
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
     
        $user_password = htmlspecialchars($_POST['password']);
        $checkIfUserExists = $conn->prepare('SELECT *FROM users WHERE pseudo = ?');
        $checkIfUserExists -> execute(array($user_pseudo));
        if($checkIfUserExists -> rowCount() > 0){
            $usersInfos = $checkIfUserExists->fetch();
            // Verifier si le mot de passe est correct
            if(password_verify($user_password,$usersInfos['password'])){
                // Authentification de l'utilisateur sur le site et recuperer des donnees dans des variables globale session 
            $_SESSION['auth'] =true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['lastname'];
            $_SESSION['firstname'] = $userInfos['firstname'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];
            // rediriger vers la page d'acceuil
            header('Location: index.php');

            }else{
                $errorMsg ="Votre mot de passe est incorrect ...";
            }

        }else{
            $errorMsg ="votre pseudo et mot de passe ne correspond pas !!!!";


        }




    }else{
        $errorMsg ="veuillez remplir tout les champs svp  !!!!";
    }
}

?>