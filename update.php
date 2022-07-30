<?php

include_once 'header.php';
include "classes/product.classes.php";


$product = new Product();

$productId = $_GET['id'];
$productAssoc = $product->getProductById($productId)[0];

echo "<pre>";
print_r($productAssoc);
echo "</pre>";

?>
<section class="form container">

    <form action="includes/product.inc.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <h2>Update <?php echo $productAssoc['product_name']; ?></h2>
        <div class="form-group">
            <input value="<?php echo $productAssoc['product_name']; ?>" type="text" name="name" class="form-control"  placeholder="Enter product name">
        </div>
        <div class="form-group">
            <input value="<?php echo $productAssoc['product_price']; ?>" type="number" name="price" class="form-control" placeholder="Enter product price">
        </div>
        <div class="form-group">
            <input value="<?php echo $productAssoc['product_quantity']; ?>" type="number" name="quantity" class="form-control" placeholder="Enter product quantity">
        </div>
        <div class="form-group">
            <input type="hidden" name="defaultImage" value="<?php echo $productAssoc['product_image'];?>">
            <img src="<?php echo "img/".$productAssoc['product_image']; ?>" width="200px" alt="">
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" name="update_product" class="btn btn-primary">Update product</button>
    </form>
    
</section>

<?php

include_once "footer.php";

?>
