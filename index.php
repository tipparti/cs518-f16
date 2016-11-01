
<?php
include "connectdb.php";
include "header.php";?>
<div>
<p style="padding-top:20px;"></p>
</div>
    <?php

      $sql = "SELECT questions.question_id, questions.q_title FROM questions
              LEFT JOIN answers ON questions.question_id = answers.q_id
              ORDER BY questions.posted_dt DESC";

      $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    $sqlqa = 'select * from questions LEFT JOIN users on questions.user_id = users.id WHERE questions.question_id='.$row["question_id"].' ORDER BY questions.posted_dt DESC;';
                      $resultqa = mysqli_query($conn, $sqlqa);
                    echo '
                      <div class="row">
                      <div class="col-xs-12 col-sm-1">
                      <div id="topic" class="upvote">
    <a class="upvote"></a>
    <span class="count">0</span>
    <a class="downvote"></a>
    <a class="star"></a>
</div>
</div>
        <div class="col-xs-12 col-sm-11">
        <div class="panel panel-default" style="max-width:960px;">
        <div class="panel-heading" role="tab" id="'.$row['question_id'].'">
        <h3 class="panel-title">
        <a class="collapsed" role="button" href="question.php?qid='.$row["question_id"].'" aria-expanded="false">'.$row["q_title"].'
        </a>
        </h3>
        </div>
        </div></h4>';

                echo '  <div class="col-xs-12 col-sm-push-1">';

                while($rowqa = mysqli_fetch_assoc($resultqa)){
                  $sql_avatar = "SELECT avatar.filename FROM users LEFT JOIN avatar ON users.avatar_id = avatar.id WHERE users.id=".$rowqa['id'];
                  $result_avatar = mysqli_query($conn, $sql_avatar);
                if (mysqli_num_rows($result_avatar) > 0) {
                          while($row_avatar = mysqli_fetch_array($result_avatar)) {
                            $imgname = $row_avatar['filename'];
                  echo 'asked '.date('M j G:i', strtotime(date($rowqa['posted_dt']))).' ago by <a href="profile.php"><img src="/conFusion/avatars/'.$imgname.'" width="25" height="25"/> '.$rowqa['uname'].'</a></div>';
                  }
                }
                else
                {
                  echo 'asked '.date('M j G:i', strtotime(date($rowqa['posted_dt']))).' ago by <a href="profile.php">'.$rowqa['uname'].'</a></div>';
                }
              }

                echo '</div></div></div>';

      }
    }


    ?>



    <?php include "footer.php"; ?>
