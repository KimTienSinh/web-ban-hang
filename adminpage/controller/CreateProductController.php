<?php



function insertProduct($txt_title,$txt_image,$txt_price,$status,$madanhmuc) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbquanlyao";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO sanpham (title,image,price,status,madanhmuc) VALUES(:title,:image,:price,:status,:madanhmuc)");
        $stmt->bindParam(':title', $txt_title, PDO::PARAM_STR);
        $stmt->bindParam(':image', $txt_image, PDO::PARAM_STR);
        $stmt->bindParam(':price', $txt_price, PDO::PARAM_INT );
        $stmt->bindParam(':status', $status, PDO::PARAM_INT );
        $stmt->bindParam(':madanhuc', $madanhmuc, PDO::PARAM_INT);

        $stmt->execute();
        var_dump($stmt);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
    $txt_title = $_POST["txt_title"];
    $txt_image = $_POST["txt_image"];
    $txt_price = $_POST["txt_price"];
    $txt_catalogy = $_POST["txt_catalogy"];
    $status = 0;
   //$param= array($txt_title, $txt_image, $txt_price, $status,$txt_catalogy);
  insertProduct($txt_title, $txt_image, $txt_price, $status,$txt_catalogy);
   //insertProduct($param);
    var_dump($param);
?>