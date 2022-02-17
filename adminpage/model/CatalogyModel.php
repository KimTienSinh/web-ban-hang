<?php

include_once '../utils/MySQLUtils.php';

class Catalogy {

    private $madanhmuc;
    private $catname;
    private $caturl;
    private $status;

    public function __construct($catnamec, $caturlc, $statusc, $madanhmucc) {
        $this->madanhmuc = $madanhmucc;
        $this->catname = $titlec;
        $this->caturl = $imagec;
        $this->status = $statusc;
    }

    function getMadanhmuc() {
        return $this->madanhmuc;
    }

    function getCatname() {
        return $this->catname;
    }

    function getCaturl() {
        return $this->caturl;
    }

    function getStatus() {
        return $this->status;
    }

    function setCatname($catname) {
        $this->catname = $catname;
    }

    function setCaturl($caturl) {
        $this->caturl = $caturl;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    public function getAllCatalogy() {
        $dbCon = new MySQLUtils();
        $querypt = "SELECT * FROM danhmuc";
        $data = $dbCon->getAllData($querypt);
        $dbCon->disconnectDB();
        return $data;
    }

    public function getCatalogy() {
        $myDB = new MySQLUtils();
        $query = "SELECT * FROM danhmuc where madanhmuc=:madanhmuc";
        $param = array(":madanhmuc" => $this->getMadanhmuc());
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data[0];
    }


    public function insertCatalogy() {
        $myDB = new MySQLUtils();
        $query = "INSERT INTO danhmuc( catname, caturl, status)
                 VALUES (:catname, :caturl, :status )";
        $param = array(":catname" => $this->getCatname(), ":caturl" => $this->getCaturl(), ":status" => 0);
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }

    public function updateUser() {
        $myDB = new MySQLUtils();
        $query = "UPDATE danhmuc SET catname= :catname, caturl= :caturl, status= :status  where madanhmuc= :madanhmuc";
        $param = array(":catname" => $this->getCatname(), ":caturl" => $this->getCaturl(), ":status" => 0,":madanhmuc" =>$this->getMadanhmuc());
        $data = $myDB->updateData($query, $param);
        $myDB->disconnectDB();
        return $data;
    }

    public function deleteUser() {
        $myDB = new MySQLUtils();
        $query = "DELETE from danhmuc  where madanhmuc=:madanhmuc";
        $param = array(":madanhmuc" => $this->getMadanhmuc());
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }

}

?>