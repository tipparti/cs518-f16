<?php
session_start();


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

function getimg($url) {
    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';
    $headers[] = 'Connection: Keep-Alive';
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
    $user_agent = 'php';
    $process = curl_init($url);
    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($process, CURLOPT_HEADER, 0);
    curl_setopt($process, CURLOPT_USERAGENT, $user_agent); //check here
    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
    $return = curl_exec($process);
    curl_close($process);
    return $return;
}


$clientId = "332ee047993e8908ad81";
$clientSecret = "90f90533343d94fa6bca81bdf8da5402b7219ac7";
$redirect_url = 'http://tipparti.cs518.cs.odu.edu/pages/github.php';
$ROOTURI = "http://tipparti.cs518.cs.odu.edu/index.php";
//
// $redirect_url = 'http://localhost/pages/github.php';
// $ROOTURI = 'http://localhost/';


//get request , either code from github, or login request
//authorised at github
if(isset($_GET['code'])) {
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL,"https://github.com/login/oauth/access_token");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,
    http_build_query(array(
      'code' => $_GET['code'],
      'client_id' => $clientId,
      'client_secret' => $clientSecret
    ))
  );
  curl_setopt($ch, CURLOPT_HTTPHEADER,array("Accept: application/json"));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $server_output = curl_exec ($ch);
  curl_close ($ch);

  $json = json_decode($server_output,true);

  if( !$json ||
    !isset($json['access_token']) ||
    strpos($json['access_token'],' ') !== FALSE){
      require_once $_SERVER['DOCUMENT_ROOT'].'/pages/header.php';
      require_once $_SERVER['DOCUMENT_ROOT'].'/pages/navbar.php';
      echo '<div class="container">
        <div class="row">
          <div class="col-md-4">
                  <div class="msg msg-danger msg-danger-text"> <span class="glyphicon glyphicon-exclamation-sign"></span>';
      echo "Bad access token. <a href='$ROOTURI'>Reload the page.</a> Try again.  </div>
  </div>
</div>";die();
      require_once $_SERVER['DOCUMENT_ROOT'].'/pages/footer.php';

    }

  $accessToken = json_decode($server_output,true)["access_token"];


$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.github.com/user?access_token='.$accessToken,
    CURLOPT_USERAGENT => 'Q&A',
    CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded","Accept: application/json")
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

$git = json_decode($resp,true);
// echo $resp;
// echo $git["name"];
// echo $git["avatar_url"];
// $_SESSION['name'] = $git["login"];

require_once $_SERVER['DOCUMENT_ROOT'].'/pages/header.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/pages/navbar.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/db/db.php';

$connection = new Db();

$today = date('Y-m-d H:i:s', time());
$date = $connection -> quote($today);

$name = $connection -> quote($git['login']);
$email = $connection -> quote($git['email']);
$handle = $connection -> quote(md5($git['email']));

$check = $connection -> select("SELECT * FROM qa_users WHERE `handle`=".$name." OR `email`=".$email.";");
if (count($check) == 0){
 $result = $connection -> query("INSERT INTO `qa_users` (`created`, `email`, `handle`, `passcheck`, `loggedin`) VALUES (".$date.", ".$email.", ".$name.", ".$handle.", ".$date.");");
 $validate = $connection -> select("SELECT userid, handle FROM qa_users WHERE `handle`=".$name.";");

 $imgurl = $git['avatar_url'];
 $imagename= $git['id'];
 if(file_exists($_SERVER['DOCUMENT_ROOT'].'/img/uploads/'.$imagename.'.jpg')){continue;}
 $image = getimg($imgurl);
 file_put_contents($_SERVER['DOCUMENT_ROOT'].'/img/uploads/'.$imagename.'.jpg',$image);
 if (count($validate) == 1){
   foreach ($validate as $key => $value) {
   $_SESSION['name'] = stripslashes($value['handle']);
   $_SESSION['userid'] = $value['userid'];
   $imgname = $connection -> quote($imagename.'.jpg');
   $result = $connection -> query("INSERT INTO `qa_blobs` (`filename`, `userid`, `created`) VALUES (".$imgname.",".$_SESSION['userid'].",".$date.");");
   $get = $connection -> query("UPDATE `qa_users`, (SELECT `blobid`, `userid`,`filename` FROM `qa_blobs`) as table1 SET `avatarblobid`= table1.`blobid` WHERE `qa_users`.`userid`=table1.`userid` AND table1.`filename`=".$imgname.";");
   $point = $connection -> query("INSERT INTO `qa_userpoints`(`userid`, `points`) VALUES (".$value['userid'].", 100);");
   echo '<script type="text/javascript">
   window.location.href = "/";
   </script>';
 }
 }
 }
 else {
   $validate = $connection -> select("SELECT userid, handle FROM qa_users WHERE `handle`=".$name.";");
   if (count($validate) == 1){
     foreach ($validate as $key => $value) {
     $_SESSION['name'] = stripslashes($value['handle']);
     $_SESSION['userid'] = $value['userid'];
     echo '<script type="text/javascript">
     window.location.href = "/";
     </script>';
   }
   }
}
} else {
  $url = "https://github.com/login/oauth/authorize?client_id=$clientId&redirect_uri=$redirect_url&scope=user";
  header("Location: $url");
}
?>
