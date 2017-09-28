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


	 $req = $bdd->prepare("SELECT titre,contenu, DATE_FORMAT(date_creation, 'Le %d/%m/%Y à %Hh %imin %ss') AS date_formatee FROM billets WHERE id= :id_billet");
	 
	$req->bindParam(':id_billet', $id_billet);
	$req->execute();
	while ($data = $req->fetch())
	{
			
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $data['titre'] ?></title>
        <meta charset="utf-8">
        <meta name="description" content="">
	</head>
	<body>
<!-- -->
<div .news>
			
	<h3>
		<?php echo $data['titre'];?>		
	</h3>
	<p .news>
		<?php echo $data['contenu'];?>
		
	</p>
</div>
	</body>
</html>
