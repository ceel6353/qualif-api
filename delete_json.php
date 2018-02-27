
<head>
<link href="css.css" rel="stylesheet" type="text/css" media="all">
<head>

<?php
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}

 //parametres
 $dir="json";//le repertoire

 $exten=array("postman_collection");//les extensien autorisés
 $wid="70";//le width du miniature
 $hei="70";//le height du miniature
 $nbr_ligne=5;//nombre des miniatures par ligne
 $l_supp="supprimer.png";//lien de l'images de suppression
 $couleur="black";//couleur du bordure

 if(isset($_GET['delete']))
 	if(strpos($_GET['delete'],'/')===false)
 		if(file_exists($dir.'/'.$_GET['delete']))
 			unlink($dir.'/'.$_GET['delete']);

 //affichage du contenu du dossier
 if(isset($_GET['aff']))
 {
	 echo '<center><a href="index.php">Retour home</a></center><br>';
	 $dossier=opendir($dir);
	 $dd=array();
	 $i=0;
	 while (false !== ($file = readdir($dossier)))
	 {
		 $ff=explode(".",$file);
		 $ff=$ff[sizeof($ff)-1];
		 if(in_array($ff,$exten))
		 {
		 	$dd[$i]= date ("d F Y H:i:s.",filectime($dir."/".$file))."/%/".$file;
			 $i++;
		 }
	
	 }
	 rsort($dd);
	 echo '<table width="90%" align="center">';
	 for($j=0;$j<sizeof($dd);$j++)
	 {
	 	if($j==0)
	 	echo'<tr align="center">';
	 	if($j!=0&&$j%$nbr_ligne==0)
	 		echo'</tr><tr align="center">';
	 	$lien=explode("/%/",$dd[$j]);
	 	echo'<td style="border:solid thin '.$couleur.'" align="center"><a href="'.$dir."/".$lien[1].'">'.$lien[1].'<br><br><a href="#" onclick="supp_im(\''.$lien[1].'\')"><img src="'.$l_supp.'" border="0"></td>';
	 }
	 echo '</tr></table>';
	 }

 else
 {
 //uploader une image

 	echo '<center><a href="delete_json.php?aff">Afficher les fichiers</a></center><br>';
 ?>

 <form name="uplo" action="delete_json.php" method="post" enctype="multipart/form-data">
 <table width="60%" align="center"><tr align="center"><td width="10%">File:</td><td width="70%"><input type="file" name="fichier"/></td><td width="20%"><input type="submit" value="Envoyer" name="upload"/></td></table>
 </form>

 <?php
}
?>
<script language="javascript">
function supp_im(a)
{
	if(confirm("Etes vous sur de supprimer ce fichier ?")==true)
	top.document.location="delete_json.php?aff&delete="+a;
}
</script>
