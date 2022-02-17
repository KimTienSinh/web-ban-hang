<?php

include_once '../model/User.php';
include_once '../utils/MySQLUtils.php';
function insertUser($user) {
    $txt_name = $user->get_username();
    $txt_email = $user->get_email();
    $txt_password = md5($user->get_password());
    $txt_address = $user->get_address();
    $txt_phone = $user->get_phone();
    $cbx_sothich = $user->get_sothich();
    $rd_gioitinh = $user->get_gioitinh();
    $cbx_role = $user->get_role();
    $status = 0;
    $createdAt = date("Y-m-d H:i:s");
    try {
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO khachhang ( username, email, password, address, phone, status, prefer,sex,role,createdAt)
         VALUES (:username, :email, :password, :address, :phone, :status, :prefer,:sex, :role, :createdAt)";
         $param = array(":username"=>$txt_name, ":email"=>$txt_email, ":password"=>$txt_password, ":address" => $txt_address,":phone"=>$txt_phone,
          ":status"=>$status, ":prefer"=>$cbx_sothich,":sex"=>$rd_gioitinh, ":role"=>$cbx_role, ":createdAt"=>$createdAt);
        $dbCon->insertData($query, $param);
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        
        $dbCon->disconnectDB();
    }
}


$txt_name = $_POST["txt_name"];
$txt_email = $_POST["txt_email"];
$txt_password = $_POST["txt_password"];
$txt_address = $_POST["txt_address"];
$txt_phone = $_POST["txt_phone"];
$cbx_sothich = $_POST["cbx_sothich"];
$rd_gioitinh = $_POST["rd_gioitinh"];
$cbx_role = $_POST["cbx_role"];


$user = new User($txt_name, $txt_email, $txt_password, $txt_address, $txt_phone, $cbx_sothich, $rd_gioitinh,$cbx_role);
insertUser($user);
header("Location:  ../view/userpagelist.php");
?>