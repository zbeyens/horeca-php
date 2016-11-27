<?php 
include_once('model/class.Thumbs.php');
$thumbs = new Thumbs($db);

/* Nouveau comment */
if (isset($_GET['commentID']) && isset($_GET['name'])) {
    if ($_GET['name'] == "up") { //on prend le score (1 a 5)
        $updown = 1;
    }
    else if ($_GET['name'] == "down") {
        $updown = -1;
    }
    else {
        $error[] = "Vote non valide.";
    }

    if (empty($error)) {
        //si on reclic sur un même vote, on annule le vote (0).
        if ($thumbs->existThumbs($_SESSION['userID'], $_GET['commentID'])) {
            $oldupdown = $thumbs->getUpDown($_SESSION['userID'], $_GET['commentID'])['UpDown'];
            if ($oldupdown == $updown) {
                $updown = '0';
            }
            $thumbs->editThumbs($_SESSION['userID'], $_GET['commentID'], $updown);
        }
        else {
            if ($thumbs->addThumbs($_SESSION['userID'], $_GET['commentID'], $updown)) {
            }
        }
        redirect("fiche-etabl.php?estabID=" . $_GET['estabID']);
    }
}
else {
    $error[] = "Erreur.";
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    redirect("fiche-etabl.php?estabID=" . $_GET['estabID']);
}