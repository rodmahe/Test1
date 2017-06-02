<!DOCTYPE html>
<html>
<head>
    
    <title></title>
</head>
<body>
       
       
<!--- formulaire d'envoi de fichiers
rajouter enctype="multipart/form-data"
method="POST" obligatoire
-->
      
<form method="post" action="traitement.php" enctype="multipart/form-data">
    <input type="file" name="fichier">
    <button type="submit">Envoyer</button>
</form>
       
       
</body>
    
    
</html>