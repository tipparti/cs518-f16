<?php
session_start();
include ("header.php");
include ("navbar.php");
include_once $_SERVER['DOCUMENT_ROOT'].'/db/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/app/time.php';
date_default_timezone_set('America/New_York');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$connection = new Db();
$today = date('Y-m-d H:i:s', time());
$date = $connection -> quote($today);
$query = $connection -> select("SELECT `userid`, `created`, `email`, `handle`, `avatarblobid` FROM `qa_users` WHERE `userid`=".$_SESSION['userid']);
$email;
foreach ($query as $key => $value) {
  $email = $value['email'];
}

if (isset($_POST) && $_POST['type'] == 'gravatar') {

  $default = "https://www.gravatar.com/avatar/";
  $size = 200;
  $hash = $connection -> quote(md5( strtolower( trim( $email ) ) ));
  $grav_url =$connection -> quote("https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) ."?d=".urlencode( $default )."&s=" . $size);

  $check = $connection -> select("SELECT `blobid`, `filename`, `userid`, `gravatar` FROM `qa_blobs` WHERE `filename`=".$grav_url.";");
  if (count($check) == 0) {
    $result = $connection -> query("INSERT INTO `qa_blobs`(`filename`, `userid`, `gravatar`, `created`) VALUES (".$grav_url.",".$_SESSION['userid'].",1,".$date.");");
  }
  $get = $connection -> query("UPDATE `qa_users`, (SELECT `blobid`, `userid`,`filename` FROM `qa_blobs`) as table1 SET `avatarblobid`= table1.`blobid` WHERE `qa_users`.`userid`=table1.`userid` AND table1.`filename`=".$grav_url.";");

  echo '<script type="text/javascript">
  window.location.href = "/pages/profile.php";
  </script>';
} elseif (isset($_POST) && $_POST['type'] == 'reset')  {
  $hash = $connection -> quote(md5( strtolower( trim( $email ) ) ));
  $get = $connection -> query("UPDATE `qa_users`, (SELECT `blobid`, `userid`,`filename` FROM `qa_blobs`) as table1 SET `avatarblobid`= table1.`blobid` WHERE `qa_users`.`userid`=table1.`userid` AND table1.`filename`!=".$hash.";");
  echo '<script type="text/javascript">
  window.location.href = "/pages/profile.php";
  </script>';
}
 ?>
