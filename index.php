<?php

include_once 'header.php';
include_once "classes/product.classes.php";

$productClass = new Product();
$products = $productClass->getProducts();

// SEARCH
if(isset($_POST['submit_search'])){
  $searchingText = $_POST['searching_text'];
  $searchResults = $productClass->searchProducts($searchingText);
}

?>      

<div class="container">
  <div class="row justify-content-center">
		<form class="form" action="" method="post">
      <input type="text" name="searching_text" placeholder="search for item(s)..." />
      <button type="submit" name="submit_search">search...</button>
    </form>
    <?php

    // If you are not using search show all the product [*1]
    if(!isset($_POST['submit_search'])){
      foreach($products as $product){
			
        echo "<div class='card col-lg-1' style='width: 18rem;'>";
  
        if((isset($_SESSION['userid'])) && ($product['product_vendor_id'] === $_SESSION['userid'])){
          echo "
          <a href='update.php?id=".$product['product_id']."' class='btn btn-primary'>update</a>
          <form action='includes/product.inc.php' method='POST'>
            <input type='hidden' name='id' value='". $product['product_id'] . "'>
            <button class='btn btn-danger' type='submit' name='delete'>delete</button>
          </form>
          ";
        }
        
        echo '<img src="img/'.$product['product_image'].'" class="card-img-top" alt="'.$product['product_image'].'">';
        echo "
          <div class='card-body'>
            <a href='view.php?id=".$product['product_id']."'>
              <h5 class='card-title'>".$product['product_id']."-".$product['product_name']."</h5>
            </a>
            <p class='card-text'>"."The description"."</p>
              <span>Price: $".$product['product_price']."</span><br>
              <form action='includes/cart.inc.php' method='post'>
                <input type='hidden' name='id' value='".$product['product_id']."'>
                <input type='hidden' name='name' value='".$product['product_name']."'>
                <input type='hidden' name='price' value='".$product['product_price']."'>
                <input type='hidden' name='quantity' value='1'>
                <input type='hidden' name='image' value='".$product['product_image']."'>
                <input type='hidden' name='userid' value='";
                    if(isset($_SESSION['userid'])){
                      echo $_SESSION['userid'];
                    }
                echo"'>
                <button id='add-to-cart' type='submit' name='add-to-cart' class='btn btn-success'>Add to cart</button>
              </form>
                <button type='submit'  class='btn btn-primary'>Buy now</button>
            </div>
          </div>
        ";
      }  
    } 
    // else then you are using searching [*2]
    else {
      // so only show the searching results [*3]
      // echo "<pre>";
      // print_r($searchResults);
      // echo "</pre>";
        foreach($searchResults as $searchResult){
			
          echo "<div class='card col-lg-1' style='width: 18rem;'>";
    
          if((isset($_SESSION['userid'])) && ($searchResult['product_vendor_id'] === $_SESSION['userid'])){
            echo "
            <button class='btn btn-primary'>update</button>
            <form action='includes/product.inc.php' method='POST'>
              <input type='hidden' name='id' value='". $searchResult['product_id'] . "'>
              <button class='btn btn-danger' type='submit' name='delete'>delete</button>
            </form>
            ";
          }
          
          echo '<img src="img/'.$searchResult['product_image'].'" class="card-img-top" alt="'.$searchResult['product_image'].'">';
          echo "
            <div class='card-body'>
            <h5 class='card-title'>".$searchResult['product_id']."-".$searchResult['product_name']."</h5>
            <p class='card-text'>"."The description"."</p>
            <span>Price: $".$searchResult['product_price']."</span><br>
            <a href='' class='btn btn-primary'>Buy now</a>
            <a id='add-to-cart' href='#' class='btn btn-success'>Add to cart</a>
            </div>
            </div>
          ";
        }}
		?>
  </div>
</div>

<?php

include_once "footer.php"; 

?>
