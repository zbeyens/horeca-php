<?php
/* Nouveau établ. : Verification */
if (!isset($_POST['name'][2])) {
	$error[] = "Nom d'établissement non valide (entre 3 et 20 lettres).";
}
if (!isset($_POST['adstreet'][2])) {
	$error[] = "Nom de rue non valide (entre 3 et 30 lettres).";
}
if (!isset($_POST['adnum']) || empty($_POST['adnum'])) {
	$error[] = "Numéro d'adresse non valide.";
}
if (!isset($_POST['adzip']) || empty($_POST['adzip'])) {
	$error[] = "Code postal non valide.";
}
if (!isset($_POST['adlongitude']) || empty($_POST['adlongitude'])) {
	$error[] = "Longitude non valide.";
}
if (!isset($_POST['adlatitude']) || empty($_POST['adlatitude'])) {
	$error[] = "Latitude non valide.";
}
if (!isset($_POST['tel'][2])) {
	$error[] = "Nom de téléphone non valide (entre ... et ... lettres).";
}
/*if (isset($_POST['sitelink'][2])) { //
	$error[] = "Nom de téléphone non valide (entre ... et ... lettres).";
}*/

if (empty($error)) {
    $name = htmlspecialchars($_POST['name']);
    $adstreet = htmlspecialchars($_POST['adstreet']);
    $adnum = htmlspecialchars($_POST['adnum']);
    $adzip = htmlspecialchars($_POST['adzip']);
    $adcity = htmlspecialchars($_POST['adcity']);
    $adlongitude = htmlspecialchars($_POST['adlongitude']);
    $adlatitude = htmlspecialchars($_POST['adlatitude']);
    $tel = htmlspecialchars($_POST['tel']);
    $sitelink = NULL;
    if (isset($_POST['sitelink'])) {
    	$sitelink = htmlspecialchars($_POST['sitelink']);
    }
}