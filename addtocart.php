<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 11/29/2016
 * Time: 6:20 PM
 * Description: This file was created to
 */
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(isset($_SESSION['cart'])){
    $cart =$_SESSION['cart'];
}else{
    $cart = array();
}
if(!filter_has_var(INPUT_GET,'book_id')){
    require_once 'includes/header.php';
    $error = "Book id was not found. Operation cannot proceed.";
    echo $error;
    require_once 'includes/footer.php';
    exit;
}
$id = filter_input(INPUT_GET,'book_id',FILTER_SANITIZE_NUMBER_INT);
if(!is_numeric($id)){
    require_once 'includes/header.php';
    $error = "Invalid book id. Operation cannot proceed.";
    echo $error;
    require_once 'includes/footer.php';
    exit;
}
if(array_key_exists($id,$cart)){
    $cart[$id] = $cart[$id] + 1;
}else{
    $cart[$id] = 1;
}
$_SESSION['cart'] = $cart;
header("Location: showcart.php")
?>
