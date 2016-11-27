<?php 
include_once('model/class.Cafe.php');
$cafe = new Cafe($db);

/* Delete hotel */
if (isset($_POST['delete'])) {
	$cafe->removeEstab($_GET['estabID']);

	redirect("cafes.php");
}
else if (isset($_POST['edit'])) {
	$festab = $cafe->getCafe($_GET['estabID']);
	include("view/new-cafe.php");
}
else {
     $error[] = "Erreur.";
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    redirect('cafes.php');
}