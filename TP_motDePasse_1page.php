<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
     <head>
          <title>TP form & Page protégée par mot de passe : 1 seule page</title>
          <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
     </head>
     <body>

     <?php

     $mdp= 'kangourou';

     //Si le mot de passe a été renseigné ET si il est correct....
     if (isset($_POST['motdepasse']) AND $_POST['motdepasse']==$mdp)

     //.. alors, on affiche les codes
      {

      echo 'Votre mot de passe est correct. <br/> Voici les codes : <br/>';
                    //on génère des codes ...j'ai choisi des anagrammes du mdp pour le fun
                    for ($i=0;$i<10;$i++)
                    {
                         $code=strtoupper(str_shuffle($mdp));
                         $numero=$i+1;
                         echo'Code n° '.$numero." = ".$code."<br/>";
                    }
      }


     //.. SI NON, on affiche le formulaire
     elseif (isset($_POST['motdepasse']) AND $_POST['motdepasse']!=$mdp)
     { ?>
      <h1> Désolé, ce n'est pas le bon mot de passe</h1>
      <form method="post" action="TP_motDePasse_1page.php">
          <p>
               Essaye encore :
          <input type="password" name="motdepasse" label="Mot de passe"></input>
          <input type="submit" name="envoyer"></input>
          </p>
     </form>

     <?php 
      } //fermeture du ELSEIF
     else {

     ?>

     <form method="post" action="TP_motDePasse_1page.php">
          
               <h1>Veuillez entrer le mot de passe pour accéder à la page secrète</h1>
           <p> 
          <input type="password" name="motdepasse" label="Mot de passe"></input>
          <input type="submit" name="envoyer"></input>
          </p>
     </form>

     <?php
          } //fermeture du ELSE
     ?>

     </body>
</html>
