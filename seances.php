<?php include('includes/connexion.php');
session_start();
if (!isset($_SESSION['connecte'])) {
    // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header('Location: accueil.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Séances - MyCoach</title>
	<link rel="stylesheet" type="text/css" href="styles/seances.css">
</head>
<body>

	<div class="conteneur">
        <!-- création de la barre de navigation -->
        <ul class="menu">
            <h1 class="nom">Pierre Gaillard</h1>
            <img class="photo" src="pierre_gaillard.jpg" width="100px" height="120px" alt="Photo de Pierre Gaillard">
            <!--ajouter d'autres liens du menu ici -->
            <li><a href="accueil.php">Accueil</a></li>
            <?php
        // Vérifie si la variable de session 'connecte' est définie et égale à true
            if (isset($_SESSION['connecte']) && $_SESSION['connecte'] === true) {
                // Si la condition est vraie, cela signifie que l'utilisateur est connecté.

                // Affiche un lien vers la page "seances.php" pour accéder aux séances
                echo '<li><a href="seances.php">Séances</a></li>';

                // Affiche un lien vers la page "includes/deconnexion.php" pour se déconnecter
                echo '<li><a href="includes/deconnexion.php">Déconnexion</a></li>';
            }
            ?>

        </ul>
    </div>
    <header>
        <h1>Pierre Gaillard - Coach Sportif</h1>
        <p>Un passionné de fitness et de bien-être</p>
    </header>
    <section id="services">
        <?php 
        try {
            //requête SQL pour extraire les données de la base de données
            $seance = "SELECT jour, horaire, sport, niveau, nom, adresse, cp, ville
            FROM seances, sports, niveau, salle
            WHERE sports.id=seances.id_sport AND niveau.id=seances.id_niveau AND salle.id=seances.id_salle
            ";
            // Exécute la requête SQL et stocke les résultats dans la variable $resultatseance
            $resultatseance = $connexion->query($seance);



        } catch (PDOException $e) {
        // En cas d'erreur de la base de données.
            echo "Erreur de la base de données. ";
        }


        while ($seanceRow = $resultatseance->fetch()) {
            //nouvel élément de liste ordonnée (pour chaque résultat de la requête)
            echo "<ol>";
            //nouvel élément de liste non ordonnée (pour chaque résultat de la requête)
            echo "<li>";
            // Affiche le jour et l'horaire
            echo "<h3>" . $seanceRow['jour'] ." ". $seanceRow['horaire'] . "</h3>";
            // Affiche le sport et le niveau
            echo "<h4>Sport : " . $seanceRow['sport'] . " - Niveau : " . $seanceRow['niveau'] . "</h4>";
            // Affiche le nom de la salle
            echo "<p>Salle : " . $seanceRow['nom'] . "</p>";
            // Affiche l'adresse complète
            echo "<p>Adresse : " . $seanceRow['adresse'] . ", " . $seanceRow['cp'] . " " . $seanceRow['ville'] . "</p>";
            // Termine l'élément de liste non ordonnée
            echo "</li>";
            // Termine l'élément de liste ordonnée
            echo "</ol>";
        }

        ?>
    </ol>   
</li>  
</section>
</body>
</html>