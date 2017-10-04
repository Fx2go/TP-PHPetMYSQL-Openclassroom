<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{

	die('Erreur : ' . $e->getMessage());
}


$reponse = $bdd->query('SELECT SUM(prix) AS montant_total, possesseur FROM jeux_video GROUP BY possesseur');

echo'<h2>Montant des jeux en possession de chacun</h2>';

while ($donnees = $reponse->fetch())
{
  echo $donnees['possesseur'] .' = '.$donnees['montant_total'].' € <br />';
}

$reponse->closeCursor();

 ?>  
