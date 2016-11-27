<?php 
include_once('model/class.Admin.php');
include_once('model/class.Comment.php');
include_once('model/class.Tag.php');
include_once('model/class.Cafe.php');
include_once('model/class.Restaurant.php');
include_once('model/class.ClosedOn.php');

$comment = new Comment($db);
$user = new Admin($db);
$tag = new Tag($db);
$caf = new Cafe($db);
$restaurant = new Restaurant($db);
$closedon = new ClosedOn($db);

if (file_exists('xml/Cafes.xml')) {
	$xml = simplexml_load_file('xml/Cafes.xml');

	foreach ($xml->Cafe as $cafe) { //Cafe
		//inscription du createur d'estab
		$nickname = $cafe['nickname'];
		if (!$user->existNickname($nickname)) {
			$user->register($nickname, $nickname . "@hotmail.com", "pok", '', false);
		}

		//Etablissement
		$name = $cafe->Informations->Name;
		$date = str_replace('/', '-', $cafe['creationDate']);
		$creationdate = date('Y-m-d',strtotime($date));
		$adstreet = $cafe->Informations->Address->Street;
		$adnum = $cafe->Informations->Address->Num;
		$adzip = $cafe->Informations->Address->Zip;
		$adcity = $cafe->Informations->Address->City;
		$adlongitude = $cafe->Informations->Address->Longitude;
		$adlatitude = $cafe->Informations->Address->Latitude;
		$tel = $cafe->Informations->Tel;
		$sitelink = '';
		if (isset($cafe->Informations->Site['link'])) {
			$sitelink = $cafe->Informations->Site['link'];
		}

		$smoking = 0;
		if (isset($cafe->Informations->Smoking)) {
			$smoking = 1;
		}
		$snack = 0;
		if (isset($cafe->Informations->Snack)) {
			$snack = 1;
		}

		if (!$caf->existPK($name, $adstreet, $adnum, $adzip, $adcity)) {
			$estabID = $caf->addCafeXML($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $nickname, $smoking, $snack, $creationdate);
		}
		else {
			$estabID = $caf->getEstabID($name, $adstreet, $adnum, $adzip, $adcity)['EstabID'];
		}

		//Commentaires
		if (isset($cafe->Comments->Comment)) {
			foreach ($cafe->Comments->Comment as $com) {
				$comnickname = $com['nickname'];
				$date = str_replace('/', '-', $com['date']);
				$comdate = date('Y-m-d',strtotime($date));
				$comscore = $com['score'];
				$comtext = $com;

				//Inscription des createurs de comment
				if (!$user->existNickname($comnickname)) {
					$user->register($comnickname, $comnickname . "@hotmail.com", "pok", '', false);
				}
				$comuserID = $user->getUserID($comnickname)['UserID'];

				if (!$comment->existCommentXML($comuserID, $estabID, $comdate)) {
					$comment->addCommentXML($comuserID, $estabID, $comscore, $comtext, $comdate);
				}
			}	
		}

		//Tags
		if (isset($cafe->Tags->Tag)) {
			foreach ($cafe->Tags->Tag as $label) {
				$tagname = $label['name'];

				foreach ($label->User as $taguser) {
					$tagnickname = $taguser['nickname'];

					//Inscription des createurs de tag
					if (!$user->existNickname($tagnickname)) {
						$user->register($tagnickname, $tagnickname . "@hotmail.com", "pok", '', false);
					}
					$taguserID = $user->getUserID($tagnickname)['UserID'];

					if (!$tag->existTag($tagname, $estabID, $taguserID)) {
						$tag->addTag($taguserID, $estabID, $tagname);
					}
					//echo $taguserID. ' / ';
				}
			}	
		}

	}

	$xml = simplexml_load_file('xml/Restaurants.xml');

	foreach ($xml->Restaurant as $resto) { //Cafe
		//inscription du createur d'estab
		$nickname = $resto['nickname'];
		if (!$user->existNickname($nickname)) {
			$user->register($nickname, $nickname . "@hotmail.com", "pok", '', false);
		}

		//Etablissement
		$name = $resto->Informations->Name;
		$date = str_replace('/', '-', $resto['creationDate']);
		$creationdate = date('Y-m-d',strtotime($date));
		$adstreet = $resto->Informations->Address->Street;
		$adnum = $resto->Informations->Address->Num;
		$adzip = $resto->Informations->Address->Zip;
		$adcity = $resto->Informations->Address->City;
		$adlongitude = $resto->Informations->Address->Longitude;
		$adlatitude = $resto->Informations->Address->Latitude;
		$tel = $resto->Informations->Tel;
		$sitelink = '';
		if (isset($resto->Informations->Site['link'])) {
			$sitelink = $resto->Informations->Site['link'];
		}
		$pricerange = $resto->Informations->PriceRange;
		$banquetcapacity = $resto->Informations->Banquet['capacity'];

		$takeaway = 0;
		if (isset($resto->Informations->TakeAway)) {
			$takeaway = 1;
		}
		$delivery = 0;
		if (isset($resto->Informations->Delivery)) {
			$delivery = 1;
		}

		if (!$restaurant->existPK($name, $adstreet, $adnum, $adzip, $adcity)) {
			$estabID = $restaurant->addRestaurantXML($name, $adstreet, $adnum, $adzip, $adcity, $adlongitude, $adlatitude, $tel, $sitelink, $nickname, $pricerange, $takeaway, $delivery, $banquetcapacity, $creationdate);
		}
		else {
			$estabID = $restaurant->getEstabID($name, $adstreet, $adnum, $adzip, $adcity)['EstabID'];
		}

		if (isset($resto->Informations->Closed)) {
			foreach ($resto->Informations->Closed->On as $closed) {
				$day = $closed['day'];
				$hour = 0;
				if (isset($closed['hour'])) {
					$hour = $closed['hour'];
				}
				if (!$closedon->existClosedOn($estabID, $day, $hour)) {
					$restID = $restaurant->getRestaurant($estabID)['RestID'];
					$closedon->addClosedOn($restID, $estabID, $day, $hour);
				}
			}
		}

		//Commentaires
		if (isset($resto->Comments->Comment)) {
			foreach ($resto->Comments->Comment as $com) {
				$comnickname = $com['nickname'];
				$date = str_replace('/', '-', $com['date']);
				$comdate = date('Y-m-d',strtotime($date));
				$comscore = $com['score'];
				$comtext = $com;

				//Inscription des createurs de comment
				if (!$user->existNickname($comnickname)) {
					$user->register($comnickname, $comnickname . "@hotmail.com", "pok", '', false);
				}
				$comuserID = $user->getUserID($comnickname)['UserID'];

				if (!$comment->existCommentXML($comuserID, $estabID, $comdate)) {
					$comment->addCommentXML($comuserID, $estabID, $comscore, $comtext, $comdate);
				}
			}	
		}

		//Tags
		if (isset($resto->Tags->Tag)) {
			foreach ($resto->Tags->Tag as $label) {
				$tagname = $label['name'];

				foreach ($label->User as $taguser) {
					$tagnickname = $taguser['nickname'];

					//Inscription des createurs de tag
					if (!$user->existNickname($tagnickname)) {
						$user->register($tagnickname, $tagnickname . "@hotmail.com", "pok", '', false);
					}
					$taguserID = $user->getUserID($tagnickname)['UserID'];

					if (!$tag->existTag($tagname, $estabID, $taguserID)) {
						$tag->addTag($taguserID, $estabID, $tagname);
					}
					//echo $taguserID. ' / ';
				}
			}	
		}

	}
}