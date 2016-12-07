<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 12/6/2016
 * Time: 8:16 PM
 * Description: This file was created to
 */
require 'includes/database.php';
require 'includes/header.php';
?>
<section class="login">
    <h2>Log In</h2>
    <form class="login-form" action="#">
        <input type="text" placeholder="username" autofocus/><br>
        <input type="password" placeholder="password"/><br>
        <button class="btn btn-default">Submit</button>
    </form>
    <p></p>
</section>
<?php
require 'includes/footer.php'
?>
