<?php
include_once('model/db-config.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
	$search = "etablissements";
    include_once('view/search.php');
}