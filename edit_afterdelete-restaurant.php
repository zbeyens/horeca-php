<?php
include_once('model/db-config.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
    include_once('controller/edit_afterdelete-restaurant.php');
}