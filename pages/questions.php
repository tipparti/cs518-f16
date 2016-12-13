<?php
include ($_SERVER['DOCUMENT_ROOT']."/pages/header.php");
include ("navbar.php");
include_once '../db/db.php';
include '../app/time.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/nbbc/nbbc.php';


$bbcode = new BBCode;
$connection = new Db();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!empty($_GET['qa'])){
  $display = $connection -> select("SELECT * FROM `qa_posts` INNER JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid`  WHERE `type`='A' AND `parentid`=".$_GET['qa'].";");
  $rows = (int)count($display);
  $page_rows = 3;
  $last = ceil($rows/$page_rows);

  if($last < 1){
  	$last = 1;
  }

  $pagenum = 1;

  if(isset($_GET['pn'])){
  	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
  }

  if ($pagenum < 1) {
      $pagenum = 1;
  } else if ($pagenum > $last) {
      $pagenum = $last;
  }
  $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
  $sql = $connection -> select("SELECT * FROM `qa_posts` ORDER BY `postid` DESC $limit");

  $paginationCtrls = '';
  if($last != 1){
    if ($pagenum > 1) {
          $previous = $pagenum - 1;
          $paginationCtrls .= '<li><span><a href="'.$_SERVER['PHP_SELF'].'?qa='.$_GET['qa'].'&pn='.$previous.'">«</a></span></li>';

          for($i = $pagenum-4; $i < $pagenum; $i++){
  			if($i > 0){
  		        $paginationCtrls .= '<li><span><a href="'.$_SERVER['PHP_SELF'].'?qa='.$_GET['qa'].'&pn='.$i.'">'.$i.'</a></span></li>';
  			}
  	    }
      }
      $paginationCtrls .= '<li class="active"><span>'.$pagenum.'</span></li>';
      for($i = $pagenum+1; $i <= $last; $i++){
  		$paginationCtrls .= '<li><span><a href="'.$_SERVER['PHP_SELF'].'?qa='.$_GET['qa'].'&pn='.$i.'">'.$i.'</a> </span></li>';
  		if($i >= $pagenum+4){
  			break;
  		}
  	}
    if ($pagenum != $last) {
          $next = $pagenum + 1;
          $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?qa='.$_GET['qa'].'&pn='.$next.'" rel="next">»</a></span></li> ';
      }
  }
if(!empty($_SESSION['userid'])){

$postid = $connection -> quote($_GET['qa']);
$result = $connection -> select("SELECT `title`,`content`,`qa_posts`.`created`, `qa_posts`.`acount`, `qa_users`.`handle`, `qa_posts`.`flagcount`, `qa_users`.`userid`, `qa_posts`.`netvotes`, `qa_posts`.`postid` FROM `qa_posts` LEFT JOIN `qa_users` ON `qa_posts`.`userid` =  `qa_users`.`userid`  WHERE `postid`=".$postid." AND `type`='Q';");
$class = $connection -> select("SELECT `qa_uservotes`.`postid`, `type`, vote, `qa_uservotes`.`userid` FROM `qa_uservotes` INNER JOIN `qa_posts` ON `qa_posts`.`postid` = `qa_uservotes`.`postid` WHERE `qa_posts`.`type`='Q' AND `qa_uservotes`.`postid`=".$_GET['qa'].";");
$valclass = (int)count($result);
$updateClass;
$cl = $_SESSION['userid'];

foreach ($result as $key => $value) {
  if ($valclass != 0) {
    foreach ($class as $key => $vote) {
      if($value['postid'] == $vote['postid'] && $vote['userid'] == $cl){
      if($vote['vote'] == 0){
        $updateClass = "upvote";
      }
      else if($vote['vote'] == 1){
          $updateClass = "upvote upvote-enabled";
       }else if($vote['vote'] == -1){
         $updateClass = "upvote downvote-enabled";
       }
       else {
         $updateClass = "upvote";
       }
    }
  }
  }
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="alert alert-danger fade in hidden" id="errorbox">

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">
        <br>
        <form  method="post" id="upvote" class="my_form" action="/pages/votes.php">
          <div class="text-center upvote" id="upvote">
            <input type="hidden" name="qa_vote" id="qa_upvote" value="qa_upvote"/>
            <input type="hidden" name="qa_upvoteid" value= <?php echo $postid; ?> />
            <a class="<?php echo $updateClass;?>" id="<?php echo "upvote".$_GET['qa']; ?>" href='javascript:{}'
            onclick="<?php
                $retVal = ($_SESSION['name'] == $value['handle']) ? "ShowAlert();" : "document.getElementById('upvote').submit();" ;
                echo $retVal;
               ?>"
              >
              <i class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" ></i></a></div>
        </form>
          <div class="text-center fa-3x"><span class="count"><?php echo $value['netvotes']; ?></span></div>
          <form  method="post" id="dnvote" class="my_form" action="/pages/votes.php">
            <div class="text-center downvote">
              <input type="hidden" name="qa_vote" id="qa_dnvote" value="qa_dnvote"/>
              <input type="hidden" name="qa_dnvoteid" value= <?php echo $postid; ?> />
              <a href="javascript:{}" class="<?php echo $updateClass;?>"
                onclick="<?php
                    $retVal = ($_SESSION['name'] == $value['handle']) ? "ShowAlert();" : "document.getElementById('dnvote').submit();" ;
                    echo $retVal;
                   ?>
                "><i class="fa fa-thumbs-o-down fa-2x" aria-hidden="true"></i></a></div></form>

      </div>
      <div class="col-md-10">
        <h2><?php echo html_entity_decode($bbcode->Parse($value['title'])); ?></h2>
        <?php echo str_replace('pre', 'p', html_entity_decode($bbcode->Parse($value['content'])));

        $avatar = $connection -> SELECT("SELECT `blobid`, `filename`, `qa_users`.`userid`, `gravatar`,`handle` FROM `qa_blobs` LEFT JOIN `qa_users` ON `blobid`= `avatarblobid` WHERE `handle` = '".$value['handle']."' GROUP BY `qa_users`.`userid`");
        foreach ($avatar as $key => $ava) {
          if ($ava['gravatar'] == 0) {
            $qpic =	"<img src='/img/uploads/".$ava['filename']."' class='img-circle' style='width:24px;height:24px;' title='".$ava['handle']."'/>";
          } else {
            $qpic =	"<img src='".$ava['filename']."' class='img-circle' style='width:24px;height:24px;' title='".$ava['handle']."'/>";
          }
        }
        ?>
        <div>
      <span class="">asked <?php echo  time_elapsed_string($value['created']); echo " by  <a href='/pages/users.php?handle=".$value['handle']."'>".$qpic."&nbsp;".$value['handle']."</a>"; ?> </span><div class="pull-right form-inline">
        <form class="freeze" action="/app/admin.php" id="freeze" method="post">
          <?php if($value['flagcount'] == 0){ ?>
            <a class="btn btn-sm btn-info col-md-pull-6 freeze" id="btnAnswer" onclick="$('#target').toggleClass('hidden');">Post Answer</a>
          <?php } ?>
            <input type="hidden" name="id" id="id" value="<?php  echo $value['postid'];?>"/>
            <input type="hidden" name="flagcount" id="flagcount" value="<?php  echo $value['flagcount'];?>"/>
            <?php if ($_SESSION['name'] == 'admin') { ?><a class="btn btn-sm btn-danger freeze" href="javascript:{}" id="qa_freeze" onclick="document.getElementById('freeze').submit();"><?php $retVal = ($value['flagcount'] == 0 ) ? "Close" : "Open" ; echo $retVal; } ?></a>
        </form></div>
         </div>
        <hr>
      </div>
    </div>

      <div class="row">
        <div class="col-md-10 col-md-push-1">
          <div class="panel panel-primary">
      <div class="panel-heading"><?php if( $value['acount'] != 0){  echo $value['acount']." Answers"; ?></div> </div><?php
        $answer = $connection -> select("SELECT `title`,`content`,`qa_posts`.`created`, `postid`, `netvotes`, `qa_users`.`handle`,`flagged` FROM `qa_posts` LEFT JOIN `qa_users` ON `qa_posts`.`userid` =  `qa_users`.`userid`  WHERE `parentid`=".$postid." AND `type`='A' ORDER BY `flagged` DESC,`created` DESC $limit;");
        $aclass = $connection -> select("SELECT `vote`, `qa_uservotes`.`postid` FROM `qa_uservotes` JOIN `qa_posts` ON `qa_posts`.`postid` = `qa_uservotes`.`postid` WHERE `qa_uservotes`.`userid`=".$_SESSION['userid'].";");
        $valaclass = (int)count($aclass);
        $aid;
        $aupdateClass;
          foreach ($answer as $key => $val) {
            if ($valaclass != 0 ) {
              foreach ($aclass as $key => $avote) {
                if($val['postid'] == $avote['postid']){
                  if($avote['vote'] == 0){
                    $aupdateClass = "upvote";
                  }
                  else if($avote['vote'] == 1){
                      $aupdateClass = "upvote upvote-enabled";
                   }else if($avote['vote'] == -1){
                     $aupdateClass = "upvote downvote-enabled";
                   }
                   else {
                     $aupdateClass = "upvote";
                   }
                }
               }
               }


            ?>
            <div class="col-md-1">
              <form  method="post" id="a_upvote<?php echo $val['postid'];?>" class="my_form" action="/pages/votes.php">
                <div class="text-center upvote">
                  <input type="hidden" name="a_vote" id="a_vote" value="a_upvote"/>
                  <input type="hidden" name="qa_voteid" id="qa_voteid" value="<?php echo $_GET['qa']; ?>"/>
                  <input type="hidden" name="a_upvoteid" value= <?php echo $val['postid']; ?> />
                  <a class="<?php
                  echo $aupdateClass;
                  ?>" id="<?php echo "a_upvote".$val['postid']; ?>" href='javascript:{}'
                  onclick="<?php
                      $retVal = ($_SESSION['name'] == $val['handle']) ? "ShowAlert();" : "document.getElementById('a_upvote".$val['postid']."').submit();" ;
                      echo $retVal;
                     ?>"
                    >
                    <i class="fa fa-thumbs-o-up" aria-hidden="true" ></i></a></div>
              </form>
                <div class="text-center fa-2x"><span class="count"><?php echo $val['netvotes']; ?></span></div>
                <form  method="post" id="a_dnvote<?php echo $val['postid'];?>" class="my_form" action="/pages/votes.php">
                  <div class="text-center downvote">
                    <input type="hidden" name="a_vote" id="a_vote" value="a_dnvote"/>
                    <input type="hidden" name="qa_voteid" id="qa_voteid" value="<?php echo $_GET['qa'];?>"/>
                    <input type="hidden" name="a_dnvoteid" value= <?php echo $val['postid']; ?> />

                    <a href="javascript:{}" class="<?php echo $aupdateClass;?>"
                      onclick="<?php
                          $retVal = ($_SESSION['name'] == $val['handle']) ? "ShowAlert();" : "document.getElementById('a_dnvote".$val['postid']."').submit();" ;
                          echo $retVal;
                         ?>
                      "><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a></div></form></div>
            <div class="col-md-1 text-center">
              <form class="best" id="bestans<?php echo $val['postid'];?>" action="/pages/select.php" method="post">
                <div class="text-center choose">
                  <input type="hidden" name="qa" id="qa" value="<?php echo $_GET['qa'];?>"/>
                  <input type="hidden" name="ans_id" id="ans_id" value="<?php echo $val['postid'];?>"/>
                  <?php
                  $bstclass = ($val['flagged'] == 1) ? "flagged flagged-enabled" : "flagged" ;
                  $onclk = ($_SESSION['name'] == $val['handle']) ? "ShowBestAlert();" : "document.getElementById('bestans".$val['postid']."').submit();"  ;
                  ?>
                  <a href="javascript:{}" class="<?php echo $bstclass;?>" onclick="<?php echo $onclk;?>"><i class="fa fa-check fa-2x text-center" aria-hidden="true"></i>
  </a>
                </div>
              </form>
            </div>
            <div class="col-md-10">
             <?php echo str_replace('pre', 'p', html_entity_decode($bbcode->Parse($val['content'])));
             $avatar = $connection -> SELECT("SELECT `blobid`, `filename`, `qa_users`.`userid`, `gravatar`,`handle` FROM `qa_blobs` LEFT JOIN `qa_users` ON `blobid`= `avatarblobid` WHERE `handle` = '".$val['handle']."' GROUP BY `qa_users`.`userid`");
             foreach ($avatar as $key => $value) {
               if ($value['gravatar'] == 0) {
                 $pic =	"<img src='/img/uploads/".$value['filename']."' class='img-circle' style='width:24px;height:24px;' title='".$value['handle']."'/>";
               } else {
                 $pic =	"<img src='".$value['filename']."' class='img-circle' style='width:24px;height:24px;' title='".$value['handle']."'/>";
               }
             }
             ?>

              <span class="">answered <?php echo  time_elapsed_string($val['created']); echo " by  <a href='/pages/users.php?handle=".$val['handle']."'>".$pic."&nbsp;".$val['handle']."</a>"; ?> </span>
                <hr />
            </div>

            <?php }

       } else { echo "Your Answer"; ?></div>
     </div>
     <?php } ?>
     </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-md-push-6">
          <div class=""><ul class="pagination">
            <?php echo $paginationCtrls; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
  <div class="col-md-10 col-md-push-1 hidden" id="target">
    <form role="form" method="post" >
      <div class="col-md-12">
         <div class="form-group">
          <div class="col-md-12">
            <textarea  class="form-control" name="InputAnswer" id="InputAnswer" rows="10" autocomplete="off" required></textarea>
            </div>
        </div>
        <div class="form-group">
          <div class="col-md-12"><br>
          <button type="submit" name="submit" id="submit" value="Add Answer" class="btn btn-info btn-md"><span class="glyphicon glyphicon-send"></span>  Add Answer
          </button>
        </div>
      </div>

<script type="text/javascript">

          CKEDITOR.replace('InputAnswer');
           var result_error = "#errorbox";
           function ShowAlert(){
              document.getElementById(result_error).removeClass("hidden");
              document.getElementById(result_error).append("You can't <strong>vote</strong> on your post");
              document.getElementById(result_error).fadeOut(1800);
        }
        function ShowBestAlert(){
           document.getElementById(result_error).removeClass("hidden");
           document.getElementById(result_error).append("You can't <strong>choose</strong> your post as Best Answer");
           document.getElementById(result_error).fadeOut(1800);
        }
        $(my_form_id).on( "submit", function(event) {


        });
       </script>
  </div>
    </form>
  </div>
</div>
</div>
<?php }
}
else{

include 'check.php';

}}
else {
  echo '<script type="text/javascript">
  window.location.href = "/index.php";
  </script>';
}

