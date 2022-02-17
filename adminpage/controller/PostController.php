<?php

include_once '../utils/MySQLUtils.php';

$post_action = "";
if (count($_POST) > 0) {
    $post_action = $_POST["post_action"];
}

switch ($post_action) {
    case "post_create":
        $txt_title  = $_POST['txt_title'];
        $mota = $_POST['mota'];
        $txt_catalogy = $_POST['txt_catalogy'];
        $dbCon = new MySQLUtils();
        $query = "insert into baiviet (postname, mota, madanhmuc) values(:postname, :mota, :madanhmuc) ";
        $param = array(":postname" => $txt_title, ":mota" => $mota, ":madanhmuc" => $txt_catalogy);
        $dbCon->insertData($query, $param);
        $dbCon->disconnectDB();
        header("Location: ../view/postpage.php");
        break;
    case "post_update":
        $txt_id = $_POST["txt_id"];
        $txt_title  = $_POST['txt_title'];
        $mota = $_POST['mota'];
        $txt_catalogy = $_POST['txt_catalogy'];


        $myDBConnect = new MySQLUtils();
        $query = "UPDATE baiviet SET postname=:postname,mota =:mota, madanhmuc=:madanhmuc WHERE mabaiviet=:mabaiviet";
        $param = array(":postname" => $txt_title, ":mota" => $mota, ":madanhmuc" => $txt_catalogy, ":mabaiviet" => $txt_id);
        $myDBConnect->updateData($query, $param);
        $myDBConnect->disconnectDB();

        header("Location: ../view/postpage.php");
        break;
    case "post_delete":
        echo 'xao';
        break;
    default:
    echo'kovo';
        //header("Location: ../view/postpage.php");
        break;
}
