<?php 
include_once('model/class.Comment.php');
$comment = new Comment($db);

/* Nouveau comment */
if (isset($_GET['estabID']) && isset($_POST['comtext'])) {
    $comtext = htmlspecialchars($_POST['comtext']);

    if (isset($_POST['star'])) { //on prend le score (1 a 5)
        $comscore = htmlspecialchars($_POST['star']);
    }
    else {
        $error[] = "Score requis (> 0).";
    }

    if (empty($comtext)) {
        $error[] = "Commentaire trop court.";
    }

    if (empty($error)) {
        if ($comment->existComment($_SESSION['userID'], $_GET['estabID'])) {
            $error[] = "Attendez quelques secondes avant de commenter à nouveau cet établissement...";
        }
        if (empty($error)) {
            if ($comment->addComment($_SESSION['userID'], $_GET['estabID'], $comscore, $comtext)) {
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