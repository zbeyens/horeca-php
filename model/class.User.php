<?php
include_once("functions.php");
class User 
{
	protected $db;

	public function __construct(PDO $db) {
		$this->db = $db;
	}

	// ================================================================================
	// INSERT
	// ================================================================================

	public function register($nickname, $mail, $password, $pic, $existPic) { 
		$pass_hache = password_hash($password, PASSWORD_DEFAULT); //60 char
		if ($existPic) {
			$req = $this->db->prepare('INSERT INTO User(Nickname, Mail, Password, RegisterDate, Pic) VALUES(?,?,?,DATE_FORMAT(NOW(), \'%Y-%m-%d\'), ?)');
	        $req->execute(array($nickname,$mail, $pass_hache, $pic));
    	}
    	else {
    		$req = $this->db->prepare('INSERT INTO User(Nickname, Mail, Password, RegisterDate) VALUES(?,?,?,DATE_FORMAT(NOW(), \'%Y-%m-%d\'))');
	        $req->execute(array($nickname,$mail, $pass_hache));
    	}
        return $req;
	}

	// ================================================================================
	// SELECT
	// ================================================================================
	//Inscription
	public function existNickname($nickname) {
		$req = $this->db->prepare('SELECT Nickname, Mail FROM User WHERE Nickname=?');
        $req->execute(array($nickname));
        return $req->rowCount() > 0;
	}

	public function existUser($userID) {
		$req = $this->db->prepare('SELECT * FROM User WHERE UserID=?');
        $req->execute(array($userID));
        return $req->rowCount() > 0;
	}

	public function existMail($mail) {
		$req = $this->db->prepare('SELECT Nickname, Mail FROM User WHERE Mail=?');
        $req->execute(array($mail));
        return $req->rowCount() > 0;
	}

	//Connexion : PASSWORD
	public function login($nickname, $password) {
		
		/* //Limite connexion. Rajouter un "cron" pour vider connexion tous les jours. Ou placer un captcha
		// On récupère l'IP du visiteur
		$ip = $_SERVER['REMOTE_ADDR'];

		// On regarde s'il est autorisé à se connecter
		$recherche = $bdd->prepare('SELECT * FROM connexion WHERE ip = ?');
		$recherche->execute(array($ip));
		$count = $recherche->rowCount();

		// Si l'ip a essayé de se connecter moins de 10 fois ce jour là
		if ($count < 10)
	        // Vérification classique du password
	        if ($_POST['password'] == $password) {
	          echo "Bravo vous êtes connecté";
	        }
	        else {
	            // On enregistre la tentative échouée pour cette ip
	            $req = $bdd->prepare('INSERT INTO connexion(ip) VALUES(:ip)');
	            $req->execute(array('ip' => $ip));
	            $error[] = "Mot de passe incorrecte";
	        }
		// Si la personne a déja essayé de se connecter 10 fois ce jour là
		else {
		    $error[] = "Désolé vous êtes banni jusqu'à demain";
		}*/

		$req = $this->db->prepare('SELECT * FROM User WHERE Nickname=? LIMIT 1');
        $req->execute(array($nickname));
        $row = $req->fetch();
        if ($req->rowCount() > 0) {
        	if (password_verify($password, $row['Password'])) {
        		$_SESSION['nickname'] = $row['Nickname'];
        		$_SESSION['userID'] = $row['UserID'];
        		$_SESSION['mail'] = $row['Mail'];
        		$_SESSION['registerDate'] = $row['RegisterDate'];
        		$_SESSION['pic'] = $row['Pic'];
        		return true;
        	}
        	else {
        		return false;
        	}
        }
	}

	//Membres
	public function getMembres() {
		$req = $this->db->prepare('SELECT * FROM User ORDER BY UserID');
        $req->execute();
        $rows = $req->fetchAll();
        return $rows;
	}

	//Fiche-membre a partir de l'id
	public function getMembre($userID) {
		$req = $this->db->prepare('SELECT * FROM User WHERE UserID=? ORDER BY UserID ');
		$req->execute(array($userID));
        $row = $req->fetch();
        return $row;
	}

	//Fiche a partir du nickname
	public function getUserID($nickname) {
		$req = $this->db->prepare('SELECT * FROM User WHERE Nickname=?');
		$req->execute(array($nickname));
        $row = $req->fetch();
        return $row;
	}

	//Nombre de membre
	public function getNumberMembre() {
		$req = $this->db->prepare('SELECT COUNT(*) as compteur FROM User');
		$req->execute();
        $row = $req->fetch();
        return $row;
	}

	//Supprime un membre
	public function removeUser($userID) {
		$req = $this->db->prepare('DELETE FROM User WHERE UserID = ?');
        $req->execute(array($userID));
	}

	// ================================================================================
	// SESSION
	// ================================================================================
	//Connecté
	public function isLoggedIn() {
		if (isset($_SESSION['nickname'])) {
			return true;
		}
	}

	//Déconnexion
	public function logout() {
		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]);
		}
		session_destroy();
		//unset($_SESSION['nickname']);
		return true;
	}

}