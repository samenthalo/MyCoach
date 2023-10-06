<?php
require 'connexion.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération de l'adresse e-mail et du mot de passe
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $_SESSION['mail'] = $mail; // Stockage de l'adresse e-mail dans la variable de session

    // Requête de sélection
    $sql = "SELECT * FROM utilisateur WHERE mail = :mail";

    // Préparation de la requête
    $stmt = $connexion->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':mail', $mail);

    // Exécution de la requête
    $stmt->execute();

    // Récupération du résultat
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du résultat
    if ($user) {
        // L'utilisateur existe

        // Vérification du mot de passe
        if (password_verify($mdp, $user['mdp'])) {
            // Le mot de passe correspond

            // Vous pouvez accéder aux valeurs de l'utilisateur
            $_SESSION['nom'] = $user['nom']; // Stockage du nom dans la variable de session
            $_SESSION['prenom'] = $user['prenom']; // Stockage du prénom dans la variable de session
            $_SESSION['connecte'] = true;
            header("Location: seances.php");
            exit;
        } else {
            // Le mot de passe ne correspond pas
            echo '<div style="background-color: #f8d7da;color: #721c24;padding: 10px;text-align: center;">Adresse e-mail ou mot de passe incorrect.</div>';

        }
    } else {
        // L'utilisateur n'existe pas
        echo '<div style="background-color: #f8d7da;color: #721c24;padding: 10px;text-align: center;">Adresse e-mail ou mot de passe incorrect.</div>';
    }
}
?>
