<?php 
include_once('model/class.Tag.php');
$tag = new Tag($db);

/* (Nouveau) tag */
if (isset($_GET['estabID']) && isset($_POST['inputtag']) && isset($_POST['droptag'])) {
    $inputtag = htmlspecialchars($_POST['inputtag']);
    $droptag = htmlspecialchars($_POST['droptag']);

    if (!empty($inputtag)) {
        $choice = $inputtag;
    } //si pas d'input, on va voir le dropdown
    else {
        if ($droptag != "Tags...") {
            $choice = $droptag;
        }
        else {
            $error[] = "Label non valide.";
        }
    }

    if (empty($error)) {
        if ($tag->existTag($choice, $_GET['estabID'], $_SESSION['userID'])) {
            $error[] = "Vous avez déjà utilisé ce label pour cet établissement.";
        }
        if (empty($error)) {
            if ($tag->addTag($_SESSION['userID'], $_GET['estabID'], $choice)) {
                redirect("fiche-etabl.php?estabID=" . $_GET['estabID']);
            }
        }
    }
}
else {
    $error[] = "Erreur.";
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    redirect("fiche-etabl.php?estabID=" . $_GET['estabID']);
}