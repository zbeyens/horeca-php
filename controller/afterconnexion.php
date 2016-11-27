<?php 
include_once('model/class.User.php');
$user = new User($db);


if ($user->isLoggedIn()) {
    redirect('fiche-membre.php?userID=' . $_SESSION['userID']); //...home
}

/* connexion : Verification nickname, PASSWORD */
if (isset($_POST['nickname'][2]) && !isset($_POST['nickname'][30]) && !empty($_POST['password'])) {
    sleep(1); //ralentir l'attaque par force brute. Mais ralentit trop sur un gros serveur

    $nickname = htmlspecialchars($_POST['nickname']);
    $password = htmlspecialchars($_POST['password']);
    if ($user->login($nickname, $password)) {
        $after = "connexion";
        include('view/after.php');
    }
    else {
        $error[] = "Mauvais identifiants !";
    }
}
else {
    $error[] = "Veuillez choisir un nom d'utilisateur valide (entre 3 et 30 lettres) et un mot de passe valide.";
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    redirect('connexion.php');
}