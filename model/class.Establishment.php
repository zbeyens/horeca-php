<?php
include_once("functions.php");
class Establishment 
{
	protected $db;

	public function __construct(PDO $db) {
		$this->db = $db;
	}

	// ================================================================================
	// INSERT
	// ================================================================================
	/*Ajoute un estab et renvoie son ID*/
	public function addEstab($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink,$creatornickname) {
		$req = $this->db->prepare('INSERT INTO Establishment(Name, AdStreet, AdNum, AdZip, AdCity, AdLongitude, AdLatitude, Tel, SiteLink, CreationDate, CreatorNickname) VALUES(?,?,?,?,?,?,?,?,?,DATE_FORMAT(NOW(), \'%Y-%m-%d\'),?)');
        $req->execute(array($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname));
        $estabID = $this->db->lastInsertId();
        return $estabID;
	}

	public function addEstabXML($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink,$creatornickname, $creationdate) {
		$req = $this->db->prepare('INSERT INTO Establishment(Name, AdStreet, AdNum, AdZip, AdCity, AdLongitude, AdLatitude, Tel, SiteLink, CreatorNickname, CreationDate) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
        $req->execute(array($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname, $creationdate));
        $estabID = $this->db->lastInsertId();
        return $estabID;
	}

	// ================================================================================
	// SELECT
	// ================================================================================
	// Verification PK
	public function existPK($name, $adstreet, $adnum, $adzip, $adcity) {
		$req = $this->db->prepare('SELECT * FROM Establishment WHERE Name=? AND AdStreet=? AND AdNum=? AND AdZip=? AND AdCity=?');
        $req->execute(array($name, $adstreet, $adnum, $adzip, $adcity));
        return $req->rowCount() > 0;
	}

	//Fiche a partir de l'estabID
	public function getEstab($estabID) { 
		$req = $this->db->prepare('SELECT * FROM Establishment e WHERE e.EstabID = ?');
		$req->execute(array($estabID)); 
        $row = $req->fetch();
        return $row;
	}

	//Fiche a partir de la PK
	public function getEstabID($name, $adstreet, $adnum, $adzip, $adcity) { 
		$req = $this->db->prepare('SELECT * FROM Establishment e WHERE Name=? AND AdStreet=? AND AdNum=? AND AdZip=? AND AdCity=?');
		$req->execute(array($name, $adstreet, $adnum, $adzip, $adcity)); 
        $row = $req->fetch();
        return $row;
	}

	// ================================================================================
	// UPDATE
	// ================================================================================
	public function editEstab($estabID, $name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink) { //CreatorNickname et CreationDate non editable.
		$req = $this->db->prepare('UPDATE Establishment SET Name=?, AdStreet=?, AdNum=?, AdZip=?, AdCity=?, AdLongitude=?, AdLatitude=?, Tel=?, SiteLink=? WHERE EstabID = ?');
		$req->execute(array($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $estabID));
	}

	public function editPic($estabID, $pic) {
		$req = $this->db->prepare('UPDATE Establishment SET Pic=? WHERE EstabID=?');
        $req->execute(array($pic, $estabID));
	}

	// ================================================================================
	// DELETE
	// ================================================================================
	public function removeEstab($estabID) {
		$req = $this->db->prepare('DELETE FROM Establishment WHERE EstabID = ?');
		$req->execute(array($estabID));
	}

	// ================================================================================
	// REQUEST
	// ================================================================================
	/*public function request2($nickname){
		$req = $this->db->prepare('SELECT AVG(cmean.ComScore) as mean, e.* FROM Establishment e, User u, Comment c, Comment cmean where c.ComScore>=3 AND u.Nickname<>? AND e.estabID = c.EstabID AND e.estabID = cmean.EstabID AND c.UserID = u.UserID AND NOT EXISTS (select * FROM Establishment e2, Comment c2, User u2 
			WHERE c2.UserID=u2.UserID AND c2.EstabID=e2.EstabID AND c2.ComScore>=3 AND u2.Nickname=? AND 
			NOT EXISTS (SELECT * FROM Comment c3, Establishment e3 WHERE e3.Name = e2.Name AND c3.ComScore>=3 AND e3.estabID = c3.EstabID AND c3.UserID = u.UserID)) GROUP BY e.EstabID HAVING COUNT(DISTINCT u.UserID)>=2 ORDER BY mean DESC');
		$req->execute(array($nickname,$nickname)); 
        $rows = $req->fetchAll();
        return $rows;
	}
	public function request3($maxComs){
		$req = $this->db->prepare('SELECT e.* FROM Establishment e, Comment c WHERE c.EstabID=e.EstabID GROUP BY e.EstabID HAVING COUNT(c.CommentID) <= ? ORDER BY e.Name');
		$req->execute(array($maxComs)); 
        $rows = $req->fetchAll();
        return $rows;
	}
	public function request5($nComs){
		$req = $this->db->prepare('SELECT e.* FROM Establishment e, Comment c WHERE e.EstabID=c.EstabID GROUP BY e.EstabID HAVING COUNT(c.CommentID)>=?');
		$req->execute(array($nComs)); 
        $rows = $req->fetchAll();
        return $rows;
	}*/

	public function requestEstabs($estab, $estabname, $estabcity, $estabzip, $estabtag, $estabScore, $estabUserNb, $estabUser, $estabMaxComment, $estabMinComment) {
		$req = $this->db->prepare("SELECT CASE WHEN NOT EXISTS (SELECT * FROM Comment c1 WHERE c1.EstabID = e.EstabID) THEN 0 ELSE AVG(cmean.ComScore) END as mean, e.* 
			FROM Establishment e, Tag t, Comment cmean WHERE 
			#classement selon la moyenne:
			(cmean.EstabID = e.EstabID OR NOT EXISTS (SELECT * FROM Comment c1 WHERE c1.EstabID = e.EstabID)) AND
			#étape 1:
			((?='cafe' AND e.EstabID in (SELECT c.EstabID FROM Cafe c WHERE e.EstabID=c.EstabID)) OR
			(?='hotel' AND e.EstabID in (SELECT h.EstabID FROM Hotel h WHERE e.EstabID=h.EstabID)) OR
			(?='restaurant' AND e.EstabID in (SELECT r.EstabID FROM Restaurant r WHERE e.EstabID=r.EstabID)) OR ?='') AND
			(e.Name LIKE ? OR ?='') AND 
			(e.AdZip=? OR ?='') AND 
			(e.AdCity=? OR ?='') AND 
			((t.Name LIKE ? AND t.EstabID=e.EstabID) OR ?='') AND 
			#request 1, étape 2.1:
			(?='' OR ?='' OR e.EstabID in (SELECT e1.EstabID FROM Establishment e1, User u, Comment c where c.ComScore>=? AND (u.Nickname<>? OR ?='') AND e1.estabID = c.EstabID AND c.UserID = u.UserID AND
			#étape 3.1:
			(?='' OR NOT EXISTS (select * FROM Establishment e2, Comment c2, User u2 
			WHERE c2.UserID=u2.UserID AND c2.EstabID=e2.EstabID AND c2.ComScore>=3 AND u2.Nickname=? AND 
			NOT EXISTS (SELECT * FROM Comment c3, Establishment e3 WHERE e3.Name = e2.Name AND c3.ComScore>=3 AND e3.estabID = c3.EstabID AND c3.UserID = u.UserID))) GROUP BY e1.EstabID HAVING COUNT(DISTINCT u.UserID)>=?) ) AND
			#request 3, étapes 2.2:
			(?='' OR e.EstabID in (SELECT e1.EstabID FROM Establishment e1, Comment c WHERE c.EstabID=e1.EstabID GROUP BY e1.EstabID HAVING COUNT(c.CommentID) <= ?)) AND 
			#request 5, étapes 2.3:
			(?='' OR e.EstabID in (SELECT e1.EstabID FROM Establishment e1, Comment c WHERE e1.EstabID=c.EstabID GROUP BY e1.EstabID HAVING COUNT(c.CommentID) >=? ))
		GROUP BY e.EstabID ORDER BY mean DESC");
		$req->execute(array($estab, $estab, $estab, $estab, "$estabname%", $estabname, $estabzip, $estabzip, $estabcity, $estabcity, "%$estabtag%", $estabtag, $estabScore, $estabUserNb, $estabScore, $estabUser, $estabUser, $estabUser, $estabUser, $estabUserNb, $estabMaxComment, $estabMaxComment, $estabMinComment, $estabMinComment)); 
        $rows = $req->fetchAll();
        return $rows;
	}
}