<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Accueil - MyCoach</title>
	<link rel="stylesheet" type="text/css" href="styles/acceuil.css">
</head>
<body>

	<div class="conteneur">
        <!-- création de la barre de navigation -->
        <ul class="menu">
            <h1 class="nom">Pierre Gaillard</h1>
            <img class="photo" src="pierre_gaillard.jpg" width="100px" height="120px" alt="Photo de Pierre Gaillard">
            <li><a href="accueil.php">Accueil</a></li>
            <?php
            // Démarrer la session
            session_start();
            // Vérifier si la variable de session 'connecte' est définie et égale à true
            if (isset($_SESSION['connecte']) && $_SESSION['connecte'] === true) {
             // Si l'utilisateur est connecté, afficher ces liens
                echo '<li><a href="seances.php">Séances</a></li>';
                echo '<li><a href="includes/deconnexion.php">Déconnexion</a></li>';
            } else {
             // Si l'utilisateur n'est pas connecté, afficher ces liens
                echo '<li><a href="inscriptionhtml.php">Inscription</a></li>';
                echo '<li><a href="connexionhtml.php">Connexion</a></li>';
            }
            ?>

      
    </ul>
</div>
<header>
    <h1>Pierre Gaillard - Coach Sportif</h1>
    <p>Un passionné de fitness et de bien-être</p>
</header>
<section id="services">
    <h2>Services proposés par Pierre :</h2>
    <ol>
        <li>
            <!-- Titre du sport -->
            <h3>Renforcement Physique</h3>
            <!-- information sur le sport -->
            <p>Pierre excelle dans la conception de programmes de renforcement musculaire personnalisés. Que vous soyez un débutant cherchant à tonifier votre corps ou un athlète avancé désireux de repousser vos limites, Pierre sait comment vous guider efficacement.</p>
        </li>
        <li>
            <h3>Zumba Énergique</h3>
            <p>Si vous cherchez à vous défouler sur des rythmes exaltants, les cours de Zumba de Pierre sont faits pour vous. La danse, la musique et la bonne humeur sont au rendez-vous, garantissant une expérience de fitness amusante et motivante.</p>
        </li>
        <li>
            <h3>Cardio Intense</h3>
            <p>Pierre comprend l'importance de l'entraînement cardiovasculaire pour la santé globale. Ses séances de cardio sont conçues pour brûler des calories, améliorer votre endurance et renforcer votre cœur.</p>
        </li>
        <li>
            <h3>Pilates Équilibré</h3>
            <p>Le Pilates est une méthode efficace pour renforcer vos muscles profonds et améliorer votre posture. Pierre vous guidera à travers des exercices de Pilates adaptés à votre niveau, favorisant la stabilité et la flexibilité.</p>
        </li>
    </ol>
</section>
<section id="pourquoi-choisir">
    <!-- information sur le coach -->
    <h2>Pourquoi choisir Pierre Gaillard :</h2>
    <ul>
        <!-- liste des informations-->
        <li>Expérience professionnelle solide dans le domaine du coaching sportif.</li>
        <li>Approche personnalisée, adaptée à vos besoins et à votre niveau.</li>
        <li>Motivant et inspirant, Pierre vous encouragera à donner le meilleur de vous-même.</li>
        <li>Un mélange varié de disciplines pour rendre votre expérience sportive captivante.</li>
        <li>Compréhension approfondie de la physiologie du corps humain grâce à ses études en STAPS.</li>
    </ul>
</section>
</body>
</html>