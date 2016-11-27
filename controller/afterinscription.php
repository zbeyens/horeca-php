<?php 
include_once('model/class.Admin.php');
$user = new Admin($db);

/* inscription : Verification nickname, MAIL, PASSWORD */
if (isset($_POST['nickname'][2]) && ctype_alpha($_POST['nickname']) && isset($_POST['g-recaptcha-response'])) {
    $nickname = htmlspecialchars($_POST['nickname']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);

    //Captcha google
    $captcha = $_POST['g-recaptcha-response'];
    if (!$captcha) {
        $error[] = "Vous devez cocher le captcha.";
    }
    $secretKey = "6Lf84x4TAAAAAHMJtq925Id8SL7rR3gvtEgVJoCz";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);
    if (intval($responseKeys["success"]) !== 1 && empty($error)) {
        $error[] = 'You are spammer ! Get the @$%K out';
    }

    if ($user->existNickname($nickname)) {
        $error[] = "Nom d'utilisateur déjà utilisé.";
    }
    if ($user->existMail($mail)) {
        $error[] = "Adresse mail déjà utilisée.";
    }

    if (empty($error)) {
        if (isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $file=$_FILES['pic'];
            $picname = 'view/uploads/user_' . $_POST['nickname'];

            include("controller/security/faille-upload.php");

            if (empty($error)) {
                $user->register($nickname, $mail, $password, $picname, true);
            }
            else {
                $user->register($nickname, $mail, $password, '', false); //picname default
            }
        }
        else {
            $user->register($nickname, $mail, $password, '', false); //picname default
        }

        $after = "inscription";
        $lastID = $db->lastInsertId();
        //le premier inscrit est ADMIN. On importe ensuite les XML !
        if ($user->getNumberMembre()['compteur'] == '1') {
            $user->addAdmin($lastID);
            include("controller/importXML.php");
        }
        include("view/after.php");
    }
}
else {
    $error[] = "Veuillez choisir un nom d'utilisateur valide (entre 3 et 30 lettres).";
}

if (!empty($error)) {
    $_SESSION['error'] = $error;
    redirect('inscription.php');
}