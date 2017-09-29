<?php
if (isset ($_GET['id']))
	{
		$id_billet=strip_tags($_GET['id']);
	}
else
{//On retourne sur la page principale
	header('Location: index.php');
}

include ('connection_BDD.php');


	 $req = $bdd->prepare("SELECT titre,contenu, DATE_FORMAT(date_creation, 'Le %d/%m/%Y à %Hh %imin') AS date_formatee FROM billets WHERE id= :id_billet");
	 
	$req->bindParam(':id_billet', $id_billet);
	$req->execute();
	while ($data = $req->fetch())
	{
			
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo htmlspecialchars($data['titre']) ?></title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <link href="https://fonts.googleapis.com/css?family=Geo|Dosis" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="style.css" />
        <script src="https://use.fontawesome.com/3a7f9ca103.js"></script>
	</head>
	<body>
	<?php include('header.php');?>
<div .news>
			
	<?php include('titre_billet.php');?>

	<p .news>
		<?php echo htmlspecialchars($data['contenu']);?>
		
	</p>
</div>
<?php
}
	//On ferme le traitement de la requête
	$req->closeCursor();
?>

<div.commentaires>
	<h4><i class="fa fa-commenting-o" aria-hidden="true"></i> Commentaires</h4>

<?php
		$req = $bdd->prepare("SELECT id,id_billet,nom_auteur,commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y à %Hh %imin') AS date_formatee FROM commentaires WHERE id_billet= :id_billet ORDER BY id ");
	// $req->execute(array('id_billet'=>$id_billet));
	 
	$req->bindParam(':id_billet', $id_billet);
	$req->execute();

	while ($data = $req->fetch())
	{ 
			echo'<p>';
			echo'<strong>'.htmlspecialchars($data['nom_auteur']).'</strong>, le '.htmlspecialchars($data['date_formatee']);
			echo' :" '.htmlspecialchars($data['commentaire']);
			echo' "</p>';
	}
?>


</div>

		

<?php

	//On ferme le traitement de la requête
	$req->closeCursor();
?>
	</body>
</html>
