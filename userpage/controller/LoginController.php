<?php
session_start();
//include_once "../utils/DataValidationUtils.php";
include_once '../../adminpage/utils/MySQLUtils.php';
function getUserByEmail($email)
{
    $dbCon = new MySQLUtils();
    $query = "SELECT mauser,email,password FROM khachhang where email = :email";
    $param = array(":email" => $email);
    $dbCon->getData($query, $param);
    $dbCon->disconnectDB();
}

if (count($_POST) > 0) {
    $username = $_POST["userlogin_txt_email"];
    $passwd = md5($_POST["userlogin_txt_password"]);

    $dbCon = new MySQLUtils();
    $query = "SELECT mauser,email,password,role  FROM khachhang where email = :email";
    $param = array(":email" => $username);
    $user = $dbCon->getData($query, $param);
    
    if ($username == $user[0]['email'] && $passwd == $user[0]['password']) {
        $_SESSION["email"] = $username;
        $_SESSION["mauser"] = $user[0]['mauser'];
        if ($user[0]['role'] == true) {
            header("Location: ../../adminpage/controller/UserController.php");
        } else {
            header("Location: ../view/index.php");
        }
    } else {
        header("Location: ../view/login.php");
    }
    $dbCon->disconnectDB();
}
