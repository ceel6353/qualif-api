<?php ?>
<head>
<link href="css.css" rel="stylesheet" type="text/css" media="all">
<head>

<body>
<div class="form-style-8">
  <h2>Suppression des offres</h2>
<form method="POST" action="upload_file.php" enctype="multipart/form-data">
     <!-- On limite le fichier à 100Ko -->
     <input type="hidden" name="MAX_FILE_SIZE" value="100000">
     <input type="file" name="avatar" ><br><br>
     <input type="submit" name="envoyer" value="Charger le fichier">
</form>

<br><br>
<a href='delete_txt.php?aff' style>Visualiser dossier fichiers txt des offres</a><br>
<a href='delete_json.php?aff'>Visualiser dossier fichiers json</a>
</div>

<div class="form-style-8">
<center>
v0.3 # 270218
</center>
</div>

</body>
<?php ?>

