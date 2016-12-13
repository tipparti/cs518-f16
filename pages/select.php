<?php
include ($_SERVER['DOCUMENT_ROOT']."/pages/header.php");
include ("navbar.php");
include ($_SERVER['DOCUMENT_ROOT']."/db/db.php");
$connection = new Db();

if(isset($_POST)){

  // echo $_POST['ans_id'];
  // echo  $_POST['qa'];
  $ans_id = $connection -> quote($_POST['ans_id']);
  $qa = $connection -> quote($_POST['qa']);

  $sql = $connection -> select("SELECT * FROM `qa_posts` WHERE `postid` =".$qa);
  $flagid;
  foreach ($sql as $key => $val) {
    $flagid = $val['flag_id'];
  }
  if ($flagid != $_POST['ans_id']) {
    $query = $connection -> query("UPDATE `qa_posts` SET `flag_id`=".$ans_id." WHERE `postid`=".$qa.";");
    $ans = $connection -> query("UPDATE `qa_posts` SET `flagged`=1 WHERE `postid`=".$ans_id.";");
    $chk = $connection -> query("UPDATE `qa_posts` SET `flagged`=0 WHERE `postid`=".$flagid.";");
  }else {
  foreach ($sql as $key => $value) {
    $flag_id = $connection -> quote($value['flag_id']);
    if ($flag_id == $ans_id) {
      $query = $connection -> query("UPDATE `qa_posts` SET `flag_id`=0 WHERE `postid`=".$qa.";");
      $ans = $connection -> query("UPDATE `qa_posts` SET `flagged`=0 WHERE `postid`=".$ans_id.";");
    }
  }
}
$bd = $_POST['qa'];
echo '<script type="text/javascript">
        window.location.href = "/pages/questions.php?qa='.$bd.'";
  </script>';
}
?>
