<?php
include ("header.php");
include ("navbar.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/db/db.php");
include $_SERVER['DOCUMENT_ROOT'].'/app/time.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/nbbc/nbbc.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$bbcode = new BBCode;

$connection = new Db();

if (isset($_GET['word'])):

$tag = $_GET['word'];

?>
<div class="container">
  <div id="content">
    <h1>Word Questions  </h1><blockquote>
      <em> <?php echo $tag; ?></em>
    </blockquote>
      <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
          <li class="active"><a href="#red" data-toggle="tab">Recent</a></li>

      </ul>
      <div id="my-tab-content" class="tab-content">
          <div class="tab-pane active" id="red">
            <div class="panel-body">
                <ul class="list-group">
                                  <li class="list-group-item">

<?php
$red = $connection -> select("SELECT `title`,`content`,`qa_posts`.`created`, `qa_posts`.`postid`, `qa_posts`.`acount`, `qa_users`.`handle`, `netvotes`,`avatarblobid` FROM `qa_posts` LEFT JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid`  WHERE `title` LIKE '%".$tag."%' OR `content` LIKE '%".$tag."%' AND `type` = 'Q' ORDER BY `qa_posts`.`created` DESC;");
$hrred = (int)count($red);
 foreach ($red as $key => $value):
   $profile = $connection -> select("SELECT `filename`, `qa_users`.`handle`, `gravatar` FROM `qa_users` INNER JOIN `qa_blobs` ON `qa_users`.`avatarblobid` = `qa_blobs`.`blobid` WHERE `qa_blobs`.blobid=".$value['avatarblobid'].";");
   if(count($profile) == 1){
   foreach ($profile as $key => $val){
    $pic = $val['filename'];
    $na = $val['handle'];
    if ($val['gravatar'] == 0) {
      $pic =	"<img src='/img/uploads/".$val['filename']."' class='img-circle' style='width:24px;height:24px;' title='".$val['handle']."'/>";
    } else {
      $pic =	"<img src='".$val['filename']."' class='img-circle' style='width:24px;height:24px;' title='".$val['handle']."'/>";
    }
    }
 }
   ?>

  <div class="row">
    <div class="col-xs-2 col-md-1">
        <div class="text-center fa-2x"><?php  echo $value['netvotes']; ?>
        </div>
        <div class="text-center">Votes</div>
        <div class="text-center"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><!--i class="fa fa-thumbs-o-down" aria-hidden="true"></i--></div>
      </div>
      <div class="col-xs-10 col-md-11">
          <div class="col-xs-10 col-md-11">
              <a href="/pages/questions.php?qa=<?php echo $value['postid']; ?>"><?php echo html_entity_decode($bbcode->Parse($value['title'])); ?>
                  </a>
                  <div class="action">
                  <?php
                  $tags = $connection -> select("SELECT `qa_tagwords`.`postid`, `qa_tagwords`.`wordid`, `word` FROM `qa_tagwords` INNER JOIN `qa_words` ON `qa_words`.`wordid` = `qa_tagwords`.`wordid` WHERE `qa_tagwords`.`postid` = ".$value['postid'].";");
                  foreach ($tags as $key => $tagv) {
                    echo '<a href="/pages/tags.php?tag='.$tagv['word'].'" class="btn btn-labeled btn-xs" title="Edit">
                        <i class="fa fa-tag" aria-hidden="true"></i>&nbsp;'.$tagv['word'].'
                    </a>&nbsp;&nbsp;';
                    }
                   ?>

                  </div>
              <div class="footer content">
                  asked <?php echo time_elapsed_string($value['created']); echo " by  <a href='/pages/users.php?handle=".$na."'>".$pic."&nbsp;".$value['handle']."</a>"; ?>
              </div>
          </div>

      </div>
  </div>
  <?php
    if($hrred != 1){
      echo '<hr>';
    $hrred--;
  }
endforeach; ?>
</li>
<ul>
</div>
</div>
</div>
</div>
</div>
<?php else: ?>
<div class="container">
        <div class="row">
          <ul class="nav nav-pills nav-stacked tag-list">
            <?php

              $sql = $connection -> select("SELECT `wordid`, `word`, `titlecount`, `contentcount`, `tagwordcount`, `tagcount`, (`contentcount` + `tagwordcount` + `tagcount`) AS `Total` FROM `qa_words` GROUP BY `wordid`");
             foreach ($sql as $key => $value):
              echo '<li class="col-md-4">
    <a href="/pages/tags.php?tag='.$value['word'].'" style="background-color: #2C3E50; color:#FFF;">
    <span class="badge pull-right">'.$value['Total'].'</span>'.$value['word'].'
    </a>
  </li>';
             endforeach; ?>

              				  			</ul>
      </div>
  </div>
<?php endif; ?>

<?php include_once 'footer.php';?>
