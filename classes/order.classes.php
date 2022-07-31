<?php

include "dbh.classes.php";

class Order extends Dbh {

    public function addProduct($name,$price,$quantity,$image,$product_id,$user_id){
        $sql1 = "SELECT * FROM order WHERE product_id='$product_id' AND user_id='$user_id'";
        $stmt1 = $this->connect()->query($sql1);
        $product = $stmt1->fetch();
        $product_quantity = $product['product_quantity'];
        if(($product_id == $product['product_id']) && ($user_id == $product['user_id'])){
            $product_quantity = $product_quantity + 1;
            $sql2 = "UPDATE order SET product_quantity = '$product_quantity' WHERE product_id='$product_id' AND user_id='$user_id'";
            $stmt1 = $this->connect()->query($sql2);
        } else {        
            $sql3 = "INSERT INTO order(product_name,product_price,product_quantity,
            product_image,product_id,user_id) 
            VALUES (?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql3);
            $stmt->execute([$name,$price,$quantity,$image,$product_id,$user_id]);
        }
    }

    public function showOrderItems($userId){
        $sql = "SELECT * FROM order WHERE user_id='$userId';";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }
    
    public function orderTotalPrice($user_id){
        $totalPrice = 0;
        $sql = "SELECT * FROM order WHERE user_id='$user_id'";
        $stmt = $this->connect()->query($sql);
        $products = $stmt->fetchAll();
        foreach($products as $product){
            $totalPrice = $totalPrice + ($product['product_quantity'] * $product['product_price']);
        }
        return "$".$totalPrice;
    }

    public function updateProduct($quantity, $product_id, $user_id){
        //UPDATE order SET product_quantity=19 WHERE product_id=4 AND user_id=2;
        $sql = "UPDATE order SET product_quantity=? WHERE product_id=? AND user_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$quantity, $product_id, $user_id]);

    }

    public function deleteProduct($product_id, $user_id){
        $sql = "DELETE FROM order WHERE product_id=? AND user_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id, $user_id]);
    }

    public function cancelTheOrder($user_id){
        $sql = "DELETE FROM order WHERE user_id='$user_id';";
        $this->connect()->query($sql);
        // $stmt->execute([$user_id]);
    }

    public function confirmTheOrder($user_id){
        
        $this->cancelTheOrder($user_id);
    }


}
