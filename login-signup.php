<?php

include_once 'header.php';

?>

<section class="form container">

    <form action="includes/login.inc.php" method="POST">
        <h2>Login</h2>
        <div class="form-group">
            <input type="text" name="uid" class="form-control"  placeholder="Enter email or username">
        </div>
        <div class="form-group">
            <input type="password" name="pwd" class="form-control" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>

    <form action="includes/signup.inc.php" method="POST">
        <h2>Signup</h2>
        <div class="form-group">
            <input type="email" name="email" class="form-control"  placeholder="Enter email">
        </div>
        <div class="form-group">
            <input type="text" name="uid" class="form-control" placeholder="Enter username">
        </div>
        <div class="form-group">
            <input type="password" name="pwd" class="form-control" placeholder="Enter password">
        </div>
        <div class="form-group">
            <input type="password" name="pwdrepeat" class="form-control" placeholder="Enter password repeat">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Signup</button>
    </form>
    
</section>


<?php

include_once "footer.php";

?>