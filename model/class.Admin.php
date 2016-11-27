<?php
include_once('class.User.php');

class Admin extends User {

	protected $db;

	public function __construct(PDO $db) {
		$this->db = $db;
	}

	// ================================================================================
	// INSERT
	// ================================================================================
	/* Ajoute un user en admin */
	public function addAdmin($userID) {
		$req = $this->db->prepare('INSERT INTO Admin(UserID) VALUES(?)');
        $req->execute(array($userID));
        return $req;
	}

	public function existAdmin($userID) {
		$req = $this->db->prepare('SELECT * FROM Admin WHERE UserID = ?');
        $req->execute(array($userID));
        return $req->rowCount() > 0;
	}

	// ================================================================================
	// REQUEST
	// ================================================================================
	public function requestUsers($droits, $userName, $userComment, $userScore, $userEstabNb, $userScoreName) {
		$req= $this ->db->prepare("SELECT u.* FROM Admin a, User u WHERE 
			#request 4:
			(?='' OR a.UserID=u.UserID) AND 
			(?='' OR NOT EXISTS (SELECT e.* FROM Establishment e WHERE u.Nickname=e.CreatorNickname AND EXISTS (SELECT * FROM Comment c WHERE c.EstabID=e.EstabID AND c.UserID=u.UserID))) AND
			(?='' OR u.Nickname LIKE ?) AND 
			#request 2:
			(?='' OR ?='' or u.UserID in (SELECT u.UserID FROM User u, Comment c, User u2, Comment c2 WHERE u.UserID=c.UserID AND (u.Nickname<>? OR ?='') AND c.ComScore>=? AND 
			(?='' OR c.EstabID=c2.EstabID AND c2.UserID=u2.userID AND u2.Nickname=? AND c2.ComScore>=?)
			GROUP BY u.UserID HAVING COUNT(DISTINCT c.EstabID) >= ?))
			GROUP by u.UserID");
		$req->execute(array($droits, $userComment, $userName, "$userName%", $userScore,  $userEstabNb, $userScoreName, $userScoreName, $userScore, $userScoreName, $userScoreName, $userScore, $userEstabNb));
		$rows=$req->fetchAll();
		return $rows;
	}
}