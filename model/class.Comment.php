<?php
include_once("functions.php");
class Comment {

	protected $db;

	public function __construct(PDO $db) {
		$this->db = $db;
	}

	// ================================================================================
	// INSERT
	// ================================================================================
	/* Ajoute un Comment */
	public function addComment($userID, $estabID, $comscore, $comtext) {
		$req = $this->db->prepare('INSERT INTO Comment(UserID, EstabID, ComDate, ComScore, ComText) 
			VALUES(?,?, DATE_FORMAT(NOW(), \'%Y-%m-%d %H:%i\'),?,?)');
        $req->execute(array($userID, $estabID ,$comscore, $comtext));
        return $req;
	}

	public function addCommentXML($userID, $estabID, $comscore, $comtext, $comdate) {
		$req = $this->db->prepare('INSERT INTO Comment(UserID, EstabID, ComDate, ComScore, ComText) 
			VALUES(?,?,?,?,?)');
        $req->execute(array($userID, $estabID, $comdate, $comscore, $comtext));
        return $req;
	}

	// ================================================================================
	// SELECT
	// ================================================================================
	public function existComment($userID, $estabID) {
		$req = $this->db->prepare('SELECT CommentID FROM Comment WHERE UserID = ? AND EstabID = ? AND ComDate = DATE_FORMAT(NOW(), \'%Y-%m-%d %H:%i\')');
        $req->execute(array($userID, $estabID));
        return $req->rowCount() > 0;
	}

	public function existCommentXML($userID, $estabID, $comdate) {
		$req = $this->db->prepare('SELECT CommentID FROM Comment WHERE UserID = ? AND EstabID = ? AND ComDate = ?');
        $req->execute(array($userID, $estabID, $comdate));
        return $req->rowCount() > 0;
	}

	//Tous les Comment d'un estabID
	public function getComments($estabID) {
		$req = $this->db->prepare('SELECT * FROM Comment c WHERE c.EstabID = ?  ORDER BY CommentID DESC');
		$req->execute(array($estabID));
        $rows = $req->fetchAll();
        return $rows;
	}

	//Tous les Comment d'un userID
	public function getMembreComments($userID) {
		$req = $this->db->prepare('SELECT * FROM Comment c WHERE c.UserID = ?  ORDER BY CommentID DESC');
		$req->execute(array($userID));
        $rows = $req->fetchAll();
        return $rows;
	}

	//User a partir du commentID
	public function getCreator($commentID) {
		$req = $this->db->prepare('SELECT * FROM Comment c, User u WHERE c.UserID = u.UserID AND c.CommentID = ?');
		$req->execute(array($commentID));
        $row = $req->fetch();
        return $row;
	}

	//Estab d'un comment
	public function getEstabComment ($commentID) {
		$req = $this->db->prepare('SELECT * FROM Comment c, Establishment e WHERE c.EstabID = e.EstabID AND c.CommentID = ? ORDER BY CommentID DESC');
		$req->execute(array($commentID));
        $row = $req->fetch();
        return $row;
	}

	//Nombre de Comment par personne
	public function getNumberComment($userID) {
		$req = $this->db->prepare('SELECT COUNT(CommentID) as counter FROM Comment c, User u WHERE c.UserID = u.UserID AND c.UserID = ?');
		$req->execute(array($userID));
        $row = $req->fetch();
        return $row;
	}

	//Moyenne des scores
		public function getMeanComment($estabID) {
		$req = $this->db->prepare('SELECT AVG(ComScore) as mean FROM Comment c WHERE c.EstabID = ?');
		$req->execute(array($estabID));
        $row = $req->fetch();
        return $row;
	}

	// ================================================================================
	// REQUEST
	// ================================================================================
	public function requestComments($commentText, $commentScore, $commentThumbs){
		$req = $this->db->prepare("SELECT * FROM Comment c WHERE 
			(?='' OR c.ComText LIKE ?) AND
			(?='' OR c.ComScore>=?) AND 
			(?='' OR ?='0' OR c.CommentID in (SELECT t.CommentID FROM Thumbs t WHERE t.CommentID=c.CommentID GROUP BY c.CommentID HAVING SUM(t.UpDown)>=?)) ");
		$req->execute(array($commentText, "%$commentText%", $commentScore, $commentScore, $commentThumbs, $commentThumbs, $commentThumbs));
        $rows = $req->fetchAll();
        return $rows;
	}
}