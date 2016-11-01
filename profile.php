<?php session_start();
include "connectdb.php";
include "header.php";?>
	<?php

	$query = mysqli_query($conn, "
	  SELECT *
	  FROM users
	  WHERE users.id = '".$_SESSION['uid']."'
	  LIMIT 1");

	$quesquery = mysqli_query($conn, "
	  SELECT *
	  FROM questions
	  WHERE questions.user_id = '".$_SESSION['uid']."'");

	function changeAvatarType($conn, $user, $type) {
		$sql = " UPDATE users SET avatar_type = '".$type."' WHERE id = '".$_SESSION["uid"]."';";
		$query = mysqli_query($conn, $sql);
	}

	function deleteAvatar($conn, $user) {
		$sql = " UPDATE users SET avatar_type = 0, avatar_id = 0 WHERE id = '".$_SESSION["uid"]."';";

		$query = mysqli_query($conn, $sql);
	}

	if($_POST && !empty($_POST['remove'])) {
	  $user = $_SESSION['uid'];
	  deleteAvatar($conn, $user);
		echo '<script type="text/javascript">
		window.location.href = "profile.php";</script>';
		}
	?>
    <div class = "body-content">

      <div class="container">
      <div id="display_results"></div>
			<h2>User</h2>
				<?php while($row = mysqli_fetch_assoc($query)): ?>
				<h4><?php echo $row['uname']; ?></h4>
			<?php endwhile; ?>
				<h4>Avatar</h4>

				<?php
				$query1 = 'SELECT avatar_type, avatar.filename FROM avatar LEFT JOIN users ON users.avatar_id = avatar.id WHERE users.id = '.$_SESSION['uid'];
					$result = mysqli_query($conn, $query1);
					while($row = mysqli_fetch_assoc($result)){
					 if($row['avatar_type'] == '0') {
						$imgname = $row['filename'];
						 $src = "<img src='avatars/".$imgname."'/>";
						echo $src;
					}
					}?>

          <h4>Change avatar</h4>
          <form method="post">
            <input type="submit" name="remove" value="Remove Avatar"/>
          </form>
          <br/>
          <form enctype="multipart/form-data" action="fileupload.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000">
            File: <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
          </form>
        <h2>Asked Questions</h2>
          <?php
          while($row = mysqli_fetch_array($quesquery)): ?>
          <div class="question">
            <p><?php
            $url = 'question.php?qid=' . $row['question_id'];
            $site_title = $row['q_title'];
            echo "<a href=$url>$site_title</a>" ?></p>
          </div>
        <?php endwhile?>
        <?php mysqli_close($conn);?>
      </div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
