<?php
/*Pour chaque page HTML, on start la session pour avoir des variables de SESSION.*/
session_start();

/*On enregistre notre token
$token = md5(bin2hex(openssl_random_pseudo_bytes(5)))
$_SESSION['token'] = $token;*/

$DB_host = "mysql.hostinger.fr";
$DB_user = "u489828451_ziyad";
$DB_pass = "*Zhorecadu99*";
$DB_name = "u489828451_horec";

/*On se connecte à MySQL http://localhost/phpmyadmin/ avec PDO. On traque les erreurs fetch*/
try {//'mysql:host=localhost;dbname=horeca;charset=utf8', 'root', ''
    $db = new PDO("mysql:host={$DB_host};dbname={$DB_name};charset=utf8",$DB_user,$DB_pass,
     	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
