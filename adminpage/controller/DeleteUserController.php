<?php 
    
    $mauser=$_GET["id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbquanlyao";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("DELETE From khachhang where  mauser = :mauser");
        $stmt->bindParam(':mauser', $mauser, PDO::PARAM_STR);

        $stmt->execute();

        echo $stmt->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;

    header("Location: ../view/userpagelist.php");
?>