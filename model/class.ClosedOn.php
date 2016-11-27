<?php
class ClosedOn {

	protected $db;

	public function __construct(PDO $db) {
		$this->db = $db;
	}

	// ================================================================================
	// INSERT
	// ================================================================================
	/* Ajoute un estab, prend son ID et ajoute ensuite un hotel */
	public function addClosedOn($restID, $estabID, $day, $hour) {
		$req = $this->db->prepare('INSERT INTO ClosedOn(RestID, EstabID, Day, Hour) VALUES(?,?,?,?)');
        $req->execute(array($restID, $estabID, $day, $hour));
        return $req;
	}

	// ================================================================================
	// SELECT
	// ================================================================================
	//Fiche-restaurant
	public function getClosedOn($estabID) {
		$req = $this->db->prepare('SELECT * FROM ClosedOn WHERE EstabID = ?');
		$req->execute(array($estabID));
        $rows = $req->fetchAll();
        return $rows;
	}

	public function existClosedOn($estabID, $day, $hour) {
		$req = $this->db->prepare('SELECT * FROM ClosedOn WHERE EstabID = ? AND Day = ? AND Hour = ?');
        $req->execute(array($estabID, $day, $hour));
        return $req->rowCount() > 0;
	}

	// ================================================================================
	// DELETE
	// ================================================================================
	public function removeClosedOn($estabID) {
		$req = $this->db->prepare('DELETE FROM ClosedOn WHERE EstabID = ?');
		$req->execute(array($estabID));
	}
}