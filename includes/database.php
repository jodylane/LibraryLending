<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 11/8/2016
 * Time: 10:08 PM
 * Description: This file was created to
 */

//database connection variables
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "library_lending";

// connecting to the bookstore_db
$conn = @new mysqli($host,$login,$password,$database);

// Handle connection errors
if($conn ->connect_errno){
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die("Connection to database failed : ($errno) $errmsg.");
}

// Selection from books table sort by title ascending
$sql = "SELECT title,author,genre,publisher,publication_date,isbn,book_id FROM books ORDER BY title ASC";

// Execute query
$query = $conn->query($sql);

// Handle query errors
if (!$query) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once ('includes/footer.php');
    exit;
}
?>
