<?php
include_once "../utils/MySQLUtils.php";


$product_action ="";
if(count($_POST)>0){
    $product_action = $_POST["product_action"];
}

switch ($product_action) {
    case "product_create":
        $txt_title = $_POST["txt_title"];
        $txt_image = $_POST["txt_image"];
        $txt_price = $_POST["txt_price"];
        $status =0;
        $txt_catalogy = $_POST["txt_catalogy"];
        

        $myDBConnect = new MySQLUtils();
        $query = "INSERT INTO sanpham(title,image, price,status,madanhmuc) VALUES(:title, :image, :price,:status,:madanhmuc  )";
        $param = array(":title"=>$txt_title, ":image"=>$txt_image, ":price"=>$txt_price,":status"=>$status, ":madanhmuc"=>$txt_catalogy);
        $myDBConnect->insertData($query, $param);
        $myDBConnect->disconnectDB();
        header("Location: ../view/productpage.php");
        break;
    case "product_update":
        $txt_id =$_POST["txt_id"];
        //$txt_id =$_GET["id"];
        $txt_title = $_POST["txt_title"];
        $txt_image = $_POST["txt_image"];
        $txt_price = $_POST["txt_price"];
        $status =0;
        $txt_catalogy = $_POST["txt_catalogy"];
        

        $myDBConnect = new MySQLUtils();
        $query = "UPDATE sanpham SET title=:title,image=:image, price=:price, status=:status ,madanhmuc=:madanhmuc WHERE masanpham=:masanpham";
        $param = array(":title"=>$txt_title, ":image"=>$txt_image, ":price"=>$txt_price,":status"=>$status, ":madanhmuc"=>$txt_catalogy,":masanpham"=>$txt_id);
        $myDBConnect->updateData($query, $param);
        $myDBConnect->disconnectDB();

        header("Location: ../view/productpage.php");
        break;
    default:
        header("Location: ../view/productpage.php");
        break;
}
?>