<?php
include_once('model/db-config.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
	$search = "tags";
    include_once('view/search.php');
}