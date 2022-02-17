<?php

class MySQLUtils {

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private static $conn;

    public function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "dbquanlyao";
        if (self::$conn == NULL) {
            $this->connectDB();
            
        }
        return self::$conn;
    }

    public function __destruct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "dbquanlyao";
        self::$conn = NULL;
    }

   private function connectDB() {
        try {
            self::$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    

   public function disconnectDB() {
        self::$conn = NULL;
    }
    
    public function insertData($query,$param = array()){
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
    }   
    public function getData($query,$param = array()){
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }  
    public function getALLData($query){
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    public function updateData($query,$param = array()){
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        return $stmt->rowcount();
    }
    public function deleteData($query,$param = array()){
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        //return $stmt->rowcount();
    }
    public function get1($query,$param)
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param); 
        $sanpham = $stmt->fetch();
        return $sanpham;
    }
    public function insertOderdetail($query){
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
    }
}
