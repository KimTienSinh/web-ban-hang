<?php

include_once '../utils/MySQLUtils.php';

class UserModel {

    //put your code here
    private $mauser;
    private $username;
    private $email;
    private $password;
    private $address;
    private $phone;
    private $gioitinh;
    private $sothich;
    private $role;

    public function __construct($name, $mail, $pass, $add, $uphone, $sthich, $gtinh, $ro, $uID) {
        $this->mauser = $uID;
        $this->username = $name;
        $this->email = $mail;
        $this->password = $pass;
        $this->address = $add;
        $this->phone = $uphone;
        $this->sothich = $sthich;
        $this->gioitinh = $gtinh;
        $this->role = $ro;
    }

    public function showUser() {
        echo "Tên: " . $this->username . "<br>";
        echo "Email: " . $this->email . "<br>";
        echo "Sở thích: " . $this->sothich . "<br>";
        echo "Giới tính: " . $this->gioitinh . "<br>";
    }

    public function getUserid() {
        return $this->mauser;
    }

    public function get_username() {
        return $this->username;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_password() {
        return $this->password;
    }

    public function get_address() {
        return $this->address;
    }

    public function get_phone() {
        return $this->phone;
    }

    public function get_sothich() {
        return $this->sothich;
    }

    public function get_gioitinh() {
        return $this->gioitinh;
    }

    public function get_role() {
        return $this->role;
    }

    public function get_mauser() {
        return $this->mauser;
    }
    function setUsername($username) {
        $this->username = $username;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setGioitinh($gioitinh) {
        $this->gioitinh = $gioitinh;
    }

    function setSothich($sothich) {
        $this->sothich = $sothich;
    }

    function setRole($role) {
        $this->role = $role;
    }

    public function getAllUser() {
        $dbCon = new MySQLUtils();
        // $item_in_page = !empty($_GET['item_inpage']) ? $_GET['item_inpage'] : 4;
        // $page = !empty($_GET['page']) ? $_GET['page'] : 1;
        // $offset = ($page - 1) * $item_in_page;
        // $query = "SELECT * FROM khachhang LIMIT " . $item_in_page . " OFFSET  " . $offset . "";
         $querypt = "SELECT * FROM khachhang";
        // $u = $dbCon->getAllData($querypt);
        // $sumuser = count($u);

        // $totalpage = ceil($sumuser / $item_in_page);
        //echo $totalpage;
        $data = $dbCon->getAllData($querypt);
        $dbCon->disconnectDB();
        return $data;
    }
    public function getUser() {
        $myDB = new MySQLUtils();
        $query = "SELECT * FROM khachhang where mauser=:mauser";
        $param = array(":mauser" => $this->get_mauser());
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data[0];
    }

    public function getUserByEmail() {
        $myDB = new MySQLUtils();
        $query = "SELECT userID,username,password,email,sex,avatar FROM user where email=:email";
        $param = array(":email" => $this->get_email());
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data[0];
    }

    public function insertUser() {
        $myDB = new MySQLUtils();
        $query = "INSERT INTO khachhang (username, email, password, address, phone, status, prefer, sex, role, createdAt)
         VALUES (:username, :email, :password, :address, :phone, :status, :prefer, :sex, :role, :createdAt)";
        $param = array(":username" => $this->get_username(), ":email" =>$this->get_email(), ":password" => $this->get_password(),
         ":address" => $this->get_address(), ":phone" => $this->get_phone(), ":status" => 0, ":prefer" =>$this->get_sothich(),
          ":sex" => $this->get_gioitinh(), ":role" => $this->get_role(), ":createdAt"=>date("Y-m-d H:i:s"));
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }

    public function updateUser() {
        $myDB = new MySQLUtils();
        $query = "UPDATE khachhang set  username=:username,  address=:address, phone=:phone  where mauser=:mauser";
        $param = array(":mauser" => $this->get_mauser(), ":username" => $this->get_username(), ":address" => $this->get_address(),":phone" => $this->get_phone());
        $data = $myDB->updateData($query, $param);
        $myDB->disconnectDB();
        return $data;
    }

    public function deleteUser() {
        $myDB = new MySQLUtils();
        $query = "DELETE from khachhang  where mauser=:mauser";
        $param = array(":mauser" => $this->get_mauser());
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }

}
