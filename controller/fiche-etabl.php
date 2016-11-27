<?php 
include_once('model/class.Cafe.php');
include_once('model/class.Hotel.php');
include_once('model/class.Restaurant.php');
include_once('model/class.ClosedOn.php');
include_once('model/class.Tag.php');
include_once('model/class.Comment.php');
include_once('model/class.Thumbs.php');
include_once('model/class.Admin.php');
$admin = new Admin($db);
$thumbs = new Thumbs($db);
$comment = new Comment($db);
$tag = new Tag($db);
$cafe = new Cafe($db);
$hotel = new Hotel($db);
$restaurant = new Restaurant($db);
$closedon = new ClosedOn($db);

/* prendre toutes les infos d'un estab */

$ficheTag = $tag->getDisTags($_GET['estabID']);
$ficheComment = $comment->getComments($_GET['estabID']);
$meanComment = $comment->getMeanComment($_GET['estabID']);

if (isset($_SESSION['userID'])) {
	$isAdmin = $admin->existAdmin($_SESSION['userID']);
}
else {
	$isAdmin = false;
}

if ($ficheEstab = $cafe->getCafe($_GET['estabID'])) {
    $estab = "cafe";
}
else if ($ficheEstab = $restaurant->getRestaurant($_GET['estabID'])) {
	$ficheClosedOn = $closedon->getClosedOn($_GET['estabID']);

	$days = array(0, 0, 0, 0, 0, 0, 0);
	foreach ($ficheClosedOn as $closeday) {
		for ($i=0; $i<7; $i++) {
			if ($closeday['Day'] == $i)  {
				$days[$i] = $closeday;
			}
		}
	}

	$estab = "restaurant";
}
else if ($ficheEstab = $hotel->getHotel($_GET['estabID'])) {
	$estab = "hotel";
}
else {
	$error[] = "Erreur.";
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    redirect('rechercher.php'); //home
}

include("view/fiche-etabl.php");