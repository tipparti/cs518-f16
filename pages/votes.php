<?php
include ($_SERVER['DOCUMENT_ROOT']."/pages/header.php");
include ("navbar.php");
include ($_SERVER['DOCUMENT_ROOT']."/db/db.php");
$connection = new Db();
if($_POST['qa_vote'] == 'qa_upvote'){
$postid = $connection -> quote($_POST['qa_upvoteid']);
$userid = $connection -> quote($_SESSION['userid']);
$result = $connection -> select("SELECT * FROM `qa_uservotes` WHERE `postid`=".$postid." AND `userid`=".$userid.";");
$val = (int)count($result);
  if ($val == 0){
    $sql = $connection -> query("INSERT INTO `qa_uservotes` (`postid`,`userid`,`vote`) VALUES(".$postid.",".$userid.",'1');");
    $votecount = $connection -> query("UPDATE `qa_posts` AS table1 JOIN (SELECT SUM(`vote`) AS votecount, postid  FROM `qa_uservotes` GROUP BY postid) AS table2 ON  table2.`postid` = table1.`postid` SET table1.`netvotes` = table2.`votecount`;");
    $bd = $_POST['qa_upvoteid'];
    echo '<script type="text/javascript">
            window.location.href = "/pages/questions.php?qa='.$bd.'";
      </script>';
  }elseif($val == 1){
    foreach ($result as $key => $value) {
      if($value['vote'] == 0 || $value['vote'] == -1){
        $sql = $connection -> query("UPDATE `qa_uservotes` SET `vote` = '1' WHERE `postid`=".$postid." AND `userid`=".$userid.";");
      }
      else{
        $sql = $connection -> query("UPDATE `qa_uservotes` SET `vote` = '0' WHERE `postid`=".$postid." AND `userid`=".$userid.";");
      }
    }
    $votecount = $connection -> query("UPDATE `qa_posts` AS table1 JOIN (SELECT SUM(`vote`) AS votecount, postid  FROM `qa_uservotes` GROUP BY postid) AS table2 ON  table2.`postid` = table1.`postid` SET table1.`netvotes` = table2.`votecount`;");
    $bd = $_POST['qa_upvoteid'];
    echo '<script type="text/javascript">
            window.location.href = "/pages/questions.php?qa='.$bd.'";
      </script>';
  }else {
    echo "error_reporting";
  }
}else if($_POST['qa_vote'] == 'qa_dnvote'){
  $postid = $connection -> quote($_POST['qa_dnvoteid']);
  $userid = $connection -> quote($_SESSION['userid']);
  $result = $connection -> select("SELECT * FROM `qa_uservotes` WHERE `postid`=".$postid." AND `userid`=".$userid.";");
  $val = (int)count($result);
    if ($val == 0){
      $sql = $connection -> query("INSERT INTO `qa_uservotes` (`postid`,`userid`,`vote`) VALUES(".$postid.",".$userid.",'-1');");
      $votecount = $connection -> query("UPDATE `qa_posts` AS table1 JOIN (SELECT SUM(`vote`) AS votecount, postid  FROM `qa_uservotes` GROUP BY postid) AS table2 ON  table2.`postid` = table1.`postid` SET table1.`netvotes` = table2.`votecount`;");
      $bd = $_POST['qa_dnvoteid'];
      echo '<script type="text/javascript">
              window.location.href = "/pages/questions.php?qa='.$bd.'";
        </script>';
    }elseif($val == 1){
      foreach ($result as $key => $value) {
        if($value['vote'] == 0 || $value['vote'] == 1){
          $sql = $connection -> query("UPDATE `qa_uservotes` SET `vote` = '-1' WHERE `postid`=".$postid." AND `userid`=".$userid.";");
        }
        else{
          $sql = $connection -> query("UPDATE `qa_uservotes` SET `vote` = '0' WHERE `postid`=".$postid." AND `userid`=".$userid.";");
        }
      }
      $votecount = $connection -> query("UPDATE `qa_posts` AS table1 JOIN (SELECT SUM(`vote`) AS votecount, postid  FROM `qa_uservotes` GROUP BY postid) AS table2 ON  table2.`postid` = table1.`postid` SET table1.`netvotes` = table2.`votecount`;");
      $bd = $_POST['qa_dnvoteid'];
       echo '<script type="text/javascript">
              window.location.href = "/pages/questions.php?qa='.$bd.'";
        </script>';
    }else {
      echo "error_reporting";
    }
}else if($_POST['a_vote'] == 'a_upvote'){
  $postid = $connection -> quote($_POST['a_upvoteid']);
  $userid = $connection -> quote($_SESSION['userid']);
  $result = $connection -> select("SELECT * FROM `qa_uservotes` WHERE `postid`=".$postid." AND `userid`=".$userid.";");
  $val = (int)count($result);
    if ($val == 0){
      $sql = $connection -> query("INSERT INTO `qa_uservotes` (`postid`,`userid`,`vote`) VALUES(".$postid.",".$userid.",'1');");
      $votecount = $connection -> query("UPDATE `qa_posts` AS table1 JOIN (SELECT SUM(`vote`) AS votecount, postid  FROM `qa_uservotes` GROUP BY postid) AS table2 ON  table2.`postid` = table1.`postid` SET table1.`netvotes` = table2.`votecount`;");
      $bd=$_POST['qa_voteid'];
      echo '<script type="text/javascript">
               window.location.href = "/pages/questions.php?qa='.$bd.'";
        </script>';
    }elseif($val == 1){
      foreach ($result as $key => $value) {
        if($value['vote'] == 0 || $value['vote'] == -1){
          $sql = $connection -> query("UPDATE `qa_uservotes` SET `vote` = '1' WHERE `postid`=".$postid." AND `userid`=".$userid.";");
        }
        else{
          $sql = $connection -> query("UPDATE `qa_uservotes` SET `vote` = '0' WHERE `postid`=".$postid." AND `userid`=".$userid.";");
        }
      }
      $votecount = $connection -> query("UPDATE `qa_posts` AS table1 JOIN (SELECT SUM(`vote`) AS votecount, postid  FROM `qa_uservotes` GROUP BY postid) AS table2 ON  table2.`postid` = table1.`postid` SET table1.`netvotes` = table2.`votecount`;");
      $bd = $_POST['qa_voteid'];
       echo '<script type="text/javascript">
              window.location.href = "/pages/questions.php?qa='.$bd.'";
        </script>';
    }else {
      echo "error_reporting";
    }
}else if($_POST['a_vote'] == 'a_dnvote'){
  $postid = $connection -> quote($_POST['a_dnvoteid']);
  $userid = $connection -> quote($_SESSION['userid']);
  $result = $connection -> select("SELECT * FROM `qa_uservotes` WHERE `postid`=".$postid." AND `userid`=".$userid.";");
  $val = (int)count($result);
  $bd = $_POST['qa_voteid'];

    if ($val == 0){
      $sql = $connection -> query("INSERT INTO `qa_uservotes` (`postid`,`userid`,`vote`) VALUES(".$postid.",".$userid.",'-1');");
      $votecount = $connection -> query("UPDATE `qa_posts` AS table1 JOIN (SELECT SUM(`vote`) AS votecount, postid  FROM `qa_uservotes` GROUP BY postid) AS table2 ON  table2.`postid` = table1.`postid` SET table1.`netvotes` = table2.`votecount`;");
      echo '<script type="text/javascript">
               window.location.href = "/pages/questions.php?qa='.$bd.'";
        </script>';
    }else {
      foreach ($result as $key => $value) {
        $aid = $_POST['qa_voteid'];
        if($value['vote'] == 0 || $value['vote'] == 1){
            $sql = $connection -> query("UPDATE `qa_uservotes` SET `vote` = '-1' WHERE `postid`=".$postid." AND `userid`=".$userid.";");
          }
          else{
            $sql = $connection -> query("UPDATE `qa_uservotes` SET `vote` = '0' WHERE `postid`=".$postid." AND `userid`=".$userid.";");
          }
          $votecount = $connection -> query("UPDATE `qa_posts` AS table1 JOIN (SELECT SUM(`vote`) AS votecount, postid  FROM `qa_uservotes` GROUP BY postid) AS table2 ON  table2.`postid` = table1.`postid` SET table1.`netvotes` = table2.`votecount`;");
      }
       echo '<script type="text/javascript">
              window.location.href = "/pages/questions.php?qa='.$bd.'";
        </script>';
    }
}
else {
  echo "error";
}
?>
