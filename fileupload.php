<?php
session_start();
include "connectdb.php";

$user = $_SESSION['uid'];

function insert_Filename($conn, $file) {
  $sql = "INSERT INTO avatar (filename) VALUES ('".$file."');";
  $insert = mysqli_query($conn, $sql);
}

function update_User($conn, $file, $user) {
  $sql = "SELECT * FROM avatar WHERE filename = '".$file."';";
  $selectquery = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_assoc($selectquery)) {
  $sql1 = "UPDATE users SET avatar_id ='".$row['id']."' WHERE id='".$_SESSION['uid']."';";
  $updatequery = mysqli_query($conn, $sql1);
    echo '<script type="text/javascript">
    window.location.href = "profile.php";</script>';
  mysqli_close($conn);

  }
}
$target_dir = "/Applications/MAMP/htdocs/conFusion/avatars/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        insert_Filename($conn, $_FILES["fileToUpload"]["name"]);
        if(update_User($conn, $_FILES["fileToUpload"]["name"], $user)){
          print "Success";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



?>
