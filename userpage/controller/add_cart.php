<?php

session_start();
include_once '../../adminpage/utils/MySQLUtils.php';
//$_SESSION['cart'] = array();
    //check if product is already in the cart
    if(!in_array($_GET['id'], $_SESSION['cart'])){
            array_push($_SESSION['cart'], $_GET['id']);
           // $_SESSION['cart'][] =  $_GET['id'];
    }
    
header('location: ../view/shop.php');
?>