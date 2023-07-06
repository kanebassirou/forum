<?php
require('actions/database.php');
$conn=connexion();


// VALIDATION DES DONNÉES DANS LE FORMULAIRE
if(isset($_POST['validate'])) {
    // Vérifier si le pseudo et le mot de passe existent
    if(!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        $checkIfUserExists = $conn->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0) {
            $userInfos = $checkIfUserExists->fetch();

            // Vérifier si le mot de passe est correct
            if(password_verify($user_password, $userInfos['password'])) {
                // Authentification de l'utilisateur sur le site et récupération des données dans des variables globales de session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['lastname'] = $userInfos['lastname'];
                $_SESSION['firstname'] = $userInfos['firstname'];
                $_SESSION['pseudo'] = $userInfos['pseudo'];

                // Rediriger vers la page d'accueil
                header('Location: index.php');
            } else {
                $errorMsg = "Votre mot de passe est incorrect...";
            }
        } else {
            $errorMsg = "Votre pseudo et mot de passe ne correspondent pas !!!";
        }
    } else {
        $errorMsg = "Veuillez remplir tous les champs, s'il vous plaît !!!";
    }
}
?>