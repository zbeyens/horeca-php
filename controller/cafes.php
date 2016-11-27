<?php 
include_once('model/class.Cafe.php');
include_once('model/class.Admin.php');
$user = new Admin($db);
$cafe = new Cafe($db);

/* prendre toutes les infos des estab */
$coffees = $cafe->getCafes();
if (isset($_SESSION['userID'])) {
	$isAdmin = $user->existAdmin($_SESSION['userID']);
}

$estab = "cafe";
include("view/estabs.php");