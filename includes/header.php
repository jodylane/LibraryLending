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
if(isset($_SESSION['user_id']) &&
isset($_SESSION['user_name']) &&
isset($_SESSION['first_name']) &&
isset($_SESSION['last_name']) &&
isset($_SESSION['user_email']) &&
isset($_SESSION['is_admin'])){
  $user_id = $_SESSION['user_id'];
  $username = $_SESSION['user_name'];
  $firstname = $_SESSION['first_name'];
  $lastname = $_SESSION['last_name'];
  $email = $_SESSION['user_email'];
  $admin = $_SESSION['is_admin'];
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

    <nav class="header-nav">
      <a class="a-header" href="index.php">Home</a>
      <a class="a-header" href="about.php">About</a>
      <a class="a-header" href="booklist.php">Book List</a>
      <a class="a-header" href="checkout.php">Cart(<?= $count?>)</a>
      <a class="a-header" href="contact.php">Contact</a>
      <?php

      if($firstname == "Josh"){
        echo "<span class='signup-btn'>";
        echo "<a class='a-header' href='logout.php'>Sign Out</a></span>";
      }else{
        echo "<span class='signup-btn'>";
        echo "<a class='a-header' href='login.php'>Sign In</a></span>";
      }
      ?>
    </nav>

    <h2 class="headline">Best source for knowledge<h2>

  <form action="searchresults.php" method="get">
    <input class="search-input" type="text" name="terms" placeholder=" Search for...">
    <input type="submit" value="Go!" class="btn-search">
  </form>

    <p class="sub-headline">there are a lot of books here, search for them because there's a lot</p>

  </header>
