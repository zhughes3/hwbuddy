<?php
$host = "mysql.zacharyhughes.com";
	$dbuser = "danche";
	$pass = "brightwolf1";
	$dbname = "hwbuddy";

class UserSong
{
	private $fbID;
	private $id;
	private $title;
	

	public static function create($fbID, $title) {
		//$mysqli = new mysqli("13lobstersdj.13lobsters.com", "jsdj","djpwBB11","13lobstersdj");
		$mysqli = new mysqli($host, $dbuser, $pass, $dbname);

		$result = $mysqli->query("SELECT 'FBid','Songid' FROM usersong WHERE FBid = '$fbID' && Songid = (SELECT id FROM songs WHERE Title = '$title')");
		if($result->num_rows <= 0){
			$result = $mysqli->query("INSERT INTO usersong(FBid, Songid, Title) VALUES ('$fbID', (SELECT id FROM songs WHERE Title = '$title'), '$title')");
			
		if ($result) {
			$new_id = $mysqli->query("SELECT id FROM songs WHERE Title = '$title'");
			return new UserSong($fbID, $new_id, $title);
		}
			}
								
		return null;
	}

	public static function findByID($id) {
		//$mysqli = new mysqli("13lobstersdj.13lobsters.com", "jsdj","djpwBB11","13lobstersdj");
		$mysqli = new mysqli($host, $dbuser, $pass, $dbname);
		$result = $mysqli->query("Select Title FROM usersong WHERE FBid='$id'");
			if ($result->num_rows == 0){
				return null;
			}
			return $result;
		
	}
	

	private function __construct($fbID, $id, $title) {
		$this->id = $id;
		$this->fbID = $fbID;
		$this->title = $title;
		
	}

	public function getID() {
		return $this->id;
	}


	public function getfbID() {
		// Same caveat as above with owner.
		return $this->fbID;
	}

	public function getTitle() {
		return $this->title;
	}


	public static function getSongs() {
		$id = $this->fbID;
		//$mysqli = new mysqli("13lobstersdj.13lobsters.com", "jsdj","djpwBB11","13lobstersdj");
		$mysqli = new mysqli($host, $dbuser, $pass, $dbname);
		$result = $mysqli->query("Select Title FROM usersong WHERE FBid='$id'");
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			return $result;
		}
		return null;
	}
	
	public function deleteSong($songName){
		//$mysqli = new mysqli("13lobstersdj.13lobsters.com", "jsdj","djpwBB11","13lobstersdj");
		$mysqli = new mysqli($host, $dbuser, $pass, $dbname);
		if ($mysqli->connect_error) {
			echo "died";
			die('Connect Error (' . $mysqli->connect_errno . ') '
	            . $mysqli->connect_error);}
			$result = $mysqli->query("DELETE FROM usersong WHERE Songid = (SELECT id FROM songs WHERE Title = '$songName')");
			return $result;

		}
}
?>