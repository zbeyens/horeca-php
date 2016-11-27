<?php 
include_once('model/class.Admin.php');
include_once('model/class.Tag.php');
include_once('model/class.Comment.php');
$comment = new Comment($db);
$tag = new Tag($db);
$user = new Admin($db);

/* prendre toutes les infos des membres + tags + commentaires*/
if (isset($_GET['userID'])) {
	$ficheMembre = $user->getMembre($_GET['userID']);
	$ficheTag = $tag->getTagsMembre($_GET['userID']);
	$counterTag = $tag->getNumberTag($_GET['userID']);
	$ficheComment = $comment->getMembreComments($_GET['userID']);
	$counterComment = $comment->getNumberComment($_GET['userID']);
	if (isset($_SESSION['userID'])) {
		$meAdmin = $user->existAdmin($_SESSION['userID']);
	}
	$isAdmin = $user->existAdmin($_GET['userID']);
}
else {
	$error[] = "Erreur.";
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    redirect('membres.php');
}

include("view/fiche-membre.php");