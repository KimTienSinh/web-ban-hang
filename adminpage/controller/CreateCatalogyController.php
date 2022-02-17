<?php 

include_once '../utils/MySQLUtils.php';
$txt_name = $_POST['txt_name'];
$txt_url = $_POST['txt_url'];

$dbCon = new MySQLUtils();
$query = "Insert into danhmuc (catname, caturl, status) values(:catname, :caturl, :status)";
$param = array(":catname"=>$txt_name,":caturl"=>$txt_url,":status"=>0);
$dbCon ->insertData($query,$param);


$dbCon->disconnectDB();
header("Location: ../view/catalogypage.php");

?>