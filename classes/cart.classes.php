<?php

include "dbh.classes.php";

class Cart extends Dbh {

    public function addProduct($name,$price,$quantity,$image,$product_id,$user_id){
        $sql = "SELECT * FROM cart WHERE product_id='$product_id'";
        $sql = "INSERT INTO cart(product_name,product_price,product_quantity,
        product_image,product_id,user_id) 
        VALUES (?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name,$price,$quantity,$image,$product_id,$user_id]);
    }

    public function countCartItems($userId){
        $sql = "SELECT * FROM cart WHERE user_id='$userId';";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll()[0];

        echo"<pre>";
        print_r($result);
        echo"</pre>";
    }

    // public function updateProduct($quantity, $id){
    //     $sql = "UPDATE cart SET product_quantity=? WHERE id=?";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$quantity, $id]);
    // }

    // public function getProducts(){
    //     $sql = "SELECT * FROM product ORDER BY product_id DESC;";
    //     $stmt = $this->connect()->query($sql);
    //     $result = $stmt->fetchAll();
    //     return $result;
    // }

    // // VIP >>> To generate pages for each product
    // public function getProductById($productId){
    //     $productId = preg_replace("#[^0-9]#", "", $productId);
    //     $sql = "SELECT * FROM product WHERE product_id LIKE '$productId';";
    //     $stmt = $this->connect()->query($sql);
    //     $result = $stmt->fetchAll();
    //     return $result;
    // }

    // public function deleteProduct($id){
    //     $sql = "DELETE FROM product WHERE product_id=?;";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$id]);
    // }

}
