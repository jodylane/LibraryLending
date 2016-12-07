<?php
/**
 * <<<<<<< Updated upstream
 * User: Nathan Ekema
 * Date: 11/5/2016
 * Description: This file was created to be used as the signup page
 */

include "includes/header.php";
include "includes/database.php";
?>
<section class="signup">
    <form action="sendsignup.php" method="post">

        <input required type="text" name="username" placeholder="Choose a username" class="input" autofocus>
        <input required type="text" name="firstname" placeholder="First name" class="input">
        <input required type="text" name="lastname" placeholder="Last name" class="input">
        <input required type="email" name="email" placeholder="Email" class="input">
        <input required type="password" name="password" placeholder="Password" class="input">

        <a href="index.php">
            <button type="button" href="index.php" class="btn btn-danger" formnovalidate>Cancel</button>
        </a>

        <input type="submit" class="btn btn-success" value="Sign Up">

    </form>
</section>

<?php include "includes/footer.php"; ?>
