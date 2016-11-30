<?php
/**
 * User: Nathan Ekema
 * Date: 11/5/2016
 * Description: This file was created to be used as the header section
 */
if (session_status() == PHP_SESSION_NONE){
  session_start();
}
$count = 0;
// retrieve cart content
if(isset($_SESSION['cart'])){
  $cart = $_SESSION['cart'];
  if($cart){
    $count = array_sum($cart);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Library Lending</title>
  <link href="css/sections.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>

  <nav>
    <span><a href="#">Sign In/Sign Up</a></span>
    <a href="showcart.php">Cart(<?= $count?>)</a>
    <a href="booklist.php">Book List</a>
    <a href="about.php">About</a>
    <a href="index.php">Home</a>
  </nav>

  <h2 class="headline">Best source for knowledge<h2>

  <form action="searchresults.php" method="get">
    <input class="search-input" type="text" name="terms" placeholder=" Search for...">
    <input type="submit" value="Go!" class="btn-search">
  </form>

  <p class="sub-headline">there are a lot of books here, search for them because there's a lot</p>

</header>
