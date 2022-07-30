<?php

include "classes/product.classes.php";

// product class object
$product = new Product();

include "header.php";
if(isset($_GET['id'])){
    
    $productId = $_GET['id'];
    $productAssoc = $product->getProductById($productId)[0];
    
?>

<div class="container">
  <div class="row justify-content-center">

    <div class="card">
        <div class="row">
        <div class="col-md-auto" style="border: 1px solid black;">
            <img src="<?php echo "img/".$productAssoc["product_image"];?>" width="400px" alt="">
        </div>
        <div class="col" >
            <?php
                echo "<h1>". $productAssoc['product_name']."</h1>";
                echo "<p style='max-height:300px;overflow: scroll;'>"."
                    Lorem Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit natus cum itaque tempore sunt! Ex amet, fugiat facilis laboriosam explicabo asperiores quis? Commodi natus perferendis consequuntur, illo vitae dignissimos exercitationem deserunt ad ducimus! Itaque debitis nihil officiis veniam nesciunt id nam qui asperiores reiciendis quae libero porro numquam dolorum sed amet, laborum soluta corrupti perspiciatis placeat veritatis, velit aliquam. Quidem minus ullam vel minima ad eos at culpa nam, facilis possimus quasi. Voluptatibus nesciunt ipsa nisi obcaecati animi odio. Quas tenetur ut quasi. At culpa nihil quam quaerat sed officiis pariatur, nesciunt nam a voluptatum quia. Quae beatae placeat voluptatum. Reprehenderit necessitatibus quia non excepturi tempora doloribus laboriosam iure accusantium facere voluptatum, dolorem id quos nisi maxime illum officiis omnis architecto reiciendis! Officia nostrum iste accusamus sequi reiciendis dolore dicta dolores, sint pariatur, dignissimos, laboriosam est quidem eaque ipsum quaerat doloribus nobis natus veniam itaque at ratione ea officiis molestias. Dolores dolorem fugit cum. Modi quasi blanditiis officia explicabo cum assumenda quam dolorem unde neque in dolore tempora, aspernatur enim et. Iusto ipsam natus voluptatum atque labore ipsum eaque reprehenderit obcaecati est delectus, architecto ut aliquid exercitationem neque recusandae nisi amet dolores placeat, pariatur iure culpa fugit. Minus, rem qui. ipsum Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit ad incidunt fugit quisquam, rerum sunt qui harum sint. Cumque quia labore consectetur sit quidem accusantium voluptates reiciendis asperiores deserunt, illo magnam deleniti provident quis tenetur commodi obcaecati aut quibusdam iusto, sapiente aliquam minus facere. Quam consectetur beatae eveniet necessitatibus incidunt ipsum tenetur similique pariatur unde neque maiores deserunt, dolorem voluptatibus nihil. A nisi suscipit, molestias amet veritatis beatae quisquam quas quibusdam corporis nostrum voluptatum reprehenderit quo in recusandae commodi sunt exercitationem maiores inventore eligendi ipsam! Porro ut suscipit a, aliquid esse voluptatem corrupti tenetur natus minima dolor, pariatur quas laborum! Ex dolores vel aut sapiente totam quas cumque aliquid, assumenda cum maxime amet commodi consectetur rem laudantium quia similique, esse corporis. Unde vel tempora impedit placeat quae, nemo autem dolores suscipit minus. Ducimus, dicta! Cumque et pariatur voluptatum illo, impedit, cupiditate harum laboriosam temporibus mollitia omnis, facere at architecto itaque sit. Ad quis soluta autem deleniti illum, asperiores dignissimos laborum atque! Alias iure quia doloremque exercitationem necessitatibus libero provident reprehenderit quae corrupti ex reiciendis facere nisi voluptas numquam officia pariatur aperiam beatae esse, officiis quas facilis consectetur distinctio? Fuga nemo distinctio natus magni. Ea officiis eum ut minima incidunt voluptas! or sit amet, consectetur adipisicing elit. Nemo nisi obcaecati temporibus ipsum id repellat, unde, laudantium dolorum, atque perferendis ratione accusamus adipisci vero voluptate! Vitae quas consequatur eos aspernatur.
                "."</p>";
                echo "
                    <span>Price: $".$productAssoc['product_price']."</span>
                    <br>
                    <a href='' class='btn btn-primary'>Buy now</a>
                    <a href='#' class='btn btn-success'>Add to cart</a>
                ";
            ?>
        </div>
    </div>
    </div>
  
  </div>
</div>

<?php

}


include "footer.php";?>