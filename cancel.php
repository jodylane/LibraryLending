<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 11/29/2016
 * Time: 9:23 PM
 * Description: This file was created to
 */
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
//empty the shopping cart
$_SESSION['cart'] = "";
header("Location: booklist.php")
?>
