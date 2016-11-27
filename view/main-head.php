<?php
function toASCII( $str )
{
    return strtr(utf8_decode($str), 
        utf8_decode(
        'ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
        'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');
}

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="view/style.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Kaushan+Script' type='text/css'>
	<title>Annuaire d'établissements HORECA</title>
	<script src='https://www.google.com/recaptcha/api.js'
	var RecaptchaOptions = {theme : 'dark'};></script>
	<script src="view/js/functions.js"></script>
</head>