<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'] . '/hwbuddy/Song.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/hwbuddy/User.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/hwbuddy/UserSong.php');
function check_file_is_audio( $tmp ) 
{
    $allowed = array(
        'audio/mpeg', 'audio/x-mpeg', 'audio/mpeg3', 'audio/x-mpeg-3', 'audio/aiff', 
        'audio/mid', 'audio/x-aiff', 'audio/x-mpequrl','audio/midi', 'audio/x-mid', 
        'audio/x-midi','audio/wav','audio/x-wav','audio/xm','audio/x-aac','audio/basic',
        'audio/flac','audio/mp4','audio/x-matroska','audio/ogg','audio/s3m','audio/x-ms-wax',
        'audio/xm'
    );
    
    // check REAL MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $type = finfo_file($finfo, $tmp );
    finfo_close($finfo);
    
    // check to see if REAL MIME type is inside $allowed array
    if( in_array($type, $allowed) ) {
        return true;
    } else {
        return false;
    }
}


function mime_content_type($filename) {

        $mime_types = array(

            // audio/video
            'mp3' => 'audio/mpeg',

        );

        $ext = strtolower(array_pop(explode('.',$filename)));
        if (array_key_exists($ext, $mime_types)) {
            return true;
        }
        else {
            return false;
    }
}





error_reporting(E_ERROR | E_PARSE);

require_once 'db_creds.php';


//echo "cookie is : " . $_COOKIE['FBname'];
$user_name = $_COOKIE['FBname'];
$user_id = $_COOKIE['FBid'];



//echo "user id is: " . $user_id . "...";

//$target_dir = "/JavaScriptDJ/mp3Files/ ";
//echo "current server directory is" . $_SERVER['DOCUMENT_ROOT'];
$target_dir = "http://zacharyhughes.com/hwbuddy/uploads/";
$server_target_dir = $_SERVER['DOCUMENT_ROOT'] . "/hwbuddy/uploads/";
//"http://wwwp.cs.unc.edu/Courses/comp426-f15/users/dlshaver/Codiad/workspace/cs426/DJProject/mp3Files/";
$_FILES["fileToUpload"]["name"] = preg_replace("/[^a-zA-Z0-9-_.]/", " ", $_FILES["fileToUpload"]["name"]);
//echo "uploading..".$_FILES["fileToUpload"]["name"]."...";


$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$server_target_file = $server_target_dir.basename($_FILES["fileToUpload"]["name"]);
//echo $target_file;
$name = $_FILES["fileToUpload"]["name"];
$size = $_FILES["fileToUpload"]["size"];


//if(mime_content_type($name)){
//	echo "these are audio files";
//}
//else{
//	echo "these are not audio files";
//}


	
	
if($name !=""){
	pathinfo($target_file,"mp3");
	if(mime_content_type($name)){
	// Check if image file is a actual image or fake image
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $server_target_file)) {
		//if(move_uploaded_file($name, $server_target_file)){
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		} else {
		   // echo "Sorry, there was an error uploading your file.";
		}
		Song::create($name, $target_file);
		
		//adding user....
		//User::create($user_id, $user_name);
		//adding relational database entry...
		//UserSong::create($user_id,$name);
		
		
	}	
}
    //$result = UserSong::findByID($user_id);
	//$rows = $result->num_rows;
	//if($rows>0){
	//	for($i = 0;$i<$rows;$i++){
	//	$array = $result->fetch_array();
	//  echo " <p id ='$array[0]' onclick='selected(this)'> $array[0] </p>";
	//	}
	//}
	//else{
	//	
	//	echo "You don't have any songs uploaded yet.";
	//}
	
	/*$result = $conn->query("Select Title FROM usersong WHERE FBid='$user_id'");
	$rows = $result->num_rows;
	if($rows>0){
		for($i = 0;$i<$rows;$i++){
		$array = $result->fetch_array();
	  echo " <p id ='$array[0]' onclick='selected(this)'> $array[0] </p>";
		}
	}
	else{
		echo "You don't have any songs uploaded yet.";
	}*/

	//$result = $conn->query("INSERT INTO song (Title,Path) VALUES '$name','$target_file'");


?>