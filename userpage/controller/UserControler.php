<?php

session_start();
include_once "../utils/DataValidationUtils.php";
include_once '../utils/MySQLUtils.php';

include_once "../model/UserModel.php";
function isUserExist($email, $arrUser = array()) {
    $userDetail = null;
    foreach ($arrUser as $user) {
        if ($user->get_email() == $email) {
            $userDetail = $user;
        }
    }
    return $userDetail;
}

function isUserValid($email, $pass, $arrUser = array()) {
    $userDetail = null;
    foreach ($arrUser as $user) {
        if ($user->get_email() == $email && $user->get_password() == $pass) {
            $userDetail = $user;
        }
    }
    return $userDetail;
}

function dataValid($email, $pass) {
    $validData = new DataValidationUtils();
    return $validData->checkEmailValid($email) && $validData->checkPasswordValid($pass);
}
//$user_01 = array("username" => "nguyenkimhieu", "email" => "nguyenkimhieu@gmail.com", "password" => "abcd", "role" => "2", "sex" => "male", "prefer" => "football,tennis", "file_avatar" => "images/admin.jpg");
//$user_01 = new UserModel("lamnhungoc", "abc", "lamnhungoc@gmail.com", "male", "football,tennis", "admin", 1, "images/admin.jpg");
//$user_01 = new UserModel("nguyenkimhieu","abcd", "nguyenkimhieu@gmail.com", "male"," football,tennis", "admin", 1);
$user_01 = new UserModel("nguyenkimhieu","abcd", "nguyenkimhieu@gmail.com", "male"," football,tennis", "admin", 1);
$arrUsers = array();
array_push($arrUsers, $user_01);





$user_action = $_POST["user_action"];
//echo $user_action;

switch ($user_action) {
    case "user_create":
        $txt_username = $_POST["txt_username"];
        $txt_email = $_POST["txt_email"];
        $txt_password = $_POST["txt_password"];
        $cbx_role = $_POST["cbx_role"];
        $rdg_sex = $_POST["rdg_sex"];
        $chk_tennis = isset($_POST["chk_tennis"]) ? $_POST["chk_tennis"] : "";
        $chk_football = isset($_POST["chk_football"]) ? $_POST["chk_football"] : "";
        $file_avatar = $_FILES["file_avatar"]["name"];
        $userDetail = isUserExist($txt_email, $arrUsers);
//        var_dump($userDetail);
//        die;
        $db = new MySQLUtils();
        $db->connnectdb();
//        if (!is_null($userDetail)) {
//            header("Location: ../view/usereditpage.php?id=" . $userDetail->get_email());
//        } 
//        else {
//            $strSoThich = $chk_tennis . "," . $chk_football;
//            $user_02 = new UserModel($txt_username, $txt_password, $txt_email, $rdg_sex, $strSoThich, $cbx_role, 0, $file_avatar);
//            array_push($arrUsers, $user_02);
//            var_dump($arrUsers);
//        }
//        echo 'halo';
        break;
    case "user_login":
        $userlogin_txt_email = $_POST["userlogin_txt_email"];
        $userlogin_txt_password = $_POST["userlogin_txt_password"];
        if (dataValid($userlogin_txt_email,$userlogin_txt_password)) {
            $user = isUserValid($userlogin_txt_email, $userlogin_txt_password, $arrUsers);
            if (!(is_null($user))) {
                $_SESSION["email"] = $userlogin_txt_email;
                $_SESSION["is_login"] = true;
                
                $db = new MySQLUtils();
                $db->connnectdb();
                header("Location: /tuan5/adminpage/view/userpagelist.php");
            }
        } else {
            echo 'khong hop le';
            header("Location: ../view/login.php");
        }
        break;
    default :
        header("Location: ../view/login.php");
        break;
}
?>

