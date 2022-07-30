<?php

include_once 'header.php';

?>

<section class="form container">

    <form action="includes/product.inc.php" method="POST" enctype="multipart/form-data">
        <h2>Add new product</h2>
        <div class="form-group">
            <input type="text" name="name" class="form-control"  placeholder="Enter product name">
        </div>
        <div class="form-group">
            <input type="number" name="price" class="form-control" placeholder="Enter product price">
        </div>
        <div class="form-group">
            <input type="number" name="quantity" class="form-control" placeholder="Enter product quantity">
        </div>
        <div class="form-group">
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" name="add_product" class="btn btn-primary">Add product</button>
    </form>
    
</section>

<?php

include_once "footer.php";

?>
