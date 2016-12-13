<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/db/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/nbbc/nbbc.php';
$bbcode = new BBCode;


$connection = new Db();

$like = $_REQUEST["searchall"];

$query = $connection -> SELECT("SELECT `qa_users`.`userid`, `handle`, `filename`, `gravatar` FROM `qa_users` LEFT JOIN `qa_blobs` ON `qa_users`.`userid` = `qa_blobs`.`userid` WHERE `handle` LIKE '".$like."%' GROUP BY `qa_users`.`userid`");

$sql = $connection -> SELECT("SELECT `postid`, `type`, `title`, `content` FROM `qa_posts` WHERE `title` LIKE '%".$like."%' OR `content` LIKE '%".$like."%'  GROUP BY `title`");

$tag = $connection -> SELECT("SELECT `word` FROM `qa_words` WHERE `word` LIKE '%".$like."%' GROUP BY `word`");

$str = '';

$que = '';

$tags = '';

if (count($query) == 0 && count($sql) == 0) {
  echo '<div class="col-md-6 col-md-push-4">
        <img src="/img/kicklow-dribbble-18.png" class="img-responsive">
        </div>';
}else{

  foreach ($query as $key => $value) {
    if ($value['gravatar'] == 0) {
      $str = $str.'<a class="dummy-media-object" href="/pages/users.php?handle='.$value['handle'].'">
          <img class="round" src="/img/uploads/'.$value['filename'].'" alt="'.$value['handle'].'"/>
         <h3>'.$value['handle'].'</h3></a>';
        } else {
          $str = $str.'<a class="dummy-media-object" href="/pages/users.php?handle='.$value['handle'].'">
              <img class="round" src="'.$value['filename'].'" alt="'.$value['handle'].'"/>
              <h3>'.$value['handle'].'</h3></a>';
    }
  }

  foreach ($sql as $key => $value) {
    $title = html_entity_decode($bbcode->Parse($value['title']));
    if (!empty($value['title'])) {
      $que = $que.'<a class="dummy-media-object" href="/pages/questions.php?qa='.$value['parentid'].'"><h3>'.$title.'</h3></a>';
    }
    // $que = $que.'<a class="dummy-media-object" href="/pages/questions.php?qa='.$value['postid'].'"><h3>'.$title.'</h3></a>';
  }

  foreach ($tag as $key => $value) {
    $tags = $tags.'<a class="dummy-media-object" href="/pages/tags.php?tag='.$value['word'].'">
        <h3><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;'.$value['word'].'</h3></a>';
  }

  echo '<div class="dummy-column" name="people" id="people">
  <h2>People</h2>'.$str.'
 </div>
  <div class="dummy-column" name="content" id="content"> <h2>Related Questions</h2>
  '.$que.'
  </div>
  <div class="dummy-column" name="content" id="content"> <h2>Related Tags</h2>'.$tags.'
  </div>';
}
 ?>
