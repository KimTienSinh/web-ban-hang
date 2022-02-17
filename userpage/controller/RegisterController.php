<?php

session_start();
include_once '../../adminpage/model/User.php';
include_once '../../adminpage/utils/MySQLUtils.php';

function registerUser(){


    $txt_name = $_POST["txt_name"];
    $txt_email = $_POST["txt_email"];
    $txt_password = md5($_POST["txt_password"]);
    $txt_address = $_POST["txt_address"];
    $txt_phone  = $_POST["txt_phone"];
    $cbx_sothich = $_POST["cbx_sothich"];
    $rd_gioitinh = $_POST["rd_gioitinh"];
    $cbx_role = 0;
    $status = 0;
    $createdAt = date("Y-m-d H:i:s");


    $dbCon = new MySQLUtils();
    $query = "INSERT INTO khachhang ( username, email, password, address, phone, status, prefer,sex, role,createdAt)
    VALUES (:username, :email, :password, :address, :phone, :status, :prefer,:sex,:role, :createdAt)";

    $param = array(":username"=>$txt_name, ":email"=>$txt_email, ":password"=>$txt_password, ":address" => $txt_address, ":phone"=>$txt_phone,
    ":status"=>$status, ":prefer"=>$cbx_sothich,":sex"=>$rd_gioitinh,":role"=>$cbx_role, ":createdAt"=>$createdAt);
    $dbCon->insertData($query, $param);
    $_SESSION["email"] = $txt_email;

}

$query1 = "select mauser from khachhang order by mauser desc ";
$dbCon = new MySQLUtils();
$usernew = $dbCon->getALLData($query1);

$_SESSION["mauser"] = $usernew[0]['mauser'];

 $dbCon->disconnectDB();
registerUser();
header("Location: ../view/index.php");


// function insertUser($user) {
//     $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "dbquanlyao";

//     $txt_name = $user->get_username();
//     $txt_email = $user->get_email();
//     $txt_password = md5($user->get_password());
//     $cbx_sothich = $user->get_sothich();
//     $rd_gioitinh = $user->get_gioitinh();
//     $cbx_role = 0;
//     $status = 0;
//     $createdAt = date("Y-m-d H:i:s");
//     try {
//         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


//         $stmt = $conn->prepare("INSERT INTO khachhang ( username, email, password, status, prefer,sex,createdAt) VALUES (:username, :email, :password, :status, :prefer,:sex, :createdAt)");

//         $stmt->bindParam(':username', $txt_name);
//         $stmt->bindParam(':email', $txt_email);
//         $stmt->bindParam(':password',$txt_password);
//         $stmt->bindParam(':status', $status);
//         $stmt->bindParam(':prefer', $cbx_sothich);
//         $stmt->bindParam(':sex', $rd_gioitinh);
//         $stmt->bindParam(':createdAt', $createdAt);
//         $stmt->execute();
//         echo "New record created successfully";
//         header("Location: ../view/index.php");
//     } catch (PDOException $e) {
//         //echo $sql . "<br>" . $e->getMessage();
//     } finally {
//         echo"dongketnoi";
//         $conn = null;
//     }
// }




//$user = new User($txt_name, $txt_email, $txt_password, $cbx_sothich, $rd_gioitinh   ,$createdAt);
//insertUser($user);
