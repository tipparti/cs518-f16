<?php
	session_start();
	include "connectdb.php";

	if(!empty($_POST)){
        $username = $_POST["username"];
        $passwd   = $_POST["password"];

		if($username != '' && $passwd != ''){
			$username = mysqli_real_escape_string($conn, $username);
			$passwd = mysqli_real_escape_string($conn, $passwd);

			$sql = "insert into users (`uname`, `password`) values ('".$username."','".md5($passwd)."');";
			// $sql = "SELECT a.id, a.uname, a.password FROM users a WHERE upper(a.uname) = '" . strtoupper($username) ."'";
		  if (mysqli_query($conn, $sql))
			{
				echo $sql;
				echo 	'<script type="text/javascript">
window.location.href = "index.php";</script>';
      }
      else
        {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        }
    }

?>
