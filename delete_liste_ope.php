<?php ?>
<head>
<link href="css.css" rel="stylesheet" type="text/css" media="all">
<head>

<body>
<div class="form-style-8">
  <h2>Creation du json postman</h2>
<?php

if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}

$nom_file = date('d_m_Y-H_i_s');

// REQUETE SQL POUR LE FICHIER : SELECT DISTINCT id,name,description FROM afi.offer where name like '%TESTAUTO%'

$liste01 = '{
	"id": "c190a72e-1d61-f1f3-4b06-18ad38ed32b8",
	"name": " ##### OPE - DELETE QUALIF AUTO #####",
	"description": "",
	"order": [';
    
$liste02 = '';
	
$liste03 = '],
	"folders": [],
	"folders_order": [],
	"timestamp": 1519131122908,
	"owner": "161663",
	"public": false,
	"requests": [ ';
    
$liste04 = '';

$file = 'offers_liste.txt';
$filebak= 'OPE-offers_liste-' . $nom_file . '.txt';

// SAUVEGARDE FICHIER
if (!copy($file, 'save/' . $filebak)) {
    echo 'La sauvegarde ' . $filebak .' du fichier ' . $file . ' a echouee...\n';
}

// LECTURE DU FICHIER LIGNE PAR LIGNE
$fic=fopen($file, "r"); 
$i=1;

while(!feof($fic)) 
{ 

    $ligne= fgets($fic,1024); 
    $verif = substr($ligne, 0, 16);
    $veriflight = substr($ligne, 0, 12);
    
    $id_postman = 'c1ff327b-7fe2-0d72-dac3-' . $veriflight .'';

    $liste02 .= '"' . $id_postman . '",';
    
    $liste04 .=

        '{
            "id": "' . $id_postman . '",
			"headers": "Content-Type: application/json\nX-OAPI-User-Id: 204\n",
			"headerData": [
				{
					"key": "Content-Type",
					"value": "application/json",
					"description": "",
					"enabled": true
				},
				{
					"key": "X-OAPI-User-Id",
					"value": "204",
					"description": "",
					"enabled": true
				}
			],
			"url": "ope-back-inowope01.itn.intraorange/ope-back/v1/admin/offers/' . $verif . '/delete",
			"queryParams": [],
			"pathVariables": {},
			"pathVariableData": [],
			"preRequestScript": "",
			"method": "DELETE",
			"collectionId": "c190a72e-1d61-f1f3-4b06-18ad38ed32b8",
			"data": [],
			"dataMode": "raw",
			"name": "# OPE - delete offer qualif - SQL QUALIF copy",
			"description": "",
			"descriptionFormat": "html",
			"time": 1519131125776,
			"version": 2,
			"responses": [],
			"tests": "",
			"currentHelper": "normal",
			"helperAttributes": {},
			"isFromCollection": true,
			"collectionRequestId": "c1ff327b-7fe2-0d72-dac3-e86ac93288fb",
			"rawModeData": ""
        },';
            
    	$i ++; 
} 

fclose($fic); 

$liste05 =  ']}';



// CREATION JSON POUR POSTMAN

$monfichier = fopen('json/OPE-qualif-auto-' . $nom_file . '.postman_collection', 'w+'); 
$full_liste = $liste01 . $liste02 . $liste03 . $liste04 . $liste05;
$full_liste = str_replace( ",]" , "]" , $full_liste);
fputs($monfichier, $full_liste);
fclose($monfichier);

echo "<br /><center><b><font color=green>= = = FICHIER JSON OK = = =<br /><br /><a href='json/OPE-qualif-auto-" . $nom_file . ".postman_collection'> qualif-auto-" . $nom_file . ".postman_collection </a></font></b></center>";

?>
<br><br>

<a href='index.php'>Retour home</a><br>
<a href='save' style>Visualiser dossier fichiers txt des offres</a><br>
<a href='json'>Visualiser dossier fichiers json</a>

</div>


<div class="form-style-9">
<center>
<?php
echo $full_liste;
?>
</center>
</div>

</body>
<?php ?>