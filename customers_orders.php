<?php 

include 'header.php'; 
include 'classes/order.classes.php';

$order = new Order();
$customersItems = $order->show_products_from_orders_to_the_right_vendor($_SESSION['userid']);

?>

<div class="container cart">
    <?php foreach($customersItems as $customerItems): ?>
    <div class="item-container">
        <div class="item-info">
            <img src="img/<?php echo $customerItems['product_image']; ?>" alt="" width="100px">
            <span class="name"><?php echo $customerItems['product_name']; ?></span>
            <span class="price">$<?php echo $customerItems['product_price']; ?></span>
        </div>
        <div class="item-control">
            <div class="control">
                <form method="post" action="includes/cart.inc.php">
                    <input type="number" name="quantity" value="<?php echo $customerItems['product_quantity']; ?>" />
                    <!-- <input type="hidden" name="product_id" value="<?php echo $cartOneItem['product_id'] ?>"> -->
                    <input type="submit" name="delete-from-cart" class="btn btn-primary" value="Complete">
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php include 'footer.php';?>
