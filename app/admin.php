<?php
session_start();
include ($_SERVER['DOCUMENT_ROOT']."/pages/header.php");
include ($_SERVER['DOCUMENT_ROOT']."/pages/navbar.php");
include_once $_SERVER['DOCUMENT_ROOT'].'/db/db.php';

$connection = new Db();
$check = $_POST['flagcount'];

if($check == 0){
$result = $connection -> query("UPDATE `qa_posts` SET `flagcount`='1' WHERE `postid`=".$_POST['id'].";");
}else {
$result = $connection -> query("UPDATE `qa_posts` SET `flagcount`='0' WHERE `postid`=".$_POST['id'].";");
}
echo '<script type="text/javascript">
window.location.href = "/pages/questions.php?qa='.$_POST['id'].'";
</script>';
?>
