<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 11/29/2016
 * Time: 9:14 PM
 * Description: This file was created to
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//empty the shopping cart
$_SESSION['cart'] = "";
require_once 'includes/header.php';
?>

<section class='message'>
    <h2 class="booklist-headline">Checkout</h2>

    <p class="checkout">Thank you for shopping with us. Your business is greatly appreciated. You will be notified
        once your items are shipped</p>
    <a href='index.php'>Return Home</a>

</section>

<?php include('includes/footer.php') ?>
