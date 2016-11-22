<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include $_SERVER['DOCUMENT_ROOT'].'/db/db.php';

$connection = new Db();

$points;

$qpoints = array(
                'qposts' => 2,
                'aselects' => 3 ,
                'qupvotes' =>  1,
                'qdownvotes' => -1,
                'max_qupvotes' => 10,
                'min_qdownvotes' => -3
              );

$apoints = array(
                'aposts' => 4,
                'aselecteds' => 30,
                'aupvotes' => 2 ,
                'adownvotes' => -2,
                'max_aupvotes' => 20,
                'min_adownvotes' => -5 );
$vpoints = array(
                'qvoteds' => 1,
                'avoteds' => 1,
                'upvoteds' => 1,
                'downvoteds' => 1
 );

$newuser = 100;
$mulitpy = 10;


  $qposts = $connection -> select("SELECT COUNT(*) AS count FROM `qa_posts` WHERE `userid` = ".$_SESSION['userid']." AND `type` = 'Q';");
  if(count($qposts) == 1){
  foreach ($qposts as $key => $value) {
    $sql = $connection -> query("UPDATE `qa_userpoints` SET `qposts`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");

  }
}else {
  echo "error1<br/>";
}
  $aselects = $connection -> select("SELECT COUNT(*) AS count FROM `qa_posts` WHERE `selects` = 1 AND `s_userid`=".$_SESSION['userid'].";");
  if(count($aselects) == 1){
  foreach ($aselects as $key => $value) {
    $sql = $connection -> query("UPDATE `qa_userpoints` SET `aselects`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");
  }
}else {
  echo "error2<br/>";
}
  $qupvotes = $connection -> select("SELECT COUNT(*) AS count FROM `qa_uservotes` INNER JOIN `qa_posts` ON `qa_posts`.`postid` = `qa_uservotes`.`postid` WHERE `qa_posts`.`userid`= ".$_SESSION['userid']." AND `vote` = 1 AND `type`='Q' GROUP BY `qa_uservotes`.`postid`");
  if(count($qupvotes) == 1){
  foreach ($qupvotes as $key => $value) {
      $sql = $connection -> query("UPDATE `qa_userpoints` SET `qupvotes`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");
  }
}else {
  echo "error3<br/>";
}
  $qdownvotes = $connection -> select("SELECT COUNT(*) AS count FROM `qa_uservotes` INNER JOIN `qa_posts` ON `qa_posts`.`postid` = `qa_uservotes`.`postid` WHERE `qa_posts`.`userid`= ".$_SESSION['userid']." AND `vote` = -1 AND `type`='Q' GROUP BY `qa_uservotes`.`postid`");
  if(count($qdownvotes) == 1){
  foreach ($qdownvotes as $key => $value) {
    $sql = $connection -> query("UPDATE `qa_userpoints` SET `qdownvotes`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");
  }
}else {
  echo "error4<br/>";
}

//answer
$aposts = $connection -> select("SELECT COUNT(*) AS count FROM `qa_posts` WHERE `userid` = ".$_SESSION['userid']." AND `type` = 'A';");
if(count($aposts) == 1){
foreach ($aposts as $key => $value) {
  $sql = $connection -> query("UPDATE `qa_userpoints` SET `aposts`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");
}
}else {
  echo "error5<br/>";
}
$aselecteds = $connection -> select("SELECT COUNT(*) AS count FROM `qa_posts` WHERE `selects` = 1 AND `userid`=".$_SESSION['userid']." AND `type`='A';");
if(count($aselecteds)== 1){
foreach ($aselecteds as $key => $value) {
  $sql = $connection -> query("UPDATE `qa_userpoints` SET `aselecteds`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");
}
}else {
  echo "error6<br/>";
}

