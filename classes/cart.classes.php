<?php

include "dbh.classes.php";

class Cart extends Dbh{

    public function addProduct($name,$price,$quantity,$image,$product_id,$user_id,$vendor_id){
        $sql1 = "SELECT * FROM cart WHERE product_id='$product_id' AND user_id='$user_id'";
        $stmt1 = $this->connect()->query($sql1);
        $product = $stmt1->fetch();
        $product_quantity = $product['product_quantity'];
        if(($product_id == $product['product_id']) && ($user_id == $product['user_id'])){
            $product_quantity = $product_quantity + 1;
            $sql2 = "UPDATE cart SET product_quantity = '$product_quantity' WHERE product_id='$product_id' AND user_id='$user_id'";
            $stmt1 = $this->connect()->query($sql2);
        } else {        
            $sql3 = "INSERT INTO cart(product_name,product_price,product_quantity,
            product_image,product_id,user_id,product_vendor_id)
            VALUES (?,?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql3);
            $stmt->execute([$name,$price,$quantity,$image,$product_id,$user_id,$vendor_id]);
        }
    }

    public function showCartItems($userId){
        $sql = "SELECT * FROM cart WHERE user_id='$userId';";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }
    
    public function cartTotalPrice($user_id){
        $totalPrice = 0;
        $sql = "SELECT * FROM cart WHERE user_id='$user_id'";
        $stmt = $this->connect()->query($sql);
        $products = $stmt->fetchAll();
        foreach($products as $product){
            $totalPrice = $totalPrice + ($product['product_quantity'] * $product['product_price']);
        }
        return "$".$totalPrice;
    }

    public function updateProduct($quantity, $product_id, $user_id){
        //UPDATE cart SET product_quantity=19 WHERE product_id=4 AND user_id=2;
        $sql = "UPDATE cart SET product_quantity=? WHERE product_id=? AND user_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$quantity, $product_id, $user_id]);
    }

    public function deleteProduct($product_id, $user_id){
        $sql = "DELETE FROM cart WHERE product_id=? AND user_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id, $user_id]);
    }

    public function cancelTheOrder($user_id){
        $sql = "DELETE FROM cart WHERE user_id='$user_id';";
        $this->connect()->query($sql);
        // $stmt->execute([$user_id]);
    }

    public function confirmTheOrder($user_id){
        $sql = "SELECT * FROM cart WHERE user_id='$user_id'";
        // execute the sql statment
        $stmt = $this->connect()->query($sql);
        // save the all rows in an assocative array
        $products = $stmt->fetchAll();
        // [SQL statement] insert the cart product to orders table
        $sql2 = "INSERT INTO
        orders(product_name, product_price, product_quantity, product_image, product_id, user_id,product_vendor_id)
        VALUES(?,?,?,?,?,?,?);";
        $stmt = $this->connect()->prepare($sql2);
        foreach($products as $product){
            $stmt->execute(
                [
                    $product['product_name'],
                    $product['product_price'],
                    $product['product_quantity'],
                    $product['product_image'],
                    $product['product_id'],
                    $product['user_id'],
                    $product['product_vendor_id']
                ]
            ); // stmt execute end
        } // foreach end
        $this->cancelTheOrder($user_id);
    }


}
