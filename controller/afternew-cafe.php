<?php 
include_once('model/class.Cafe.php');
$cafe = new Cafe($db);

include("afternew_estab.php");  
	
if (empty($error)) {
    $smoking = 0;
    $snack = 0;

    if (isset($_POST['smoking'])) { //1 = pas coché. 0 = coché.
    	$smoking = 1;
	}
	if (isset($_POST['snack'])) {
    	$snack = 1;
	}

    if (isset($_GET['estabID'])) { //=EDIT
        $cafe->editCafe($_GET['estabID'], "mrpopovitchsecret", $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $smoking, $snack); //POUR !existPK
    }
    
	if ($cafe->existPK($name, $adstreet, $adnum, $adzip, $adcity)) {
		$error[] = "Établissement déjà enregistré";
	}
    else {
        if (!isset($_GET['estabID'])) { //NEW : on ajoute l'estab s'il n'existe pas
            $estabID = $cafe->addCafe($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $_SESSION['nickname'], $smoking, $snack);
        }
        else { //EDIT : on edit l'estab
            $estabID = $_GET['estabID'];
            $cafe->editCafe($estabID, $name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $smoking, $snack);
        }

        if (isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $file=$_FILES['pic'];
            $picname = 'view/uploads/estab_' . $estabID;

            include("controller/security/faille-upload.php");

            if (empty($error)) {
                $cafe->editPic($estabID, $picname); //edit la pic si upload.
            }
        } 

        if (!isset($_GET['estabID'])) {
            redirect("cafes.php");
        }
        else {
            redirect('fiche-etabl.php?estabID=' . $_GET['estabID']); 
        }
    }
}
if (!empty($error)) {
    $_SESSION['error'] = $error;
    if (!isset($_GET['estabID'])) {
        redirect('new-cafe.php');
    }
    else {
        redirect('fiche-etabl.php?estabID=' . $_GET['estabID']); 
    }
}

/*
if (isset($_FILES['pic'])) {
    $file=$_FILES['pic'];
    $ext_upl = pathinfo($file['name'], PATHINFO_EXTENSION);
    $ext_ok = array('jpg', 'jpeg', 'gif', 'png');
    if ($file['error'] == 0 && $file['size'] < 50000000 && in_array($ext_upl,$ext_ok)) {
        move_uploaded_file($file['tmp_name'], 'uploads/' . $_POST['nickname']);
    }
}*/