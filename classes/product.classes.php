<?php

include "dbh.classes.php";

class Product extends Dbh{

    public function addProduct($name, $fileName, $price, $quantity, $vendor_id){
        $sql = "INSERT INTO product(product_name,product_price,product_quantity,product_vendor_id, product_image) VALUES (?,?,?,?,?)";
        // $this->connect()->query($sql);
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $price, $quantity, $vendor_id, $fileName]);
    }

    public function updateProduct($name, $price,$quantity,$image, $product_id){
        $sql = "UPDATE product SET product_name=?, product_price=?, product_quantity=?, product_image=? WHERE product_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $price,$quantity,$image, $product_id]);
    }

    public function getProducts(){
        $sql = "SELECT * FROM product ORDER BY product_id DESC;";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function searchProducts($searchingText){
        $searchq = preg_replace("#[^0-9a-z]#i", "", $searchingText);
        $sql = "SELECT * FROM product WHERE product_name LIKE '%$searchq%';";
        // $stmt = $this->connect()->query($sql);
        // $stmt->execute([$searchingText]);
        // $result = $stmt->fetchAll();
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    // VIP >>> To generate pages for each product
    public function getProductById($productId){
        $productId = preg_replace("#[^0-9]#", "", $productId);
        $sql = "SELECT * FROM product WHERE product_id LIKE '$productId';";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function deleteProduct($id){
        $sql = "DELETE FROM product WHERE product_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
