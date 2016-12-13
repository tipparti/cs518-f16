<?php
session_start();
include ("header.php");
include ("navbar.php");
include ("../db/db.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$connection = new Db();
$today = date('Y-m-d H:i:s', time());
$date = $connection -> quote($today);

   // MySQL datetime format

if($_GET['type'] == 'login'){
  if (!empty($_POST)){
    $secret="6LdZcQ4UAAAAANgBixkVus-hjd52M8pW4nwuovb7";
    $name = $connection -> quote($_POST['handle']);
    $handle = $connection -> quote(md5($_POST['password']));
    $response = $_POST["g-recaptcha-response"];
    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
    $captcha_success = json_decode($verify);
    // $default = "https://www.gravatar.com/avatar/";
    // $size = 200;
    if ($captcha_success->success==false) {
      echo '<script type="text/javascript">
      window.location.href = "/pages/login.php?check=recaptcha";
      </script>';	}
	else if ($captcha_success->success==true) {
    $validate = $connection -> select("SELECT userid, handle, email  FROM qa_users WHERE `handle`=".$name." and `passcheck`=".$handle.";");
    if (count($validate) === 1){
      foreach ($validate as $key => $value) {
      $_SESSION['name'] = stripslashes($value['handle']);
      $_SESSION['userid'] = $value['userid'];
      // $hash = $connection -> quote(md5( strtolower( trim( $value['email'] ) ) ));
      // $grav_url = $connection -> quote("https://www.gravatar.com/avatar/" . md5( strtolower( trim( $value['email'] ) ) ) ."?d=" . urlencode( $default ) . "&s=" . $size);
      // $gravatar = $connection -> query("INSERT INTO `qa_blobs`(`filename`, `userid`, `gravatar`, `created`) VALUES (".$grav_url.",".$_SESSION['userid'].",1,".$date.");");
      // $get = $connection -> query("UPDATE `qa_users`, (SELECT `blobid`, `userid`,`filename` FROM `qa_blobs`) as table1 SET `avatarblobid`= table1.`blobid` WHERE `qa_users`.`userid`=table1.`userid` AND table1.`filename`=".$grav_url.";");
      echo '<script type="text/javascript">
      window.location.href = "/";
      </script>';
    }
    }
    else{
      echo '<script type="text/javascript">
      window.location.href = "/pages/login.php?check=invalid";
      </script>';
    }}
  }

}
 else if($_GET['type'] == 'register'){
     if (!empty($_POST)){
       $name = $connection -> quote($_POST['username']);
       $email = $connection -> quote($_POST['email']);
       $handle = $connection -> quote(md5($_POST['password']));
       $secret = '6LdNcg4UAAAAAANlK7GMrsAd3UN8J8k0M3NLMl2_';
       $response = $_POST["g-recaptcha-response"];
       $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
       $captcha_success = json_decode($verify);
       if ($captcha_success->success==false) {
         echo '<script type="text/javascript">
         window.location.href = "/pages/login.php?check=recaptcha";
         </script>';
       }
       else if ($captcha_success->success==true) {
         $default = "https://www.gravatar.com/avatar/";
         $size = 200;


       $check = $connection -> select("SELECT * FROM qa_users WHERE `handle`=".$name." OR `email`=".$email.";");
       if (count($check) == 0){
        $result = $connection -> query("INSERT INTO `qa_users` (`created`, `email`, `handle`, `passcheck`, `loggedin`) VALUES (".$date.", ".$email.", ".$name.", ".$handle.", ".$date.");");
        $_SESSION['name'] = stripslashes($_POST['username']);
        $validate = $connection -> select("SELECT userid, handle, email FROM qa_users WHERE `handle`=".$name.";");
        if (count($validate) == 1){
          foreach ($validate as $key => $value) {
          $_SESSION['name'] = stripslashes($value['handle']);
          $_SESSION['userid'] = $value['userid'];
          // echo $value['email'];
          // echo  md5( strtolower( trim( $value['email'] ) ) );
          // echo "-";
          // echo md5($value['email']);
          $hash = $connection -> quote(md5( strtolower( trim( $value['email'] ) ) ));
          $grav_url =$connection -> quote("https://www.gravatar.com/avatar/".md5( strtolower( trim( $value['email'] ) ) )."?d=".urlencode( $default )."&s=".$size);
          $gravatar = $connection -> query("INSERT INTO `qa_blobs`(`filename`, `userid`, `gravatar`, `created`) VALUES (".$grav_url.",".$_SESSION['userid'].",1,".$date.");");
          $point = $connection -> query("INSERT INTO `qa_userpoints`(`userid`, `points`) VALUES (".$value['userid'].", 100);");
          echo '<script type="text/javascript">
          window.location.href = "/";
          </script>';
        }
        }
        }
        else {
           echo '<script type="text/javascript">
           window.location.href = "/pages/login.php?check=exists";
           </script>';
     }
   }
   }else {
     include 'check.php';
   }
} else {
  echo 	'check';
}
 ?>
