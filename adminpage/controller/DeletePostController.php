<?php 

$mabaiviet = $_GET['id'];
include_once '../utils/MySQLUtils.php';
$dbCon = new MySQLUtils();
$query = "DELETE FROM baiviet WHERE mabaiviet = :mabaiviet";
$param = array(":mabaiviet"=>$mabaiviet);
$dbCon->deleteData($query,$param);
$dbCon->disconnectDB();

header("Location: ../view/postpage.php");

?>