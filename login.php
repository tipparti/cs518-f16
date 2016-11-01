<?php
	session_start();
	include "connectdb.php";
	// ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

	if(!empty($_POST)){
        $username = $_POST["username"];
        $passwd   = $_POST["password"];

		if($username != '' && $passwd != ''){
			$username = mysqli_real_escape_string($conn, $username);
			$passwd = mysqli_real_escape_string($conn, $passwd);
			$sql = "SELECT a.id, a.uname, a.password
					FROM users a
					WHERE upper(a.uname) = '" . strtoupper($username) ."'";

			$result = mysqli_query($conn, $sql);
			$fetchrow = mysqli_fetch_assoc($result);
			if (md5($passwd) == $fetchrow["password"])
			{
					$_SESSION['uname'] = $fetchrow["uname"];
					$_SESSION['uid'] = $fetchrow["id"];
					echo 	'<script type="text/javascript">
         window.location.href = "index.php";</script>';
            }
            else
            {
                $pwdfail = "Not Matched";
            }
        }
        else
            $unamefail = "1";
    }
		else {
				echo "Not Loginng";
		}
?>
