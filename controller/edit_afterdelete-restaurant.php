<?php 
include_once('model/class.Restaurant.php');
include_once('model/class.ClosedOn.php');
$restaurant = new Restaurant($db);
$closedon = new ClosedOn($db);

/* Delete hotel */
if (isset($_POST['delete'])) {
	$restaurant->removeEstab($_GET['estabID']);
	redirect("restaurants.php");
}
else if (isset($_POST['edit'])) {
	$festab = $restaurant->getRestaurant($_GET['estabID']);
	include("view/new-restaurant.php");
}
else {
     $error[] = "Erreur.";
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    redirect('restaurants.php');
}