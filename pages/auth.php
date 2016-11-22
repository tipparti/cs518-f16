<?php
session_start();
include ("header.php");
include ("navbar.php");
include ("../db/db.php");

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$connection = new Db();
$today = date('Y-m-d H:i:s', time());
$date = $connection -> quote($today);

   // MySQL datetime format
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_GET['type'] == 'login'){
  if (!empty($_POST)){
    $name = $connection -> quote($_POST['handle']);
    $handle = $connection -> quote(md5($_POST['password']));
    $validate = $connection -> select("SELECT userid, handle  FROM qa_users WHERE `handle`=".$name." and `passcheck`=".$handle.";");
    if (count($validate) === 1){
      foreach ($validate as $key => $value) {
      $_SESSION['name'] = stripslashes($value['handle']);
      $_SESSION['userid'] = $value['userid'];
      echo '<script type="text/javascript">
      window.location.href = "/";
      </script>';
    }
    }
    else{
      echo '<script type="text/javascript">
      window.location.href = "/pages/login.php?check=invalid";
      </script>';
    }
  }

}
 else if($_GET['type'] == 'register'){
     if (!empty($_POST)){
       $name = $connection -> quote($_POST['username']);
       $email = $connection -> quote($_POST['email']);
       $handle = $connection -> quote(md5($_POST['password']));
       $check = $connection -> select("SELECT * FROM qa_users WHERE `handle`=".$name." OR `email`=".$email.";");
       if (count($check) == 0){
        $result = $connection -> query("INSERT INTO `qa_users` (`created`, `email`, `handle`, `passcheck`, `loggedin`) VALUES (".$date.", ".$email.", ".$name.", ".$handle.", ".$date.");");
        $_SESSION['name'] = stripslashes($_POST['username']);
        $validate = $connection -> select("SELECT userid, handle FROM qa_users WHERE `handle`=".$name.";");
        if (count($validate) == 1){
          foreach ($validate as $key => $value) {
          $_SESSION['name'] = stripslashes($value['handle']);
          $_SESSION['userid'] = $value['userid'];
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
   }else {
     include 'check.php';
   }
} else {
  echo 	'check';
}
 ?>
