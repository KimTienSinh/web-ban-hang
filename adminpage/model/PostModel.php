<?php

include_once '../utils/MySQLUtils.php';

class PostModel {

    private $mabaiviet;
    private $postname;
    private $madanhmuc;

    function __construct($mabaivietp, $postnamep, $madanhmucp) {
        $this->mabaiviet = $mabaivietp;
        $this->postname = $postnamep;
        $this->madanhmuc = $madanhmucp;
    }

    function getMabaiviet() {
        return $this->mabaiviet;
    }

    function getPostname() {
        return $this->postname;
    }

    function getMadanhmuc() {
        return $this->madanhmuc;
    }

    function setPostname($postname) {
        $this->postname = $postname;
    }

    function setMadanhmuc($madanhmuc) {
        $this->madanhmuc = $madanhmuc;
    }

    public function getAllPost() {
        $dbCon = new MySQLUtils();
        $querypt = "SELECT * FROM baiviet";
        $data = $dbCon->getAllData($querypt);
        $dbCon->disconnectDB();
        return $data;
    }

    public function getPost() {
        $myDB = new MySQLUtils();
        $query = "SELECT * FROM baiviet where mabaiviet=:mabaiviet";
        $param = array(":mabaiviet" => $this->getMabaiviet());
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data[0];
    }

    public function insertCatalogy() {
        $myDB = new MySQLUtils();
        $query = "INSERT INTO danhmuc( postname, madanhmuc )
                 VALUES (:postname, :madanhmuc )";
        $param = array(":postname" => $this->getPostname(), ":madanhmuc" => $this->getMadanhmuc());
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }

    public function updateUser() {
        $myDB = new MySQLUtils();
        $query = "UPDATE danhmuc SET postname= :postname, madanhmuc= :madanhmuc where mabaiviet= :mabaiviet";
        $param = array(":postname" => $this->getPostname(), ":madanhmuc" => $this->getMadanhmuc());
        $data = $myDB->updateData($query, $param);
        $myDB->disconnectDB();
        return $data;
    }

    public function deleteUser() {
        $myDB = new MySQLUtils();
        $query = "DELETE from baiviet  where mabaiviet=:mabaiviet";
        $param = array(":mabaiviet" => $this->getMabaiviet());
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }

}
