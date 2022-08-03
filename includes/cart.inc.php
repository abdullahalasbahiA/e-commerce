<?php

include_once "../classes/cart.classes.php";
$cart = new Cart();

if(isset($_SESSION['userid'])){
    if(isset($_POST['add-to-cart']) && isset($_SESSION['userid'])){

        $productId = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $image = $_POST['image'];
        $userId = $_POST['userid'];
        $vendorID = $_POST['vendorid'];
    
        $cart->addProduct($name,$price,$quantity,$image,$productId,$userId,$vendorID);
        header("location: ../index.php");
    
    }
    if(isset($_POST['update-the-cart'])){
    
        $userId = $_SESSION['userid'];
        $quantity = $_POST['quantity'];
        $productId = $_POST['product_id'];
    
        $cart->updateProduct($quantity, $productId, $userId);
        header("location: ../cart.php?quantityUpdated");
    
    }
    if(isset($_POST['delete-from-cart'])){
    
        $userId = $_SESSION['userid'];
        $productId = $_POST['product_id'];
    
        $cart->deleteProduct($productId, $userId);
        header("location: ../cart.php?quantityUpdated");
    
    }
    if(isset($_POST['cancel-the-order'])){
        $cart->cancelTheOrder($_SESSION['userid']);
        header("location: ../index.php?canceled_successfully");
    }
    if(isset($_POST['confirm-the-order'])){
        $cart->confirmTheOrder($_SESSION['userid']);
        header("location: ../my_orders.php");
    }
} else {
    header("location: ../login-signup.php");
}