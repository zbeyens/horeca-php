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
$establishment = new Establishment($db);

if (isset($_POST['estab'])) {
	$search = "etablissements";

	if (isset($_POST['estabname']) && isset($_POST['estabzip']) && isset($_POST['estabtag']) && isset($_POST['estabtag']) && isset($_POST['estabScore']) && isset($_POST['estabUserNb']) && isset($_POST['estabUser']) && isset($_POST['estabMaxComment']) && isset($_POST['estabMinComment'])) {
		$estab = htmlspecialchars($_POST['estab']);
		$estabname = htmlspecialchars($_POST['estabname']);
		$estabcity = htmlspecialchars($_POST['estabcity']);
		$estabzip = htmlspecialchars($_POST['estabzip']);
		$estabtag = htmlspecialchars($_POST['estabtag']);
		$estabScore = htmlspecialchars($_POST['estabScore']);
		$estabUserNb = htmlspecialchars($_POST['estabUserNb']);
		$estabUser = htmlspecialchars($_POST['estabUser']);
		$estabMaxComment = htmlspecialchars($_POST['estabMaxComment']);
		$estabMinComment = htmlspecialchars($_POST['estabMinComment']);

		$estabs = $establishment->requestEstabs($estab, $estabname, $estabcity, $estabzip, $estabtag, $estabScore, $estabUserNb, $estabUser, $estabMaxComment, $estabMinComment);
	}
	else {
		$error[] = "Erreur.";
	}

	if (!empty($error)) {
	    $_SESSION['error'] = $error;
	    redirect('search-estab.php'); //home
	}

	include("view/requests.php");
}
else if (isset($_POST['droits'])) {
	$search = "membres";

	if (isset($_POST['userName']) && isset($_POST['userComment']) && isset($_POST['userScore']) && isset($_POST['userScoreName'])) {
		$droits = htmlspecialchars($_POST['droits']);
		$userName = htmlspecialchars($_POST['userName']);
		$userComment = htmlspecialchars($_POST['userComment']);
		$userScore = htmlspecialchars($_POST['userScore']);
		$userEstabNb = htmlspecialchars($_POST['userEstabNb']);
		$userScoreName = htmlspecialchars($_POST['userScoreName']);

		$users = $admin->requestUsers($droits, $userName, $userComment, $userScore, $userEstabNb, $userScoreName);
	}
	else {
		$error[] = "Erreur.";
	}

	if (!empty($error)) {
	    $_SESSION['error'] = $error;
	    redirect('search-users.php'); //home
	}

	include("view/requests.php");
}
else if (isset($_POST['commentText'])) {
	$search = "commentaires";

	if (isset($_POST['commentScore']) && isset($_POST['commentThumbs'])) {
		$commentText = htmlspecialchars($_POST['commentText']);
		$commentScore = htmlspecialchars($_POST['commentScore']);
		$commentThumbs = htmlspecialchars($_POST['commentThumbs']);

		$comments = $comment->requestComments($commentText, $commentScore, $commentThumbs);
	}
	else {
		$error[] = "Erreur.";
	}

	if (!empty($error)) {
	    $_SESSION['error'] = $error;
	    redirect('search-comments.php'); //home
	}

	include("view/requests.php");
}
else if (isset($_POST['tagName'])) {
	$search = "tags";

	if (isset($_POST['tagNb'])) {
		$tagName = htmlspecialchars($_POST['tagName']);
		$tagNb = htmlspecialchars($_POST['tagNb']);

		$tags = $tag->requestTags($tagName, $tagNb);
	}
	else {
		$error[] = "Erreur.";
	}

	if (!empty($error)) {
	    $_SESSION['error'] = $error;
	    redirect('search-tags.php'); //home
	}

	include("view/requests.php");
}
else {
	$error[] = "Erreur.";
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    redirect('index.php'); //home
}