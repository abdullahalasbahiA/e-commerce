<?php

session_start();

include_once "../classes/product.classes.php";

$product = new Product();

if(isset($_POST['add_product'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $vendor_id = $_SESSION['userid'];
    
    $file = $_FILES['image'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileName = $fileName;
                $fileDesctination = '../img/' . $fileName;
                move_uploaded_file($fileTmpName, $fileDesctination);
            }
        }
    }

    $product->addProduct($name, $fileName, $price, $quantity, $vendor_id);
    header("location: ../index.php");

}
if(isset($_POST['update_product'])){

    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $fileName = "";

    $file = $_FILES['image'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    if($file['name'] == ""){
        $fileName = $_POST['defaultImage'];
    }

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileName = $fileName;
                $fileDesctination = '../img/' . $fileName;
                move_uploaded_file($fileTmpName, $fileDesctination);
            }
        }
    }
    $product->updateProduct($name,$price,$quantity,$fileName, $product_id);
    header("location: ../index.php?updated=$product_id");
}

if(isset($_POST['delete'])){
    $product->deleteProduct($_POST['id']);
    header("location: ../index.php?deleted"."".$_POST['id']);
}
// // SEARCH
// if(isset($_POST['search'])){
//     $searchingText = $_POST['searching_text'];
//     $product->searchProducts($searchingText);
//     header("location: ../index.php?searching=".$searchingText);
// }
