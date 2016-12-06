<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/db/db.php';

$connection = new Db();

$like = $_REQUEST["searchall"];

$query = $connection -> SELECT("SELECT `qa_users`.`userid`, `handle`, `filename` FROM `qa_users` LEFT JOIN `qa_blobs` ON `qa_users`.`userid` = `qa_blobs`.`userid` WHERE `handle` LIKE '%".$like."%' GROUP BY `qa_users`.`userid`");

$sql = $connection -> SElECT("");

$str = '';

if (count($query) == 0) {
  echo '<div class="col-md-6 col-md-push-4">
        <img src="/img/kicklow-dribbble-18.png" class="img-responsive">
        </div>';
}else{

  foreach ($query as $key => $value) {
   $str = $str.'<a class="dummy-media-object" href="/pages/users.php?handle='.$value['handle'].'">
       <img class="round" src="/img/uploads/'.$value['filename'].'" alt="'.$value['handle'].'"/>
       <h3>'.$value['handle'].'</h3></a>';
  }


  echo '<div class="dummy-column" name="people" id="people">
  <h2>People</h2>'.$str.'
 </div>
  <div class="dummy-column" name="content" id="content"> <h2>Related Questions</h2>
  <img src="/img/kicklow-dribbble-18.png" class="img-responsive">
  </div>';
}
 ?>
