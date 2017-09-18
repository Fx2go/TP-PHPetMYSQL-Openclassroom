<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
     <head>
          <title>Formulaire du TP Page protégée par mot de passe</title>
          <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
     </head>
     <body>

    <?php
      $mdp= 'kangourou';
      // on récupère le mot de passe en vérifiant qu'il soit renseigné
       if (isset($_POST['motdepasse']))
        {
        	// Si le mot de passe est correct...
           if ($_POST['motdepasse']==$mdp)
               // ... on affiche le contenu 
              {
              	echo 'Votre mot de passe est correct. <br/> ';
              	echo 'Voici les codes : <br/>';
              	//on génère des codes ...j'ai choisi des anagrammes du mdp pour le fun
              	for ($i=0;$i<10;$i++)
              	{
              		$code=strtoupper(str_shuffle($mdp));
              		$numero=$i+1;
              		echo'Code n° '.$numero." = ".$code."<br/>";
              	}
              }
        

             //... si non , message d'erreur et invitation à retourner sur la page du formulaire
             else {
               echo 'Désolé le code que vous avez entré est incorrect, cliquez <a href="formulaire_TP_motDePasse.php">ici</a> pour retourner au formulaire';
             }

     }   
        

    ?> 

     </body>
</html>