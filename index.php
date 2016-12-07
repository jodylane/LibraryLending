<?php
/**
 * User: Nathan Ekema
 * Date: 11/5/2016
 * Description: This file was created to display the home page
 */

include "includes/header.php";
include "includes/database.php";

// Selection from books table sort by title ascending
$sql = "SELECT title,image_link,book_id FROM books LIMIT 2";

// Execute query
$query = $conn->query($sql);

// Handle query errors
if (!$query) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    echo "<section class='message'>";
    echo "<h3>Selection failed with: ($errno) $errmsg\n</h3>";
    echo "<a href='index.php'>Return Home</a>";
    echo "</section>";
    $conn->close();
    require_once ('includes/footer.php');
    exit;
}

include "includes/featured.php";

include "includes/footer.php";
?>
