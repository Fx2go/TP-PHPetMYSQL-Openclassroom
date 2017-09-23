<?php

//On récupère les variables du pseudo et message envoyées par POST
//et on élimine d'éventuelles balises html
$pseudo=strip_tags($_POST['pseudo']);
$message=strip_tags($_POST['message']);

	//(On affiche les variables pour tester)
	//echo $pseudo.'<br>';
	//echo $message;

//On stock les variables en base de données
	//On se connecte à la base de données
	include ('minichat_connection_BDD.php');
	// On execute la requete pour stocker les variables
	//$bdd->exec('INSERT INTO minichat(pseudo,message) VALUES(\'$pseudo\', \'$message\')');

	$req = $bdd->prepare('INSERT INTO minichat(pseudo,message) VALUES(:pseudo,:message)');

	$req->execute(array('pseudo'=>$pseudo, 'message'=> $message));

//On retourne sur la page principale

?>