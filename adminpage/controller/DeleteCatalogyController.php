<?php 
$madanhmuc = $_GET['id'];
include_once '../utils/MySQLUtils.php';
$dbCon = new MySQLUtils();
$query = "DELETE FROM danhmuc WHERE madanhmuc = :madanhmuc";
$param = array(":madanhmuc"=> $madanhmuc);
$dbCon->deleteData($query,$param);

header("Location: ../view/catalogypage.php");
$dbCon->disconnectDB();
?>