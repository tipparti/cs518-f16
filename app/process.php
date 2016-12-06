<?php
session_start();
date_default_timezone_set('America/New_York');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
############ Configuration ##############
$config["generate_image_file"]			= true;
$config["generate_thumbnails"]			= true;
$config["image_max_size"] 			= 500; //Maximum image size (height and width)
$config["thumbnail_size"]  			= 200; //Thumbnails will be cropped to 200x200 pixels
$config["thumbnail_prefix"]			= "thumb_"; //Normal thumb Prefix
$config["destination_folder"]			= $_SERVER['DOCUMENT_ROOT'].'/img/uploads/'; //upload directory ends with / (slash)
$config["thumbnail_destination_folder"]		= $_SERVER['DOCUMENT_ROOT'].'/img/uploads/'; //upload directory ends with / (slash)
$config["upload_url"] 				= 'http://tipparti.cs518.cs.odu.edu/img/uploads/';
$config["quality"] 				= 90; //jpeg quality
$config["random_file_name"]			= true; //randomize each file name

echo $_SERVER['DOCUMENT_ROOT'];
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	exit;  //try detect AJAX request, simply exist if no Ajax
}

//specify uploaded file variable
$config["file_data"] = $_FILES["__files"];
$conf = $_FILES["__files"];

//include sanwebe impage resize class
include($_SERVER['DOCUMENT_ROOT']."/app/resize.class.php");
include($_SERVER['DOCUMENT_ROOT']."/db/db.php");

$connection = new  Db();

$today = date('Y-m-d H:i:s', time());
$date = $connection -> quote($today);
//create class instance
$im = new ImageResize($config);

try{
	$responses = $im->resize(); //initiate image resize

	//output thumbnails
	foreach($responses["thumbs"] as $response){
		$imgname = $connection -> quote($response);
		$result = $connection -> query("INSERT INTO `qa_blobs` (`filename`, `userid`, `created`) VALUES (".$imgname.",".$_SESSION['userid'].",".$date.");");
		$get = $connection -> query("UPDATE `qa_users`, (SELECT `blobid`, `userid`,`filename` FROM `qa_blobs`) as table1 SET `avatarblobid`= table1.`blobid` WHERE `qa_users`.`userid`=table1.`userid` AND table1.`filename`=".$imgname.";");
		// echo '<img src="'.$config["upload_url"].$response.'" class="img-thumbnail" title="'.$response.'" />';
	}

	//output images

}catch(Exception $e){
	echo '<script language="javascript">';
	echo 'alert('.$e->getMessage().')';
	echo '</script>';
}


?>
