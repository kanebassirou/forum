<?php
session_start();
function connexion ($servername="localhost",$dbname="forum",$username="root",$password ="")
{
     $connexion =null; //supprimer tout les connexion anterieures
     try {
        $connexion = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connexion reussie";
    } catch(PDOException $e) {
        echo "ERREUR: " . $e->getMessage();
    }
    return $connexion ;
    
}