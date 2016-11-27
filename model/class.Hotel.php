<?php
include_once("class.Establishment.php");
class Hotel extends Establishment {

	public function __construct(PDO $db) {
		parent::__construct($db);
	}

	// ================================================================================
	// INSERT
	// ================================================================================
	/* Ajoute un estab, prend son ID et ajoute ensuite un hotel */
	public function addHotel($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname, $stars, $bedrooms, $prizedoubleroom) {
		$estabID = parent::addEstab($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname);
		$req = $this->db->prepare('INSERT INTO Hotel(EstabID, Stars, Bedrooms, PrizeDoubleRoom) VALUES(?,?,?,?)');
        $req->execute(array($estabID, $stars, $bedrooms, $prizedoubleroom));
        return $estabID;
	}


	// ================================================================================
	// SELECT
	// ================================================================================
	//Hotels
	public function getHotels() {
		$req = $this->db->prepare('SELECT * FROM Hotel h, Establishment e WHERE h.EstabID = e.EstabID ORDER BY HotelID');
        $req->execute();
        $rows = $req->fetchAll();
        return $rows;
	}

	//Fiche-hotel
	public function getHotel($estabID) {
		$req = $this->db->prepare('SELECT * FROM Hotel h, Establishment e WHERE h.EstabID = e.EstabID AND e.EstabID = ?');
		$req->execute(array($estabID));
        $row = $req->fetch();
        return $row;
	}

	// ================================================================================
	// UPDATE
	// ================================================================================
	public function editHotel($estabID, $name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $stars, $bedrooms, $prizedoubleroom) {
		parent::editEstab($estabID, $name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink);
		$req = $this->db->prepare('UPDATE Hotel SET Stars=?, Bedrooms=?, PrizeDoubleRoom=? WHERE EstabID = ?');
		$req->execute(array($stars, $bedrooms, $prizedoubleroom, $estabID));
	}

}