<?php
session_start();
include "connectdb.php";

if(!empty($_GET)){
$sql = "SELECT uname FROM users LEFT JOIN questions ON questions.user_id = users.id WHERE questions.question_id='".$_GET['qid']."'";
$result = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($result);
  if($fetch['uname'] != $_SESSION['uname']){
      $sql_p = "SELECT * FROM questions LEFT JOIN USERS ON questions.user_id = users.id WHERE questions.question_id='".$_GET['qid']."'";
      $result_p = mysqli_query($conn, $sql_p);
      if(mysqli_num_rows($result_p)>0){
        while($fetch_p = mysqli_fetch_assoc($result_p)){
          $pvote = "INSERT INTO question_votes (`question_id`,`user_id`,`votes`)  VALUES ('".$fetch_p['question_id']."', '".$fetch_p['user_id']."', -1);"
;
          $query = mysqli_query($conn, $pvote);
          $uid = $_SESSION["uid"];
          echo '<script type="text/javascript">
window.location.href = "question.php?qid='.$_GET["qid"].'";</script>';
        mysqli_close($conn);
        }
      }
      else {
        echo "Error";
      }

  }
  else {
    echo '<script type="text/javascript">
window.location.href = "question.php?qid='.$_GET["qid"].'";</script>';
  mysqli_close($conn);
  }
}


?>
