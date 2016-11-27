<?php
include("class.Establishment.php");
class Cafe extends Establishment {

	public function __construct(PDO $db) {
		parent::__construct($db);
	}

	// ================================================================================
	// INSERT
	// ================================================================================
	/* Ajoute un estab, prend son ID et ajoute ensuite un cafe */
	public function addCafe($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname, $smoking, $snack) {
		$estabID = parent::addEstab($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname);
		$req = $this->db->prepare('INSERT INTO Cafe(EstabID, Smoking, Snack) VALUES(?,?,?)');
        $req->execute(array($estabID, $smoking, $snack));
        return $estabID;
	}

	public function addCafeXML($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname, $smoking, $snack, $creationdate) {
		$estabID = parent::addEstabXML($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname, $creationdate);
		$req = $this->db->prepare('INSERT INTO Cafe(EstabID, Smoking, Snack) VALUES(?,?,?)');
        $req->execute(array($estabID, $smoking, $snack));
        return $estabID;
	}

	// ================================================================================
	// SELECT
	// ================================================================================
	//Cafes
	public function getCafes() {
		$req = $this->db->prepare('SELECT * FROM Cafe c, Establishment e WHERE c.EstabID = e.EstabID ORDER BY CafeID');
        $req->execute();
        $rows = $req->fetchAll();
        return $rows;
	}

	//Fiche-café
	public function getCafe($estabID) {
		$req = $this->db->prepare('SELECT * FROM Cafe c, Establishment e WHERE c.EstabID = e.EstabID AND e.EstabID = ?');
		$req->execute(array($estabID));
        $row = $req->fetch();
        return $row;
	}

	// ================================================================================
	// UPDATE
	// ================================================================================
	public function editCafe($estabID, $name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $smoking, $snack) {
		parent::editEstab($estabID, $name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink);
		$req = $this->db->prepare('UPDATE Cafe SET Smoking=?, Snack=? WHERE EstabID = ?');
		$req->execute(array($smoking, $snack, $estabID));
	}

}