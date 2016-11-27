<?php 
include_once('model/class.Restaurant.php');
include_once('model/class.ClosedOn.php');
$restaurant = new Restaurant($db);
$closedon = new ClosedOn($db);

include("afternew_estab.php");  
	
if (!isset($_POST['pricerange']) || empty($_POST['pricerange'])) {
    $error[] = "Indice de prix non valide (> 0).";
}
if (!isset($_POST['banquetcapacity']) || empty($_POST['banquetcapacity'])) {
    $error[] = "Places banquet non valide (> 0).";
}

if (empty($error)) {
    $pricerange = htmlspecialchars($_POST['pricerange']);
    $banquetcapacity = htmlspecialchars($_POST['banquetcapacity']);
    $takeaway = 0;
    $delivery = 0;

    if (isset($_POST['takeaway'])) { //1 = coché. 0 = pas coché.
    	$takeaway = 1;
	}
	if (isset($_POST['delivery'])) {
    	$delivery = 1;
    }

    if (isset($_GET['estabID'])) { //=EDIT
        $restaurant->editRestaurant($_GET['estabID'], "mrpopovitchsecret", $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $pricerange, $takeaway, $delivery, $banquetcapacity); 
    }
	if ($restaurant->existPK($name, $adstreet, $adnum, $adzip, $adcity)) {
		$error[] = "Établissement déjà enregistré";
	}
	else {
        if (!isset($_GET['estabID'])) {
           $estabID = $restaurant->addRestaurant($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $_SESSION['nickname'], $pricerange, $takeaway, $delivery, $banquetcapacity);
        }
        else {
            $estabID = $_GET['estabID'];
            $restaurant->editRestaurant($_GET['estabID'], $name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $pricerange, $takeaway, $delivery, $banquetcapacity);
            $closedon->removeClosedOn($_GET['estabID']); //on peut pas editer !
        }
        $addedRest = $restaurant->getRestaurant($estabID);

        if (isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $file=$_FILES['pic'];
            $picname = 'view/uploads/estab_' . $estabID;

            include("controller/security/faille-upload.php");

            if (empty($error)) {
                $restaurant->editPic($estabID, $picname); //edit la pic si upload.
            }
        }

        addDayHour($closedon, $addedRest, 0, 'lun_am', 'lun_pm');
        addDayHour($closedon, $addedRest, 1, 'mar_am', 'mar_pm');
        addDayHour($closedon, $addedRest, 2, 'mer_am', 'mer_pm');
        addDayHour($closedon, $addedRest, 3, 'jeu_am', 'jeu_pm');
        addDayHour($closedon, $addedRest, 4, 'ven_am', 'ven_pm');
        addDayHour($closedon, $addedRest, 5, 'sam_am', 'sam_pm');
        addDayHour($closedon, $addedRest, 6, 'dim_am', 'dim_pm');
        
        if (!isset($_GET['estabID'])) {
            redirect('restaurants.php');
        }
        else {
            redirect('fiche-etabl.php?estabID=' . $_GET['estabID']); 
        }
    }
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
        if (!isset($_GET['estabID'])) {
        redirect('new-restaurant.php');
    }
    else {
        redirect('fiche-etabl.php?estabID=' . $_GET['estabID']); 
    }
}

function addDayHour($closedon, $addedRest, $day, $day_am, $day_pm) {
    $hour_am = 0; $hour_pm = 0;
    if (isset($_POST[$day_am])) {//0 = coché.
        $hour_am = 1;
    }
    if (isset($_POST[$day_pm])) {
        $hour_pm = 1;
    }
    if ($hour_am == 1 || $hour_pm == 1) {
        if ($hour_am == 1 && $hour_pm == 1) {
            $hour = 0;
        }
        else {
            if ($hour_am == 1) {
                $hour = 'am';
            }
            else {
                $hour = 'pm';
            }
        }
        $closedon->addClosedOn($addedRest['RestID'], $addedRest['EstabID'], $day, $hour);
    }
}