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
				<input type="text" name="pseudo" value="<?php if(isset($_COOKIE['pseudo'])){echo $_COOKIE['pseudo'];} ?>"></input><br/>
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
<!-- afficher des liens vers les messages plus anciens-->
	<ul>
		<?php
		//On compte de nombre de messages
		$req=$bdd->query('SELECT COUNT(*) FROM minichat');
		$QteMessages = $req->fetch();

		// On calcule le nombre de page (maximum 10 messages par page)
		$QtePages= ceil($QteMessages[0]/10);

		// On affiche autant de liens qu'il y a de pages
		for ($i=1;$i<=$QtePages;$i++)
		{
		echo'<li><a href="/?page='.$i.'">Page '.$i.'</a></li>';
		}
		?>
	</ul>
	</body>
</html>