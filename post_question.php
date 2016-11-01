
<?php

include "connectdb.php";
include "header.php";

echo '<div class="container">
    <div class="row row-content">
    <div class="col-xs-12 col-sm-12">
            <h4>Post Question</h4>';
            echo '<hr>
          </div>
          <hr>';
    echo '<div class="row"><div class="col-xs-12 col-sm-8">

        <form class="form-horizontal" style="padding-top:20px;" method="post" role="form">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Question Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Question Title">
            </div>
        </div>
            <div class="form-group">
                <label for="content" class="col-sm-2 control-label">Question Content</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="content" name="content" rows="12"></textarea>
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

?>

<?php
if(!empty($_POST)){

        $title = $_POST["title"];
        $content   = $_POST["content"];
        $uid      = $_SESSION["uid"];
		if($title != '' && $content != ''){
			$title = mysqli_real_escape_string($conn, $title);
			$content = mysqli_real_escape_string($conn, $content);
			$sql = 'insert into questions(`q_title`, `q_content`, `user_id`) values ("'.$title.'", "'.$content.'", '.$uid.')';

            if (mysqli_query($conn, $sql)) {
                // echo "New Question Posted.";
							echo 	'<script type="text/javascript">
window.location.href = "index.php";</script>';

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        else
            $unamefail = "1";


        $_POST = array();
    }

 ?>
    <div id="templates" class="hidden">
    		<div class="upvote">
    				<a class="upvote" title="This is good stuff. Vote it up! (Click again to undo)"></a>
    				<span class="count" title="Total number of votes"></span>
    				<a class="downvote" title="This is not useful. Vote it down. (Click again to undo)"></a>
    				<a class="star" title="Mark as favorite. (Click again to undo)"></a>
    		</div>
    </div>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
</body>

</html>
