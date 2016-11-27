<?php 
include_once('model/class.Hotel.php');
$hotel = new Hotel($db);

/* Delete hotel */
if (isset($_POST['delete'])) {
	$hotel->removeEstab($_GET['estabID']);
	redirect("hotels.php");
}
else if (isset($_POST['edit'])) {
	$festab = $hotel->getHotel($_GET['estabID']);
	include("view/new-hotel.php");
}
else {
     $error[] = "Erreur.";
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    redirect('hotels.php');
}