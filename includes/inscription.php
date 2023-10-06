<?php
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Le formulaire d'inscription a été soumis
    // Effectuer les traitements nécessaires, comme la vérification de l'existence d'un compte

    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    try {
        // Vérification si l'utilisateur existe déjà avec l'adresse e-mail
        $sql = "SELECT COUNT(*) FROM utilisateur WHERE mail = :mail";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // L'utilisateur existe déjà avec cette adresse e-mail
            echo '<div style="background-color: #f8d7da;color: #721c24;padding: 10px;text-align: center;">Vous avez déjà un compte. Veuillez vous connexionecter.</div>';
        } else {
            // Hashage du mot de passe
            $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

            // Génération de l'identifiant en minuscules
            $identifiant = strtolower($nom) . strtolower($prenom);

            // Requête d'insertion
            $sql = "INSERT INTO utilisateur (nom, prenom, mail, mdp) 
            VALUES (:nom, :prenom, :mail, :mdp)";

            // Préparation de la requête
            $stmt = $connexion->prepare($sql);

            // Liaison des paramètres
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':mdp', $hashedPassword); // Utilisation du mot de passe hashé
            // Vous devez également définir la valeur de $statut ici

            // Exécution de la requête d'insertion
            $stmt->execute();

            // Si l'insertion s'est bien passée, vous pouvez afficher un message de succès
            echo '<div style="background-color: #d4edda;color: #155724;padding: 10px;text-align: center;">Inscription réussie ! Vous pouvez vous connexionecter maintenant.</div>';
        }
    } catch (PDOException $e) {
        // En cas d'erreur lors de l'exécution des requêtes SQL
        echo 'Erreur de base de données : ' . $e->getMessage();
    }
}
?>
