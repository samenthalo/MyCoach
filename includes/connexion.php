<?php
    //connexion BDD
$login = "root";
$password = "";

    //Connexion BDD
    try{
        $connexion= new PDO('mysql:host=localhost;dbname=mycoach', $login, $password);


    }catch(Exception $e){
        //affichage de l'erreur
        echo 'Connexion échouée à la base de données<br>';
    }
?>