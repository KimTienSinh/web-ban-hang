<?php
include_once "../utils/MySQLUtils.php";

$cat_action = "";
if (count($_POST) > 0) {
    $cat_action = $_POST["cat_action"];
}


switch ($cat_action) {

    case "cat_update":
        $txt_id= $_POST['txt_id'];
        $txt_name = $_POST['txt_name'];
        $txt_url = $_POST['txt_url'];

        $dbCon = new MySQLUtils();
        $query = "UPDATE danhmuc SET catname=:catname, caturl=:caturl, status=:status  WHERE madanhmuc =:madanhmuc";
        $param = array(":catname" => $txt_name, ":caturl" => $txt_url, ":status" => 1, ":madanhmuc"=>$txt_id);
        $dbCon->updateData($query, $param);

        $dbCon->disconnectDB();
        header("Location: ../view/catalogypage.php");
        break;
    case "cat_create":
        $txt_name = $_POST['txt_name'];
        $txt_url = $_POST['txt_url'];

        $dbCon = new MySQLUtils();
        $query = "Insert into danhmuc (catname, caturl, status) values(:catname, :caturl, :status)";
        $param = array(":catname" => $txt_name, ":caturl" => $txt_url, ":status" => 0);
        $dbCon->insertData($query, $param);

        $dbCon->disconnectDB();
        header("Location: ../view/catalogypage.php");
        break;
    default:
        header("Location: ../view/catalogypage.php");
        break;
}
