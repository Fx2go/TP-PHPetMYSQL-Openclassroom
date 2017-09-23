<?php

//On récupère les variables du pseudo et message envoyées par POST
$pseudo=$_POST['pseudo'];
$message=$_POST['message'];

	//(On affiche les variables pour tester)
echo $pseudo.'<br>';
echo $message;
//On élimine d'éventuelles balises html

//On stock les variables en base de données
	//On se connecte à la base de données
//On retourne sur la page principale

?>