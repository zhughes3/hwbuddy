<?php
$host = "mysql.zacharyhughes.com";
	$dbuser = "danche";
	$pass = "brightwolf1";
	$dbname = "hwbuddy";

class User
{
	private $id;
	private $fbID;
	private $name;
	

	public static function create($fbID, $name) {
		//$mysqli = new mysqli("13lobstersdj.13lobsters.com", "jsdj","djpwBB11","13lobstersdj");
		

		$mysqli = new mysqli($host, $dbuser, $pass, $dbname);
		$result = $mysqli->query("SELECT 'FBid','name' FROM user WHERE FBid = '$fbID' && name = '$name'");
		if($result->num_rows <= 0){
			$result = $mysqli->query("INSERT INTO user(id, FBid, name) VALUES (0,'$fbID', '$name')");
		if ($result) {
			$new_id = $mysqli->insert_id;
			return new User($new_id, $fbID, $name);
		}
			}				
		return null;
	}

	public static function findByID($id) {
		//$mysqli = new mysqli("13lobstersdj.13lobsters.com", "jsdj","djpwBB11","13lobstersdj");
		$mysqli = new mysqli($host, $dbuser, $pass, $dbname);
		$result = $mysqli->query("select * from user where fbid = " . $id);
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			$song_info = $result->fetch_array();
			return new User($song_info['id'],
					       $song_info['fbid'],
					       $transaction_info['name']);
		}
		return null;
	}

	private function __construct($id, $fbID, $name) {
		$this->id = $id;
		$this->fbID = $fbID;
		$this->name = $name;
		
	}

	public function getID() {
		return $this->id;
	}


	public function getfbID() {
		// Same caveat as above with owner.
		return $this->fbID;
	}

	public function getName() {
		return $this->name;
	}
	public static function getSong() {
		//$mysqli = new mysqli("13lobstersdj.13lobsters.com", "jsdj","djpwBB11","13lobstersdj");
		$mysqli = new mysqli($host, $dbuser, $pass, $dbname);
		$result = $mysqli->query("select * from userSong where fbid = " . $fbID);
		$result = $mysqli->query("select * from user where fbid = " . $fbID);
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			return $result;
		}
		return null;
	}


	private function update() {
		//$mysqli = new mysqli("classroom.cs.unc.edu", "kmp", "comp426", "comp426fall14db");
		$mysqli = new mysqli($host, $dbuser, $pass, $dbname);
		$result = $mysqli->query("update Transaction set price = " . $this->price . " where id = " . $this->id);
		return $result;
	}

}
?>