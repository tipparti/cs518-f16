<?php
session_start();
include ("header.php");
include ("navbar.php");
include_once '../db/db.php';

if(!empty($_POST)){

  $connection = new Db();
  $comma_separated = implode("," , $_POST['taggone']);
  $format = '';
  $tags = $connection -> quote($comma_separated);
  $userid = $connection -> quote($_SESSION['userid']);
  $title = $connection -> quote(htmlentities($_POST['InputTitle']));
  $content = $connection -> quote($_POST['InputContent']);
  $today = date('Y-m-d H:i:s', time());
  $date = $connection -> quote($today);
  if(strip_tags($_POST['InputTitle'])){
    $format = $connection -> quote('html');
  }

  $result = $connection -> query("INSERT INTO `qa_posts` (`type`, `userid`, `format`, `created`, `title`, `content`,`tags`) VALUES ('Q',".$userid.", ".$format.", ".$date.", ".$title.", ".$content.",".$tags.");");
  $datecheck = $connection -> select("SELECT * FROM `qa_posts` WHERE `created`=".$date.";");
  $check = $connection -> select("SELECT `postid` FROM `qa_posts` WHERE `userid`=".$_SESSION['userid']."  AND `created`=".$date." AND `type`= 'Q';");
  if ($check == true){
    $postid;
    foreach ($check as $key => $value) {
      $postid = $value['postid'];
    }
  foreach ($_POST['taggone'] as $key => $value) {
    $word = $connection -> quote($value);
    $chkwords = $connection -> select("SELECT * FROM `qa_words` WHERE `word`=".$word.";");
    if (count($chkwords) == 0) {
      $wordsql = $connection -> query("INSERT INTO `qa_words`(`word`) VALUES (".$word.");");
      $tagword = $connection -> query("INSERT INTO `qa_tagwords`(`postid`, `wordid`) SELECT ".$postid.", `wordid` FROM `qa_words` WHERE `word`=".$word.";");
    }else{
      $tagword = $connection -> query("INSERT INTO `qa_tagwords`(`postid`, `wordid`) SELECT ".$postid.", `wordid` FROM `qa_words` WHERE `word`=".$word.";");
    }
    if (stripos($_POST['InputTitle'], $value) !== false) {
      $postword = $connection -> query("INSERT INTO `qa_posttags` (`postid`, `wordid`, `postcreated`) SELECT ".$postid.", `wordid`, ".$date." FROM `qa_words` WHERE `word`=".$word.";");
    }
  }
  echo '<script type="text/javascript">
  window.location.href = "/pages/questions.php?qa='.$postid.'";
  </script>';

  }
}

 ?>
