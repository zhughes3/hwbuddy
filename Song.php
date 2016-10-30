<?php

class Song
{
	private $id;
	private $title;
	private $path;

	public static function create($title, $path) {
		//$mysqli = new mysqli("13lobstersdj.13lobsters.com", "jsdj","djpwBB11","13lobstersdj");
		//require_once 'db_creds.php';
        $host = "mysql.zacharyhughes.com";
		$dbuser = "danche";
		$pass = "brightwolf1";
		$dbname = "hwbuddy";

		$mysqli = new mysqli($host, $dbuser, $pass, $dbname);


		$result = $mysqli->query("SELECT 'Title','Path' FROM songs WHERE Path = '$path'");
		if($result->num_rows <=0){
		$result = $mysqli->query("INSERT INTO songs(id,Title,Path) VALUES (0,'$title','$path')");
		if ($result) {
			$new_id = $mysqli->insert_id;
			return new Song($new_id, $title, $path);
		}
			}
		return null;
	}

	public static function findByID($id) {
		//$mysqli = new mysqli("13lobstersdj.13lobsters.com", "jsdj","djpwBB11","13lobstersdj");
		//require_once 'db_creds.php';
		$host = "mysql.zacharyhughes.com";
		$dbuser = "danche";
		$pass = "brightwolf1";
		$dbname = "hwbuddy";

		$mysqli = new mysqli($host, $dbuser, $pass, $dbname);

		$result = $mysqli->query("select * from songs where id = " . $id);
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			$song_info = $result->fetch_array();
			return new Song($song_info['id'],
					       $song_info['title'],
					       $transaction_info['path']);
		}
		return null;
	}

	private function __construct($id, $title, $path) {
		$this->id = $id;
		$this->title = $title;
		$this->path = $path;
		
	}

	public function getID() {
		return $this->id;
	}


	public function getTitle() {
		// Same caveat as above with owner.
		return $this->title;
	}

	public function getPath() {
		return $this->path;
	}
	public function deleteSong($songName){
    	//$mysqli = new mysqli("13lobstersdj.13lobsters.com", "jsdj","djpwBB11","13lobstersdj");
		//require_once 'db_creds.php';
		$host = "mysql.zacharyhughes.com";
		$dbuser = "danche";
		$pass = "brightwolf1";
		$dbname = "hwbuddy";

		$mysqli = new mysqli($host, $dbuser, $pass, $dbname);

		if ($mysqli->connect_error) {
			echo "died";
			die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
		}
		$result = $mysqli->query("DELETE FROM songs WHERE Title = '$songName'");
		return $result;
	

	}


}