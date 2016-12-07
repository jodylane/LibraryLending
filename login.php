<?php
/**
 * Created by PhpStorm.*/
require 'includes/database.php';
require 'includes/header.php';
?>
<section class="login">
    <form action="sendlogin.php" method="post">
        <input required type="text" name="username" class="input" placeholder="Username" autofocus>
        <input required type="password" name="password" class="input" placeholder="Password">
        <a href="index.php"><button type="button" href="index.php" class="btn btn-danger" formnovalidate>Cancel</button></a>
        <input type="submit" class="btn btn-success" value="Log In">
        <p>Don't have an account with us? Sign up now!</p>
        <a href="signup.php"><button type="button" href="index.php" class="btn btn-info" formnovalidate>Signup</button></a>
    </form>
</section>
<?php
require 'includes/footer.php'
?>