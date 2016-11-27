<?php 
include_once('model/class.Admin.php');
$user = new Admin($db);

/* prendre toutes les infos des membres + tags + commentaires*/
if (isset($_GET['userID'])) {
	$userID = $_GET['userID'];
	if ($user->existUser($userID)) {
		if (!$user->existAdmin($userID) && isset($_POST['addadmin'])) {
			$user->addAdmin($userID);
			redirect('fiche-membre.php?userID='.$userID);
		}
		else if (isset($_POST['deleteuser'])) {
			$user->removeUser($userID);
			redirect('membres.php');
		}
		else {
			$error[] = "Cet utilisateur est déjà un admin.";
		}
	}
	else {
		$error[] = "Utilisateur non existant.";
	}
	if (!empty($error)) {
		$_SESSION['error'] = $error;
	}
	redirect('fiche-membre.php?userID='.$userID);
}
else {
	$error[] = "Erreur.";
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    redirect('membres.php');
}

include("view/fiche-membre.php");