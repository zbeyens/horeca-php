<?php 
include_once('model/class.Restaurant.php');
include_once('model/class.Admin.php');
$user = new Admin($db);
$restaurant = new Restaurant($db);

/* prendre toutes les infos des estab */
$restos = $restaurant->getRestaurants();
if (isset($_SESSION['userID'])) {
	$isAdmin = $user->existAdmin($_SESSION['userID']);
}

$estab = "restaurant";
include("view/estabs.php");