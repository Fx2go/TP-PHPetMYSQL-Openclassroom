<!DOCTYPE HTML>
<html>
	<head>
		<title>Blog Accueil</title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <link href="https://fonts.googleapis.com/css?family=Geo|Dosis" rel="stylesheet" type="text/css" >
        <script src="https://use.fontawesome.com/3a7f9ca103.js"></script>

        <link rel="stylesheet" href="style.css" />

	</head>
	<body>
	<a href="."><h1> <i class="fa fa-bullhorn" aria-hidden="true"></i> Blog &amp; Coms</h1></a>

	<?php
// On va chercher dans la base les articles
	include ('connection_BDD.php');
	//on prepare la requete

	 $req = $bdd->query("SELECT id,titre,SUBSTRING(contenu,1,200) AS intro, DATE_FORMAT(date_creation, 'Le %d/%m/%Y à %Hh %imin %ss') AS date_formatee FROM billets ORDER BY id  DESC ");

	//On affiche les billets du plus récent au plus ancien
	while ($data = $req->fetch())
	{
		 //on définit le lien vers le billet entier pour l'utiliser 2 fois après.
		 $lien_article="billet.php?id=".htmlspecialchars($data['id']);
		 //on découpe proprement l'extrait après 30 mots
		 $data['intro']=htmlspecialchars($data['intro']);
		 $decoupe_au_mot=implode(' ',array_slice(explode(' ',$data['intro']), 0, 32));
		 //on affiche chaque titre et extrait de billet
		?>
			<div .news>
			<a href="<?php echo $lien_article;?>">
				<h3><?php echo htmlspecialchars($data['titre']);?>
					<br/><span><?php echo htmlspecialchars($data['date_formatee']);?>		</span>
				</h3>
			</h3></a>
			<p .news>
				<?php echo $decoupe_au_mot;?>
				...
			<a href="<?php echo $lien_article;?>">
			[Lire la suite]</a>	

			</p>
			</div>
		

	<?php
	}
	//On ferme le traitement de la requête
	$req->closeCursor();


	
	?>
	
	</body>
</html>
