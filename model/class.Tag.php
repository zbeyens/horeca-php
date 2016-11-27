<?php
include_once("functions.php");
class Tag {

	protected $db;

	public function __construct(PDO $db) {
		$this->db = $db;
	}

	// ================================================================================
	// INSERT
	// ================================================================================
	/* Ajoute un tag */
	public function addTag($userID, $estabID, $name) {
		$req = $this->db->prepare('INSERT INTO Tag(UserID, EstabID, Name) VALUES(?,?,?)');
        $req->execute(array($userID, $estabID, $name));
        return $req;
	}

	// ================================================================================
	// SELECT
	// ================================================================================
	//Tous les Tag Name dans l'ordre décroissant de leur poids.
	public function getDisTags($estabID) {
		$req = $this->db->prepare('SELECT DISTINCT t.Name FROM Tag t, Establishment e WHERE t.EstabID = e.EstabID AND t.EstabID = ? GROUP BY t.Name ORDER BY COUNT(t.Name) DESC, TagID DESC');
		$req->execute(array($estabID));
        $rows = $req->fetchAll();
        return $rows;
	}

	//Nickname DES createurs d'UN tag d'UN etablissement
	public function getCreator($name, $estabID) {
		$req = $this->db->prepare('SELECT Nickname FROM Tag t, User u WHERE t.EstabID = ? AND t.UserID = u.UserID AND t.Name = ?');
		$req->execute(array($estabID, $name));
        $rows = $req->fetchAll();
        return $rows;
	}

	//Poids d'UN tag d'UN etablissement
	public function getPoids($name, $estabID) {
		$req = $this->db->prepare('SELECT COUNT(*) as poids FROM Tag t WHERE t.EstabID = ? AND t.Name = ?');
		$req->execute(array($estabID, $name));
        $row = $req->fetch();
        return $row;
	}

	public function existTag($name, $estabID, $userID) {
		$req = $this->db->prepare('SELECT * FROM Tag WHERE Name = ? AND EstabID = ? AND UserID = ?');
        $req->execute(array($name, $estabID, $userID));
        return $req->rowCount() > 0;
	}

	//LES TagName et EstName en fonction de l'userID
	public function getTagsMembre ($userID) {
		$req = $this->db->prepare('SELECT t.Name tName, e.Name eName, e.EstabID eEstabID FROM Tag t, Establishment e, User u WHERE t.EstabID = e.EstabID AND t.UserID = u.UserID AND t.UserID = ? ORDER BY TagID DESC');
		$req->execute(array($userID));
        $rows = $req->fetchAll();
        return $rows;
	}

	//Nombre de tag par personne
	public function getNumberTag($userID) {
		$req = $this->db->prepare('SELECT COUNT(TagID) as counter FROM Tag t, User u WHERE t.UserID = u.UserID AND t.UserID = ?');
		$req->execute(array($userID));
        $row = $req->fetch();
        return $row;
	}

	// ================================================================================
	// REQUEST
	// ================================================================================
	public function requestTags($tagName, $tagNb){
		$req = $this->db->prepare("SELECT AVG(c.ComScore) as mean, t.* FROM Tag t, Establishment e, Comment c WHERE t.EstabID = e.EstabID AND (c.EstabID = e.EstabID OR NOT EXISTS (SELECT * FROM Comment c1 WHERE c1.EstabID = e.EstabID)) AND
			(?='' OR t.Name LIKE ?)
			GROUP BY t.Name HAVING (COUNT(DISTINCT t.EstabID) >= ? OR ?='') ORDER BY mean DESC");
		$req->execute(array($tagName, "%$tagName%", $tagNb, $tagNb));
		$rows=$req->fetchAll();
		return $rows;
	}

}