<?php

/*Vérifier la configuration d’Apache afin d’agir en conséquence.
  Ne pas placer le .htaccess dans le répertoire d’upload
  Ne pas permettre l’écrasement de fichier
  Générer un nom aléatoire pour le fichier uploadé et enregistrer le nom dans une base de données. ?
  Ne pas permettre de voir l’index of du répertoire d’upload.
  Assigner les bonnes permissions au répertoire.
  Vérifier le mime-type avec getimagesize() et l’extension du fichier.
*/

// On choisit les extensions autorisées
$ext_ok = array('png', 'jpg', 'jpeg', 'txt', 'gif'); 

// On vérifie l'extension du fichier
if(!in_array(substr(strrchr($_FILES['pic']['name'], '.'), 1), $ext_ok)) {     
	$error[] = "Impossible d'uploader ce type de fichier1";
}

// On récupère l'extension du fichier
$ext_upl = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);

// deuxième vérification d'extension
if (!in_array($ext_upl, $ext_ok)) {
	$error[] = "Impossible d'uploader ce type de fichier2";
}

// On renomme le fichier avec son extension et on l'enregistre
if ($file['error'] == 0 && $file['size'] < 50000000 && in_array($ext_upl,$ext_ok) && empty($error)) {
	$var = move_uploaded_file($file['tmp_name'], $picname);
}

// On ouvre le fichier pour voir s'il contient des caractères louches (ne marche pas...)
/*$handle = fopen($picname, 'r');
if ($handle) {
    while (!feof($handle) AND empty($error)) {
        $buffer = fgets($handle);
        switch (true) {
	        case strstr($buffer,'<'):
	                $error[] = "Impossible d'uploader ce type de fichier3";
	        break;
	        case strstr($buffer,'>'):
	                $error[] = "Impossible d'uploader ce type de fichier4";
	        break;
	        case strstr($buffer,';'):
	                $error[] = "Impossible d'uploader ce type de fichier5";
	        break;
	        case strstr($buffer,'&'):
	                $error[] = "Impossible d'uploader ce type de fichier6";
	        break;
	        case strstr($buffer,'?'):
	                $error[] = "Impossible d'uploader ce type de fichier7";
	        break;
        }
    }
    
    fclose($handle);
    
	// Si on a trouvé des caractères suspescts, on supprime le fichier par sécurité
	if (!empty($error)) {
		if (file_exists ($picname)) {
	    	@unlink( $picname );
		}
	}
}*/

?>