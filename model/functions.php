<?php
function redirect($url) {
	header('Location:' . $url);
    exit();
}
/*
//this->db OBLIGATOIRE !
//Modèle. Obligé $req->bindParam si param dans LIMIT.

//GET : flag that represents the fact that the form has been processed successfully, errors and you need to congratulate user.
*/