if(!empty($_POST)){

  $format = '';
  $userid = $connection -> quote($_SESSION['userid']);
  $content = $connection -> quote($_POST['InputAnswer']);
  $today = date('Y-m-d H:i:s', time());
  $date = $connection -> quote($today);
  $parentid = $connection -> quote($_GET['qa']);
  if(strip_tags($_POST['InputAnswer'])){
    $format = $connection -> quote('html');
  }
  $result = $connection -> query("INSERT INTO `qa_posts` (`type`, `parentid`, `userid`, `format`, `created`, `content`) VALUES ('A',".$parentid.",".$userid.", ".$format.", ".$date.", ".$content.");");
  $acount = $connection -> query("UPDATE `qa_posts` as table1 INNER JOIN (SELECT *, count(*) as count FROM `qa_posts` as t1 WHERE t1.`parentid` = ".$parentid.") as table2 ON table1.`postid` = table2.`parentid` SET table1.`acount` = table2.`count`");
  $check = $connection -> select("SELECT `postid` FROM `qa_posts` WHERE `userid`=".$_SESSION['userid']."  AND `postid` =".$parentid.";");
  if ($check == true){
    $postid;
    foreach ($check as $key => $value) {
      $postid = $value['postid'];
    }
    echo '<script type="text/javascript">
    window.location.href = "/pages/questions.php?qa='.$postid.'";
    </script>';
  }
}

include 'footer.php';

?>
