<div class="titre">
	<a href="<?php echo $lien_article;?>">
		<h3><?php echo htmlspecialchars($data['titre']);?></h3>
	</a>
	<span>
		<?php echo htmlspecialchars($data['date_formatee']);?>
	</span>

	<div class="edition">
		<ul class="edition">
			<li><a href="./admin/ajouter.php" title="Ajouter un nouveau billet"><i class="fa fa-plus-square" aria-hidden="true"></i></a></li>
			<li><a href="./admin/modifier.php" title="Modifier ce billet"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
			<li><a href="./admin/supprimer.php" onclick="return confirm('&Ecirc;tes-vous sûr de vouloir supprimer ce magnifique Billet ? (Il sera perdu à jamais) ')" title="Supprimer ce billet !"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
		</ul>
	</div>

</div>
