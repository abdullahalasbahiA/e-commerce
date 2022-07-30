<?php

session_start();

if(isset($_POST['add-to-cart']) && isset($_SESSION['userid'])){

    include_once "../classes/cart.classes.php";
    $cart = new Cart();

    $productId = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];
    $userId = $_POST['userid'];
    
    // echo $productId;
    // echo $productName;
    // echo $productPrice;
    // echo $productQuantity;
    // echo $productImage;
    // echo $productUserId;

    $cart->addProduct($name,$price,$quantity,$image,$productId,$userId);
    header("location: ../index.php");

} else {
    header("location: ../login-signup.php");
}
