<?php 
include_once('model/class.Hotel.php');
include_once('model/class.Admin.php');
$user = new Admin($db);
$hotel = new Hotel($db);

/* prendre toutes les infos des estab */
$hots = $hotel->getHotels();
if (isset($_SESSION['userID'])) {
	$isAdmin = $user->existAdmin($_SESSION['userID']);
}

$estab = "hotel";
include("view/estabs.php");