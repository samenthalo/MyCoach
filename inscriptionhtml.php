<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Séances - MyCoach</title>
  <link rel="stylesheet" type="text/css" href="styles/inscription.css">
</head>
<body>

  <div class="conteneur">
        <!-- création de la barre de navigation -->
        <ul class="menu">
            <h1 class="nom">Pierre Gaillard</h1>
            <img class="photo" src="pierre_gaillard.jpg" width="100px" height="120px" alt="Photo de Pierre Gaillard">
            <li><a href="accueil.php">Accueil</a></li>
            <li><a href="connexionhtml.php">Connexion</a></li>

        </ul>
    </div>
<?php include("includes/inscription.php"); ?>
<div class="form-box" id="inscription-form">
  <form class="form" action="" method="POST">
    <span class="title">Inscription</span>
    <span class="subtitle">Créez un compte gratuit avec votre email.</span>
    <div class="form-container">
      <input type="text" name="nom" id="nom" class="input" placeholder="Nom">
      <input type="text" name="prenom" id="prenom" class="input" placeholder="Prénom">
      <input type="email" name="mail" id="mail" class="input" placeholder="Email">
      <input type="password" name="mdp" id="mdp" class="input" placeholder="Mot de passe" id="password">
    </div>
    <label class="switch" >
      <input type="checkbox" id="showPassword">
      <span class="slider">
        <svg class="slider-icon" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation"><path fill="none" d="m4 16.5 8 8 16-16"></path></svg> 
        <span class="slider-text">Voir mon mot de passe</span>
      </span>
    </label>
    <button name="inscription">Inscription</button>
  </form>
  <div class="form-section">
    <p>Vous avez un compte ? <a href="connexionhtml.php">Connexion</a></p>
  </div>
</div>

<script>
var emailInput = document.getElementById('mail');
emailInput.addEventListener('change', function() {
  this.value = this.value.toLowerCase();
});

const showPasswordCheckbox = document.getElementById('showPassword');
const passwordInput = document.getElementById('mdp');

showPasswordCheckbox.addEventListener('change', function() {
  if (this.checked) {
    passwordInput.type = 'text';
  } else {
    passwordInput.type = 'password';
  }
});

// Fonction de vérification du formulaire avant la soumission
function checkForm(event) {
  // Récupérer les valeurs des champs
  var nom = document.getElementById('nom').value;
  var prenom = document.getElementById('prenom').value;
  var email = document.getElementById('mail').value;
  var mdp = document.getElementById('mdp').value;

  // Vérifier si les champs obligatoires sont vides
  if (nom === '' || prenom === '' || email === '' || mdp === '') {
    // Afficher un message d'erreur
    alert('Veuillez remplir tous les champs obligatoires.');

    // Empêcher l'envoi du formulaire
    event.preventDefault();
  }

  // Vérifier la longueur minimale du mot de passe
  if (mdp.length < 8) {
    // Afficher un message d'erreur
    alert('Le mot de passe doit contenir au moins 8 caractères.');

    // Empêcher l'envoi du formulaire
    event.preventDefault();
  }
}

// Écouter l'événement de soumission du formulaire
var form = document.getElementById('inscription-form');
form.addEventListener('submit', checkForm);

</script>
</body>
</html>
