<?php 

    session_start();
    // require_once "classes/cart.classes.php";
    // $cart = new Cart();
    // $count = null;
    // if(isset($_SESSION['userid'])){
    //     $count = $cart->countCartItems($_SESSION['userid']);
    // }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Phones Shop</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){
                $('')
            });
        </script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Apple Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
                <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
                </li>

                <?php
                    if(isset($_SESSION['userid'])){
                        echo '
                        <li class="nav-item">
                        <a class="nav-link active" href="#">Profile</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            '.$_SESSION['useruid'].'
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="add-product.php">Add products</a></li>
                            <li><a class="dropdown-item" href="includes/logout.inc.php">Logout</a></li>
                        </ul>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="includes/logout.inc.php">Logout</a></li>
                        </ul>
                        </li>
                        ';
                    } else {
                        echo '
                        <li class="nav-item">
                        <a class="nav-link active" href="login-signup.php">Login/Signup</a>
                        </li>
                        ';
                    }
                ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Phones</a></li>
                    <li><a class="dropdown-item" href="#">Labtops</a></li>
                    <li><a class="dropdown-item" href="#">Accessories</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="cart.php?count=<?php echo $count; ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/shopping-cart.png" alt="Shopping cart icons created by Freepik - Flaticon" width="20px"/><span class="cart-items">
                        <?php
                            // echo $count;
                        ?>
                    </span>
                </a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

