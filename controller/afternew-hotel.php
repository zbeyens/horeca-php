<?php 
include_once('model/class.Hotel.php');
$hotel = new Hotel($db);


if (!isset($_POST['stars']) || $_POST['stars'] > 5) { //test 0
    $error[] = "Nombre d'étoiles non valide (entre 0 et 5).";
}
if (!isset($_POST['bedrooms']) || empty($_POST['bedrooms'])) {
    $error[] = "Nombre de chambres non valide (> 0).";
}
if (!isset($_POST['prizedoubleroom']) || empty($_POST['prizedoubleroom'])) {
    $error[] = "Prix d'une chambre double non valide (> 0).";
}
include("afternew_estab.php");	

if (empty($error)) {
    $stars = htmlspecialchars($_POST['stars']);
    $bedrooms = htmlspecialchars($_POST['bedrooms']);
    $prizedoubleroom = htmlspecialchars($_POST['prizedoubleroom']);

    if (isset($_GET['estabID'])) { //=EDIT
        $hotel->editHotel($_GET['estabID'], "mrpopovitchsecret", $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $stars, $bedrooms, $prizedoubleroom); //POUR !existPK
    }
	if ($hotel->existPK($name, $adstreet, $adnum, $adzip, $adcity)) {
		$error[] = "Établissement déjà enregistré";
	}
	else {
        if (!isset($_GET['estabID'])) {
           $estabID = $hotel->addHotel($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $_SESSION['nickname'], $stars, $bedrooms, $prizedoubleroom); //pas de pic
        }
        else {
            $estabID = $_GET['estabID'];
            $hotel->editHotel($estabID, $name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $stars, $bedrooms, $prizedoubleroom);
        }

        if (isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $file=$_FILES['pic'];
            $picname = 'view/uploads/estab_' . $estabID;

            include("controller/security/faille-upload.php");

            if (empty($error)) {
                $hotel->editPic($estabID, $picname); //edit la pic si upload.
            }
        }

        if (!isset($_GET['estabID'])) {
            redirect("hotels.php");
        }
        else {
            redirect('fiche-etabl.php?estabID=' . $_GET['estabID']); 
        }
    }
}
if (!empty($error)) {
    $_SESSION['error'] = $error;
    if (!isset($_GET['estabID'])) {
        redirect('new-hotel.php');
    }
    else {
        redirect('fiche-etabl.php?estabID=' . $_GET['estabID']); 
    }
}

/*
        if (!isset($_GET['estabID'])) {
           $estabID = $hotel->addHotel($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $_SESSION['nickname'], $picname, $stars, $bedrooms, $prizedoubleroom); //pas de pic
        }
        else {
            $estabID = $_GET['estabID'];
        }

        if (isset($_FILES['pic'])) {
            $file=$_FILES['pic'];
            $ext_upl = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ext_ok = array('jpg', 'jpeg', 'gif', 'png');
            $picname = 'view/uploads/estab_' . $estabID;
            if ($file['error'] == 0 && $file['size'] < 50000000 && in_array($ext_upl,$ext_ok)) {
                move_uploaded_file($file['tmp_name'], $picname);
            }
        }
        $hotel->editHotel($estabID, $name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $picname, $stars, $bedrooms, $prizedoubleroom);

}*/