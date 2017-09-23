<!DOCTYPE HTML>
<html>
	<head>
		<title>TP Minichat</title>
        <meta charset="utf-8">
        <meta name="description" content="Réalisation du TP mini-chat proposé sur la page https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/tp-un-mini-chat">
	</head>
	<body>
<!--Formulaire -->
		<form method="post" action="minichat_post.php">
			<p>	
<!--Champ "Pseudo"-->
				Pseudo :
				<input type="text" name="pseudo" ></input><br/>
<!--Champ "Message"-->
				Message :
				<input type="text" name="message" ></input><br/>

<!--Boutton "Envoyer"-->
				<input type="submit" name="Envoyer">
			</p>
		</form>

<a href="minichat.php">Rafraichir</a><br/>
<p>
<?php
// Liste des messages ,du plus récent au plus ancien
	// On va chercher dans la base minichat les messages
	include ('minichat_connection_BDD.php');
	$req = $bdd->query('SELECT * FROM minichat ORDER BY id DESC');
	//On affiche les enregistrements du plus récent au plus ancien
	while ($data = $req->fetch())
	{
		echo '<strong>'.$data['pseudo'] .' </strong>: '.$data['message']. '<br />';
	}
	//On ferme le traitement de la requête
	$req->closeCursor();
?>
	</p>
	</body>
</html>