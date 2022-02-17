<?php

include_once '../utils/MySQLUtils.php';

class Product {

    private $masanpham;
    private $title;
    private $image;
    private $price;
    private $status;
    private $madanhmuc;

    public function __construct($masanphampr, $titlepr, $imagepr, $pricepr, $statuspr, $madanhmucpr) {
        $this->masanpham = $masanphampr;
        $this->title = $titlepr;
        $this->image = $imagepr;
        $this->price = $pricepr;
        $this->status = $statuspr;
        $this->madanhmuc = $madanhmucpr;
    }

    function getMasanpham() {
        return $this->masanpham;
    }

    function getTitle() {
        return $this->title;
    }

    function getImage() {
        return $this->image;
    }

    function getPrice() {
        return $this->price;
    }

    function getStatus() {
        return $this->status;
    }

    function getMadanhmuc() {
        return $this->madanhmuc;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setMadanhmuc($madanhmuc) {
        $this->madanhmuc = $madanhmuc;
    }

    public function getAllProduct() {
        $dbCon = new MySQLUtils();
        $querypt = "SELECT * FROM sanpham";
        $data = $dbCon->getAllData($querypt);
        $dbCon->disconnectDB();
        return $data;
    }

    public function getProduct() {
        $myDB = new MySQLUtils();
        $query = "SELECT * FROM sanpham where masanpham=:masanpham";
        $param = array(":masanpham" => $this->getMasanpham());
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data[0];
    }

    public function insertProduct() {
        $myDB = new MySQLUtils();
        $query = "INSERT INTO sanpham( title, image, price, status, madanhmuc)
                 VALUES ( :title, :image, :price, :status, :madanhmuc)";
        $param = array(":title" => $this->getTitle(), ":image" => $this->getImage(),
            ":price" => $this->getPrice(), ":status" => 0, ":madanhmuc" => $this->getMadanhmuc());
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }

    public function updateProduct() {
        $myDB = new MySQLUtils();
        $query = "UPDATE sanpham SET title= :title, image= :image, price= :price,status= :status,
                 madanhmuc= :madanhmuc WHERE masanpham= :masanpham";
        $param = array(":title" => $this->getTitle(), ":image" => $this->getImage(),
            ":price" => $this->getPrice(), ":status" => 0, ":madanhmuc" => $this->getMadanhmuc());
        $data = $myDB->updateData($query, $param);
        $myDB->disconnectDB();
        return $data;
    }

    public function deleteUser() {
        $myDB = new MySQLUtils();
        $query = "DELETE from sanpham  where masanpham= :masanpham";
        $param = array(":masanpham" => $this->getMasanpham());
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }

}
