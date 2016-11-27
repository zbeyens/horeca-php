<?php
include_once('model/class.User.php');
$user = new User($db);

$nickname = $_SESSION['nickname'];
$user->logout();

$after = "deconnexion";
include("view/after.php");
?>