<?php

include "dbh.classes.php";

class Order extends Dbh {

    // dont neet this here
    public function user_products_from_cart_to_the_orders($user_id){
        // [SQL statement] get all products from the cart
        $sql = "SELECT * FROM cart WHERE user_id='$user_id'";
        // execute the sql statment
        $stmt = $this->connect()->query($sql);
        // save the all rows in an assocative array
        $products = $stmt->fetchAll();
        // [SQL statement] insert the cart product to orders table
        $sql2 = "INSERT INTO
        orders(product_name, product_price, product_quantity, product_image, product_id, user_id)
        VALUES(?,?,?,?,?,?);";
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
    } // productsFromCart function end

    public function show_products_from_orders_to_the_right_vendor($user_id){
        // get the vendor ids
        $sql = "SELECT * FROM orders WHERE product_vendor_id='$user_id'";
        $stmt = $this->connect()->query($sql);
        // products saved from the orders table
        $products = $stmt->fetchAll();
        return $products;
    }

    public function show_customers_emails(){
        
    }


}
