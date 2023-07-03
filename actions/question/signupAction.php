<?php
require('actions/database.php');
// VALIDATION DES DONNNES DANS FORMULAIRE
if(isset($_POST['validate'])){
    // Verifier si user à t'il remplir tous les champs dans la formulaire
    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password']))
    {
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_fistname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $checkIfIdExist =   $conn->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        // verifi   er si l'utisateur existe ou pas
        $checkIfIdExist -> execute(array($user_pseudo));
        if($checkIfIdExist->rowCount() ==0){
            // inserer un utilisateur 
            $insertUserOnWebSite = $conn -> prepare(' INSERT INTO users (pseudo,lastname,firstname,password)VALUES(?,?,?,?)');
            $insertUserOnWebSite-> execute(array($user_pseudo,$user_lastname,$user_fistname,$user_password));
            // recuper les information d'un utilisateur
            $getInfoOfUserReq = $conn->prepare('SELECT id ,pseudo ,lastname,firstname FROM users WHERE pseudo = ? AND lastname = ? AND firstname = ?');
            $getInfoOfUserReq -> execute(array($user_pseudo,$user_lastname,$user_fistname));
            $userInfos= $getInfoOfUserReq -> fetch();
            // Authentification de l'utilisateur sur le site et recuperer des donnees dans des variables globale session 
            $_SESSION['auth'] =true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['lastname'];
            $_SESSION['firstname'] = $userInfos['firstname'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];
            // rediriger vers la page d'acceuil
            header('Location: login.php');
              

        }else{
            $errorMsg ="L'utilisateur existe deja";
        }


    }else{
        $errorMsg ="Veuillez remplir tout les champs svp  !!!!";
    }
}
 
?>