<?php 

include 'header.php'; 
include 'classes/order.classes.php';

$order = new Order();
$orderItems = $order->user_products_from_cart_to_the_orders($_SESSION['userid']);

?>



<!-- <div class="container cart">
    <?php foreach($cartItems as $cartOneItem): ?>
    <div class="item-container">
        <div class="item-info">
            <img src="img/<?php echo $cartOneItem['product_image'] ?>" alt="" width="100px">
            <span class="name"><?php echo $cartOneItem['product_name'] ?></span>
            <span class="price">$<?php echo $cartOneItem['product_price'] ?></span>
        </div>
        <div class="item-control">
            <div class="control">
                <form method="post" action="includes/cart.inc.php">
                    <input type="number" name="quantity" value="<?php echo $cartOneItem['product_quantity'] ?>" />
                    <input type="hidden" name="product_id" value="<?php echo $cartOneItem['product_id'] ?>">
                    <input type="submit" name="delete-from-cart" class="btn btn-danger" value="Delete">
                    <input type="submit" name="update-the-cart"  class="btn btn-success" value="Update">
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="checkout-container">
            <span class="price"><?php echo "Total price: ".$cart->cartTotalPrice($_SESSION['userid']); ?></span>
            <form action="includes/cart.inc.php" method="post">
                <button type="submit" name="confirm-the-order" class="btn btn-primary" value="Confirm the order">
                <input type="submit" name="cancel-the-order" class="btn btn-danger" value="Cancel Order">
            </form>
    </div>
</div> -->

<?php include 'footer.php';?>
