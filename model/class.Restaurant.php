<?php
include_once("class.Establishment.php");
class Restaurant extends Establishment {

	public function __construct(PDO $db) {
		parent::__construct($db);
	}

	// ================================================================================
	// INSERT
	// ================================================================================
	/* Ajoute un estab, prend son ID et ajoute ensuite un hotel */
	public function addRestaurant($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname, $pricerange, $takeaway, $delivery, $banquetcapacity) {
		$estabID = parent::addEstab($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname);
		$req = $this->db->prepare('INSERT INTO Restaurant(EstabID, PriceRange, TakeAway, Delivery, BanquetCapacity) VALUES(?,?,?,?,?)');
        $req->execute(array($estabID, $pricerange, $takeaway, $delivery, $banquetcapacity));
        return $estabID;
	}

	public function addRestaurantXML($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname, $pricerange, $takeaway, $delivery, $banquetcapacity, $creationdate) {
		$estabID = parent::addEstabXML($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $creatornickname, $creationdate);
		$req = $this->db->prepare('INSERT INTO Restaurant(EstabID, PriceRange, TakeAway, Delivery, BanquetCapacity) VALUES(?,?,?,?,?)');
        $req->execute(array($estabID, $pricerange, $takeaway, $delivery, $banquetcapacity));
        return $estabID;
	}

	// ================================================================================
	// SELECT
	// ================================================================================
	//Restaurants
	public function getRestaurants() {
		$req = $this->db->prepare('SELECT * FROM Restaurant r, Establishment e WHERE r.EstabID = e.EstabID ORDER BY RestID');
        $req->execute();
        $rows = $req->fetchAll();
        return $rows;
	}

	//Fiche-restaurant
	public function getRestaurant($estabID) {
		$req = $this->db->prepare('SELECT * FROM Restaurant r, Establishment e WHERE r.EstabID = e.EstabID AND e.EstabID = ?');
		$req->execute(array($estabID));
        $row = $req->fetch();
        return $row;
	}

	// ================================================================================
	// UPDATE
	// ================================================================================
	public function editRestaurant($estabID, $name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $pricerange, $takeaway, $delivery, $banquetcapacity) {
		parent::editEstab($estabID, $name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink);
		$req = $this->db->prepare('UPDATE Restaurant SET PriceRange=?, TakeAway=?, Delivery=?, BanquetCapacity=? WHERE EstabID = ?');
		$req->execute(array($pricerange, $takeaway, $delivery, $banquetcapacity, $estabID));
	}

}