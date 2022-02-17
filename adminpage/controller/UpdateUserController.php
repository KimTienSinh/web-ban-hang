<?php 

include_once '../utils/MySQLUtils.php';

function getUserByEmail($email) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbquanlyao";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT email,password FROM khachhang where email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

function updatePassword($email, $newpassword) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbquanlyao";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE khachhang set password=:pasword where email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':pasword', $newpassword, PDO::PARAM_STR);
        
        $stmt->execute();

        echo $stmt->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}


$user_action = "";
// $mauser = $_GET['id'];

if(count($_POST)>0){
    $user_action = $_POST['user_action'];
    switch ($user_action){
        case 'user_update':
            $txt_id = $_POST['txt_id'];
            $txt_name = $_POST['txt_name'];
            $txt_email = $_POST['txt_email'];
            $txt_address =$_POST['txt_address'];
            $txt_phone =$_POST['txt_phone'];
            $dbCon = new MySQLUtils();
            $query = "update khachhang set username=:username, email=:email, address=:address, phone=:phone
             where mauser=:mauser";
            $param = array(":username"=>$txt_name, ":email"=>$txt_email, ":address"=>$txt_address, ":phone"=>$txt_phone, ":mauser"=>$txt_id);
            $dbCon->updateData($query ,$param);
            header("Location: ../view/userpagelist.php");
    }
}


?>