<?php
include_once("functions.php");
class Thumbs {

	protected $db;

	public function __construct(PDO $db) {
		$this->db = $db;
	}

	// ================================================================================
	// INSERT
	// ================================================================================
	/* Ajoute un vote */
	public function addThumbs($userID, $commentID, $updown) {
		$req = $this->db->prepare('INSERT INTO Thumbs(UserID, CommentID, UpDown) VALUES(?,?,?)');
        $req->execute(array($userID, $commentID, $updown));
        return $req;
	}

	// ================================================================================
	// SELECT
	// ================================================================================
	public function getThumbs($commentID) {
		$req = $this->db->prepare('SELECT SUM(UpDown) as somme FROM Thumbs t WHERE t.CommentID = ?');
		$req->execute(array($commentID));
        $row = $req->fetch();
        return $row;
	}

	public function existThumbs($userID, $commentID) {
		$req = $this->db->prepare('SELECT * FROM Thumbs WHERE UserID = ? AND CommentID = ?');
        $req->execute(array($userID, $commentID));
        return $req->rowCount() > 0;
	}

	public function getUpDown($userID, $commentID) {
		$req = $this->db->prepare('SELECT UpDown FROM Thumbs t WHERE t.UserID=? AND t.CommentID = ?');
		$req->execute(array($userID, $commentID));
        $row = $req->fetch();
        return $row;
	}

	public function editThumbs($userID, $commentID, $updown) {
		$req = $this->db->prepare('UPDATE Thumbs SET UpDown = ? WHERE UserID = ? AND CommentID = ?');
		$req->execute(array($updown, $userID, $commentID));
	}

}