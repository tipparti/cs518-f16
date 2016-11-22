<?php
include ("header.php");
include ("navbar.php");
include_once '../db/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!empty($_SESSION['userid'])){?>

  <div class="container">
  <div class="row">
    <div class="col-md-12">
      		  <h2>Ask a question</h2>
            <hr>
  	<!-- <div class="alert alert-success col-xs-4" ><strong><span class="glyphicon glyphicon-send"></span> Success! Message sent. (If form ok!)</strong></div>
      <div class="alert alert-danger col-xs-4"><span class="glyphicon glyphicon-alert"></span><strong> Error! Please check the inputs. (If form error!)</strong></div> -->
    </div>
    <form role="form" method="post" >
      <div class="col-md-12">
          <div class="form-group">
            <div class="col-md-8">
              <label for="InputTitle">The question in one sentence:</label>
            <input  name="InputTitle" id="InputTitle" class="form-control" type="text" autocomplete="off" required>
          </div>
            </div>
         <div class="form-group">
          <div class="col-md-8">
            <label for="InputContent">More information for the question:</label>
            <textarea  class="form-control" name="InputContent" id="InputContent" rows="10" autocomplete="off" required></textarea>
            </div>
        </div>
        <div class="form-group">
          <div class="col-md-8">
            <label for="InputTags"> Tags - use hyphens to combine words: </label>
            <input  class="form-control" name="InputTags" id="InputTags" type="text"></textarea>
            </div>
        </div>
        <div class="form-group">
          <div class="col-md-12"><br>
          <button type="submit" name="submit" id="submit" value="Ask the Question" class="btn btn-info btn-md"><span class="glyphicon glyphicon-send"></span>  Ask the Question
          </button>
        </div>
      </div>
    </form>
    <script>
           CKEDITOR.replace( 'InputContent');
       </script>
  </div>
  </div>
  </div>
<?php
}
else {
  include_once 'check.php';
}

include("footer.php");
?>
<?php
if(!empty($_POST)){

  $connection = new Db();
  $format = '';
  $userid = $connection -> quote($_SESSION['userid']);
  $title = $connection -> quote(htmlentities($_POST['InputTitle']));
  $content = $connection -> quote($_POST['InputContent']);
  $today = date('Y-m-d H:i:s', time());
  $date = $connection -> quote($today);
  if(strip_tags($_POST['InputTitle'])){
    $format = $connection -> quote('html');
  }
  $result = $connection -> query("INSERT INTO `qa_posts` (`type`, `userid`, `format`, `created`, `title`, `content`) VALUES ('Q',".$userid.", ".$format.", ".$date.", ".$title.", ".$content.");");
  $datecheck = $connection -> select("SELECT * FROM `qa_posts` WHERE `created`=".$date.";");
  $check = $connection -> select("SELECT `postid` FROM `qa_posts` WHERE `userid`=".$_SESSION['userid']."  AND `created`=".$date." AND `type`= 'Q';");
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
 ?>
