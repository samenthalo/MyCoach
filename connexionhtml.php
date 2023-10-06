<!DOCTYPE html>
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Séances - MyCoach</title>
  <link rel="stylesheet" type="text/css" href="styles/connexion.css">
</head>
<body>

  <div class="conteneur">
        <!-- création de la barre de navigation -->
        <ul class="menu">
            <h1 class="nom">Pierre Gaillard</h1>
            <img class="photo" src="pierre_gaillard.jpg" width="100px" height="120px" alt="Photo de Pierre Gaillard">
            <li><a href="accueil.html">Accueil</a></li>
            <li><a href="inscriptionhtml.php">Inscription</a></li>

        </ul>
    </div>
	<?php include("includes/connexion.php");
	include("includes/connexion_utilisateur.php");
?>
<div class="form-container" id="inscription-form">
	<p class="title">Connexion</p>
	<form class="form" action="" method="POST">
		<div class="input-group">
			<label for="mail">Mail</label>
			<input type="text" name="mail" id="username" placeholder="">
		</div>
		<div class="input-group">
			<label for="password">Mot de passe</label>
			<input type="password" name="mdp" id="password" placeholder="">
			<div class="forgot">
				<a rel="noopener noreferrer" href="resetpassword.php">Mot de passe oublié ?</a>
			</div>
		</div>
	<label class="switch" style="">
      <input type="checkbox" id="showPassword">
      <span class="slider">
        <svg class="slider-icon" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation"><path fill="none" d="m4 16.5 8 8 16-16"></path></svg> 
        <span class="slider-text">Voir mon mot de passe</span>
      </span>
    </label>
		<button class="sign">Connexion</button>
	</form>
	<div class="social-message">
		<div class="line"></div>
		<div class="line"></div>
	</div>
	<div class="social-icons">
		</button>
		
		</button>
<script>
// Fonction de vérification du formulaire avant la soumission
function checkForm(event) {
  // Récupérer les valeurs des champs
  var mail = document.getElementById('username').value; // Utilisez 'username' au lieu de 'mail'
  var password = document.getElementById('password').value;

  // Vérifier si les champs obligatoires sont vides
  if (mail === '' || password === '') { // Utilisez 'mail' au lieu de 'username'
    // Afficher un message d'erreur
    alert('Veuillez remplir tous les champs obligatoires.');

    // Empêcher l'envoi du formulaire
    event.preventDefault();
  }
}
  // Écouter l'événement de soumission du formulaire
  var form = document.getElementById('inscription-form');
  form.addEventListener('submit', checkForm);


  const showPasswordCheckbox = document.getElementById('showPassword');
  const passwordInput = document.getElementById('password');

  showPasswordCheckbox.addEventListener('change', function() {
    if (this.checked) {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
    }
  });
</script>
</body>
</html>