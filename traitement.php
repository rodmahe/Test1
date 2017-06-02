<pre>

<?php
	//print_r($_FILES);
	print_r($_FILES['fichier']);
?>

</pre>

<?php
	//1 Ko = 1024 octets
	//1 Mo =1048576 octets
	//1 Go = 1 073 741 824 octets
	//1 To = 1 099 511 627 776 octets
	$maxfilesize = 1048576; //1 Mo

	if($_FILES['fichier']['error'] === 0 AND $_FILES['fichier']['size'] < $maxfilesize){

		//pas d'erreur et le fichier n'est pas trop volumineux

		//on teste l'extension

		$extensions_autorisees = array('jpg', 'jpeg', 'png', 'gif');

		$fileInfo = pathinfo($_FILES['fichier']['name']);

		$extension = $fileInfo['extension'];

		if(in_array($extension, $extensions_autorisees)){
			//extension valide
			echo 'c\'est bon';
            //transférer définitivement le fichier sur le serveur
            $nom = md5(uniqid(rand(), true));
            move_uploaded_file($_FILES['fichier']['tmp_name'], $_FILES['fichier']['name']);
            //création d'un fichier log
            $contenu= 'date :' .date('Y-m-d') . '-- taille : ' . $_FILES['fichier']['size'] . ' -- nom : ' . $nom .'.' .$extension;
            $transferImg= file_put_contents('log-' .$nom. '.txt', $contenu);
		}
		else{
			//extension non autorisée
			echo 'pas bonne extension';
		}
	}
	else{//problème:
		if($_FILES['fichier']['error'] > 0){
			//erreur lors du transfert
			echo 'erreur de transfert';
		}
		else{
			//fichier trop volumineux
			echo 'fichier trop gros';
		}
		echo 'c\'est pas bon';
	}


	//pour tester l'extension du fichier

	$fileInfo = pathinfo($_FILES['fichier']['name']);
	print_r($fileInfo);

?>