$aupvotes = $connection -> select("SELECT COUNT(*) AS count FROM `qa_uservotes` INNER JOIN `qa_posts` ON `qa_posts`.`postid` = `qa_uservotes`.`postid` WHERE `qa_posts`.`userid`= ".$_SESSION['userid']." AND `vote` = 1 AND `type`='A' GROUP BY `qa_uservotes`.`postid`");
if(count($aupvotes) == 1){
foreach ($aupvotes as $key => $value) {
    $sql = $connection -> query("UPDATE `qa_userpoints` SET `aupvotes`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");
}
}else {
  echo "error7<br/>";
}
$adownvotes = $connection -> select("SELECT COUNT(*) AS count FROM `qa_uservotes` INNER JOIN `qa_posts` ON `qa_posts`.`postid` = `qa_uservotes`.`postid` WHERE `qa_posts`.`userid`= ".$_SESSION['userid']." AND `vote` = -1 AND `type`='A' GROUP BY `qa_uservotes`.`postid`");
if(count($adownvotes) == 1){
foreach ($adownvotes as $key => $value) {
  $sql = $connection -> query("UPDATE `qa_userpoints` SET `adownvotes`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");
}
}else {
  echo "error8<br/>";
}
// votes
$qvoteds = $connection -> select("SELECT COUNT(*) AS count FROM `qa_uservotes` INNER JOIN `qa_posts` ON `qa_posts`.`postid` = `qa_uservotes`.`postid` WHERE `qa_uservotes`.`userid` = ".$_SESSION['userid']." AND `type`= 'Q';");
if(count($qvoteds) == 1){
foreach ($qvoteds as $key => $value) {
  $sql = $connection -> query("UPDATE `qa_userpoints` SET `qvoteds`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");
}
}else {
  echo "error9<br/>";
}

$avoteds = $connection -> select("SELECT COUNT(*) AS count FROM `qa_uservotes` INNER JOIN `qa_posts` ON `qa_posts`.`postid` = `qa_uservotes`.`postid` WHERE `qa_uservotes`.`userid` = ".$_SESSION['userid']." AND `type`= 'A';");
if(count($avoteds) == 1){
foreach ($avoteds as $key => $value) {
  $sql = $connection -> query("UPDATE `qa_userpoints` SET `avoteds`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");
}
}else {
  echo "error10<br/>";
}
$upvoteds = $connection -> select("SELECT COUNT(*) AS count FROM `qa_uservotes` WHERE `userid` = ".$_SESSION['userid']." AND `vote`= 1 GROUP BY postid;");
if(count($upvoteds) == 1){
foreach ($upvoteds as $key => $value) {
  $sql = $connection -> query("UPDATE `qa_userpoints` SET `upvoteds`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");
}
}else {
  echo "error11<br/>";
}

$downvoteds = $connection -> select("SELECT COUNT(*) AS count FROM `qa_uservotes` WHERE `userid` = ".$_SESSION['userid']." AND `vote`=-1 GROUP BY postid;");
if(count($downvoteds) == 1){
foreach ($downvoteds as $key => $value) {
  $sql = $connection -> query("UPDATE `qa_userpoints` SET `downvoteds`=".$value['count']." WHERE `userid` = ".$_SESSION['userid'].";");
}}else {
  echo "error12<br/>";
}

$total = $connection -> select ("SELECT * FROM `qa_userpoints` WHERE `userid` = ".$_SESSION['userid'].";");
if(count($total) == 1){
  foreach ($total as $key => $value) {
  $temp =  $mulitpy * ($qpoints['qposts'] * $value ['qposts']) + $mulitpy * ($qpoints['aselects'] * $value['aselects']) + $mulitpy * ($qpoints['qupvotes'] + $value['qupvotes']) - $mulitpy * ($qpoints['qdownvotes'] * $value['qdownvotes']);
  $temp += $value['points'];
  $temp1 = $mulitpy * ($apoints['aposts'] * $value ['aposts']) + $mulitpy * ($apoints['aselecteds'] * $value['aselecteds']) + $mulitpy * ($apoints['aupvotes'] + $value['aupvotes']) - $mulitpy * ($apoints['adownvotes'] * $value['adownvotes']);
  $tem = $mulitpy * ($vpoints['qvoteds'] * $value['qvoteds']) + $mulitpy * ($vpoints['avoteds'] * $value['avoteds']) + $mulitpy * ($vpoints['upvoteds'] * $value['upvoteds']) - $mulitpy * ($vpoints['downvoteds'] * $value['downvoteds']);
  $tot = $tem + $temp + $temp1;
   $sql = $connection -> query("UPDATE `qa_userpoints` SET `points`=".$tot." WHERE `userid` = ".$_SESSION['userid'].";");
  }}else {
    echo "error12<br/>";
  }
?>
