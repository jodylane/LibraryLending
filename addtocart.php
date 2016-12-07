<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 11/29/2016
 * Time: 6:20 PM
 * Description: This file was created to
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = array();
}
if (!filter_has_var(INPUT_GET, 'book_id') ||
    !filter_has_var(INPUT_GET, 'item_id')) {
    require_once 'includes/header.php';
    $error = "Book id was not found. Operation cannot proceed.";
    echo "<section class='message'>";
    echo "<h3>$error</h3>";
    echo "<a href='index.php'>Return Home</a>";
    echo "</section>";
    require_once 'includes/footer.php';
    exit;
}
$id = filter_input(INPUT_GET, 'book_id', FILTER_SANITIZE_NUMBER_INT);
$item_id = filter_input(INPUT_GET, 'item_id', FILTER_SANITIZE_NUMBER_INT);
if (!is_numeric($id)) {
    require_once 'includes/header.php';
    $error = "Invalid book id. Operation cannot proceed.";
    echo "<section class='message'>";
    echo "<h3>$error</h3>";
    echo "<a href='index.php'>Return Home</a>";
    echo "</section>";
    require_once 'includes/footer.php';
    exit;
}
if (!is_numeric($item_id)) {
    require_once 'includes/header.php';
    $error = "Invalid item id. Operation cannot proceed.";
    echo "<section class='message'>";
    echo "<h3>$error</h3>";
    echo "<a href='index.php'>Return Home</a>";
    echo "</section>";
    require_once 'includes/footer.php';
    exit;
}
if (array_key_exists($id, $cart)) {
    $cart[$id] = $cart[$id] + 1;
} else {
    $cart[$id] = 1;
}
$_SESSION['cart'] = $cart;

header("Location: showcart.php")
?>
