<?php ?>
<head>
<link href="css.css" rel="stylesheet" type="text/css" media="all">
<head>

<body>
<div class="form-style-8">
  <h2>Chargement du fichier</h2>
<?php
$alert = false;    
$dossier = '';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.txt');
$extension = strrchr($_FILES['avatar']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type txt ...';
     $alert = true;
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
     $alert = true;
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
          
     $fichier = "offers_liste.txt";
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo '<center><b><font color=green>Fichier ok !</font></b></center>';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo '<center><b><font color=red>Echec de l\'upload !</font></b></center>';
     }
}
else
{
     echo '<center><b><font color=red>' . $erreur . '</font></b></center>';
}

if ( $alert == false ) {
?>
<br><br>
<form method="POST" action="delete_liste.php" enctype="multipart/form-data">  
     <input type="submit" name="envoyer" value="Creation du json postman">
</form>
<?php } ?>

<br><br>

<a href='index.php'>Retour home</a><br>
<a href='save' style>Visualiser dossier fichiers txt des offres</a><br>
<a href='json'>Visualiser dossier fichiers json</a>

</div>
</body>
<?php ?>

