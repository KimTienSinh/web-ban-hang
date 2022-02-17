<?php
session_start();
include_once '../../adminpage/utils/MySQLUtils.php';
if(!empty($_SESSION["email"])){
    function insertOrder(){
        $dbCon = new MySQLUtils();
        $createdAt = date("Y-m-d H:i:s");
        $updatedAt = date("Y-m-d H:i:s");
        $query = "Insert into donhang (amount, status,totalprice, createdAt, updatedAt, mauser) values (:amount, :status,:totalprice, :createdAt, :updatedAt, :mauser)";
        $param = array(":amount" => 1, ":status" => 1,":totalprice"=>$_SESSION['tongtien'] , ":createdAt" => $createdAt, ":updatedAt" => $updatedAt, ":mauser" => $_SESSION["mauser"]);
        $dbCon->insertData($query, $param);
    
        $dbCon->disconnectDB();
        
    }
    
    insertOrder();
    
    $cart = $_SESSION['cart'];
    
    $query1 = "Select madonhang from donhang order by madonhang desc ";
    $dbCon = new MySQLUtils();
    $maxiddh = $dbCon->getALLData($query1);
    $quantity = $_SESSION['qty_array'];
    
    $index = 0;
    $query = "SELECT * FROM sanpham where masanpham in (" . implode(',', $_SESSION['cart']) . ")";
    $products = $dbCon->getALLData($query);
    $insertListSP = array();
    
    foreach ($products as $product) {
        $insertListSP[$index] = "('" . $maxiddh[0]['madonhang'] . "' , '" . $product['masanpham']. "' , '" . $product['price'] . "' , '" . $_SESSION['qty_array'][$index] . "')";
        $index++;
        
    }
    var_dump($insertListSP);
    for($i=0 ; $i< count($insertListSP);$i++){
        $query1 = "INSERT INTO  chitietdonhang ( madonhang ,  masanpham ,  pricesale ,  quantity ) VALUES  ". $insertListSP[$i];
       
        $dbCon->insertOderdetail($query1);
    }
    
    $dbCon->disconnectDB();
    unset($_SESSION["cart"]);
    unset($_SESSION["tongtien"]);
    unset($_SESSION["qty_array"]);
    
    header("Location: ../view/shop.php");
}else{
    header("Location: ../view/check-out.php");
}


