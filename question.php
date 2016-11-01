<?php

include "connectdb.php";
include "header.php";?>

    <?php
$qid = $_GET["qid"];
$uid = $_SESSION["uid"];
if($qid != '' && $uid != ''){
  $sql = 'select DISTINCT(questions.q_title), questions.q_content from questions WHERE questions.question_id ='.$qid.';';
  $sqlans = 'select * from answers JOIN users on answers.user_id = users.id WHERE answers.q_id ='.$qid.' ORDER BY answers.ans_posted_dt DESC;';

  $result = mysqli_query($conn, $sql);
  $resultans = mysqli_query($conn, $sqlans);
  //$fetchrow = mysqli_fetch_assoc( $result );

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
echo '<div class="container">
    <div class="row row-content">
    <div class="col-xs-12 col-sm-12">
            <h4>'.$row['q_title'].'</h4>';
            echo '<hr>
            <div class="row">
            <div class="span6">
              <div class="examples" id="examples"></div></div>
                <div class="col-xs-8 col-sm-7 col-sm-offset-1"><h5>'.$row['q_content'].'</h5>
              </div>
          </div>
          <hr>';
          echo '<div class="row row-content">
                              <div class="col-xs-12 col-sm-12">

                                  <h4>Answers</h4>

                              </div>';
  if (mysqli_num_rows($resultans) > 0){
  while ($row = mysqli_fetch_assoc($resultans)) {
    echo '<div class="row row-content">
        <div class="col-xs-12 col-sm-12">
        <div class="row">
            <div class="col-xs-8 col-sm-7 col-sm-offset-1"><h5>'.$row['ans_content'].'</h5>';
            $sql_avatar = "SELECT avatar.filename FROM users JOIN avatar ON users.avatar_id = avatar.id WHERE users.id=".$row['id'];
            $result_avatar = mysqli_query($conn, $sql_avatar);
          if (mysqli_num_rows($result_avatar) > 0) {
                    while($row_avatar = mysqli_fetch_array($result_avatar)) {
                      $imgname = $row_avatar['filename'];
            echo '<h7> answered '.date('M j G:i', strtotime(date($row['ans_posted_dt']))).' ago by <a href="profile.php"><img src="/conFusion/avatars/'.$imgname.'" width="25" height="25"/> '.$row['uname'].'</a></div>';
            }
          }
          else {
            echo '<h7> answered '.date('M j G:i', strtotime(date($row['ans_posted_dt']))).' ago by <a href="profile.php">'.$row['uname'].'</a></div>
        </div>
      </div></div>';
    }
    }
    }
    echo '<div class="row"><div class="col-xs-12 col-sm-8">

        <form class="form-horizontal" style="padding-top:20px;" method="post" role="form">
            <div class="form-group">
                <label for="feedback" class="col-sm-2 control-label">Post Answers</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="answer" name="answer" rows="12"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div></div>

</div>

</div>
</div>';
}
}
}
else {

  echo '<div class="container">
      <div class="row row-content">
      <div class="col-xs-12 col-sm-12">Please <a href="index.php">Login</a> or <a href="index.php">Register</a>';

}

?>

        <?php
if(!empty($_POST)){
        $content   = $_POST["answer"];
        $uid      = $_SESSION["uid"];
        $qid = $_GET['qid'];
	   	if($content != ''){
			 $content = mysqli_real_escape_string($conn, $content);
       $qid =  mysqli_real_escape_string($conn, $qid);
		 	   $sql = 'insert into answers(`ans_content`, `user_id`, `q_id`) values ("'.$content.'", "'.$uid.'","'.$qid.'")';
            if (mysqli_query($conn, $sql)) {
                // echo "New Question Posted.";
							//return();
							$uid = $_SESSION["uid"];
							echo '<script type="text/javascript">
window.location.href = "question.php?qid='.$_GET["qid"].'";</script>';

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        else
            $unamefail = "1";

    }
?>
            <?php include "footer.php"; ?>