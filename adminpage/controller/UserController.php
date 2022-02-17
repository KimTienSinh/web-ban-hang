<?php

session_start();
include_once "../utils/DataValidationUtils.php";
include_once "../utils/MySQLUtils.php";
include_once "../model/UserModel.php";
include_once './BaseController.php';


class UserController extends BaseController
{
    public function __construct($user_action)
    {
        switch ($user_action) {
            case "user_create":
                $txt_name = $_POST["txt_name"];
                $txt_email = $_POST["txt_email"];
                $txt_password = md5($_POST["txt_password"]);
                $txt_address = $_POST["txt_address"];
                $txt_phone = $_POST["txt_phone"];
                $cbx_sothich = $_POST["cbx_sothich"];
                $rd_gioitinh = $_POST["rd_gioitinh"];
                $cbx_role = $_POST["cbx_role"];
                $user_01 = new UserModel($txt_name, $txt_email, $txt_password, $txt_address, $txt_phone, $cbx_sothich, $rd_gioitinh, $cbx_role, 0);
                $this->insertUser($user_01);
                header("Location: ../controller/UserController.php");
                break;

            case "user_login":

                if (count($_POST) > 0) {
                    $userlogin_txt_email = $_POST["userlogin_txt_email"];
                    $userlogin_txt_password = md5($_POST["userlogin_txt_password"]);
                    echo $_POST["userlogin_txt_email"];
                    $user = new UserModel("", $userlogin_txt_email, $userlogin_txt_password, "", "", "", "", "", 0);
                    $this->getUser($user);
                    if ($user->get_password() == $userlogin_txt_email && $user->get_email() == $userlogin_txt_password) {
                        $_SESSION["email"] = $userlogin_txt_email;
                        $_SESSION["mauser"] = $user[0]['mauser'];
                        if ($user[0]['role'] == true) {
                            header("Location: ../../adminpage/controller/UserController.php");
                        } else {
                            header("Location: ../view/index.php");
                        }
                    } else {
                        header("Location: ../view/login.php");
                    }
                }
            case "logout":
                session_unset();
                session_destroy();
                header("Location: ../controller/UserController.php");
                break;
            case "edit":
                $mauser = $_GET['id'];
                $user = new UserModel("", "", "", "", "", "", "", "", $mauser);
                $data = $this->getUser($user);
                include_once '../view/usereditpage.php';
                break;

            case "delete":
                $mauser = $_GET['id'];
                $user = new UserModel("", "", "", "", "", "", "", "", $mauser);
                $data = $this->deleteUser($user);
                header("Location: ../controller/UserController.php");
                break;

            case "user_update":
                $txt_id = $_POST['txt_id'];
                $txt_name = $_POST["txt_name"];
                $txt_email = $_POST["txt_email"];
                // $txt_password = md5($_POST["txt_password"]);
                $txt_address = $_POST["txt_address"];
                $txt_phone = $_POST["txt_phone"];
                //$cbx_sothich = $_POST["cbx_sothich"];
                //$rd_gioitinh = $_POST["rd_gioitinh"];
                //$cbx_role = $_POST["cbx_role"];
                $user_01 = new UserModel($txt_name, $txt_email, "", $txt_address, $txt_phone, "", "", "", $txt_id);
                $this->updateUser($user_01);
                header("Location: ../controller/UserController.php");
                break;

            default:
                $user = new UserModel("", "", "", "", "", "", "", "", 0);
                $data["lists"] = $this->getAllUser($user);
                $this->view("userpagelist", $data);
                break;
        }
    }

    function dataValid($email, $pass)
    {
        $validData = new DataValidationUtils();
        return $validData->checkEmailValid($email) && $validData->checkPasswordValid($pass);
    }

    public function insertUser($user)
    {
        $user->insertUser();
        header("Location: ../view/userpagelist.php");
    }

    public function getUser($user)
    {
        return $user->getUser();
    }

    public function updateUser($user)
    {
        $user->updateUser();
    }

    public function getAllUser($user)
    {
        return $user->getAllUser();
    }

    public function deleteUser($user)
    {
        $user->deleteUser();
    }

    public function getUserByEmail($user)
    {
        return $user->getUserByEmail();
    }
}


$user_action = "";
if (count($_POST) > 0) {
    $user_action = $_POST["user_action"];
} elseif (count($_GET) > 0) {
    $user_action = $_GET["action"];
}
$userContr = new UserController($user_action);


//$txt_name = $_POST["txt_name"];
//$txt_email = $_POST["txt_email"];
//$txt_password = md5($_POST["txt_password"]);
//$cbx_sothich = $_POST["cbx_sothich"];
//$rd_gioitinh = $_POST["rd_gioitinh"];
//$cbx_role = $_POST["cbx_role"];
//$status = 0;
//$createdAt = date("Y-m-d H:i:s");
