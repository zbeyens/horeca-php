<?php 
include_once('model/class.Admin.php');
include_once('model/class.Comment.php');
$comment = new Comment($db);
$user = new Admin($db);

/* prendre toutes les infos des membres */
$membres = $user->getMembres();

include("view/membres.php");