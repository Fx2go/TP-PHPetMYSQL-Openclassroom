<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <link rel="stylesheet" href="style.css" />
	</head>
	<body>
	<h1> Blog & Coms</h1>

	<p>Derniers billets du blog</p>
	<?php
// On va chercher dans la base les articles
	include ('connection_BDD.php');
	//on prepare la requete

	 $req = $bdd->query("SELECT id,titre,SUBSTRING(contenu,1,200) AS intro, DATE_FORMAT(date_creation, 'Le %d/%m/%Y à %Hh %imin %ss') AS date_formatee FROM billets ORDER BY id  DESC ");
	
	//On affiche les billets du plus récent au plus ancien
	while ($data = $req->fetch())
	{
		?>
			<div .news>
			<a href="billet.php/?id=
				<?php echo $data['id'];?>
			">
			<h3>
				<?php echo $data['titre'];?>		
			</h3></a>
			<p .news>
				<?php echo $data['intro'];?>
				...<br/>
			<a href="billet.php/?id=
				<?php echo $data['id'];?>
			">
			Lire la suite</a>	

			</p>
			</div>
		

	<?php
	}
	//On ferme le traitement de la requête
	$req->closeCursor();


	
	?>
	
	</body>
</html>