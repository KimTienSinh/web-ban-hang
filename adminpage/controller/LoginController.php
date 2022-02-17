<?php
include_once '../utils/MySQLUtils.php';

function getUserByEmail($email) {
    $dbCon = new MySQLUtils();
    $query = "SELECT mauser,email,password FROM khachhang where email = :email";
    $param = array(":email"=>$_POST["userlogin_txt_email"]);
    $dbCon->getData($query,$param);
    $dbCon->disconnectDB();
    
}

if (count($_POST) > 0) {
    $username = $_POST["userlogin_txt_email"];
    $passwd = md5($_POST["userlogin_txt_password"]);
    $user = getUserByEmail($username);
    if ($username == $user['email']&& $passwd == $user['password']) {
        session_start();
        $_SESSION["email"] = $username;
        $_SESSION["mauser"] = $mauser;
       // header("Location: ../view/userpagelist.php");
       header("Location: UserController.php");
    }else{
         header("Location: ../view/userloginpage.php");
    }
}
?>

