<?php

//On récupère les variables du pseudo et message envoyées par POST
//et on élimine d'éventuelles balises html
$pseudo=strip_tags($_POST['pseudo']);
$message=strip_tags($_POST['message']);

// On stock le pseudo dans un cookie
setcookie('pseudo', $pseudo, time() + 365*24*3600);

//On stock les variables en base de données
	//On se connecte à la base de données
	include ('minichat_connection_BDD.php');
	// On execute la requete pour stocker les variables


	$req = $bdd->prepare('INSERT INTO minichat(pseudo,message) VALUES(:pseudo,:message)');

	$req->execute(array('pseudo'=>$pseudo, 'message'=> $message));

//On retourne sur la page principale
	header('Location: minichat.php');
?>