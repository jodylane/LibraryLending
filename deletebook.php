<?php
/**
 * Created by PhpStorm.
 * User: Luke Brown
 * Date: 11/16/2016
 */

require_once('includes/header.php');
require_once('includes/database.php');

//if nothing recieved, kill the page
if (!filter_has_var(INPUT_GET, 'book_id')) {
    echo "<section class='message'>";
    echo "<h3>There were problems retrieving book id, book was not deleted.</h3>";
    echo "<a href='booklist.php'>View Books</a>";
    echo "</section>";

    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$book_id = trim(filter_input(INPUT_GET, "book_id", FILTER_SANITIZE_NUMBER_INT));

$sql ="DELETE FROM books WHERE book_id = $book_id;";

$query = @$conn->query($sql);

if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    echo "<section class='message'>";
    echo "<h3>Delete query failed: ($errno) $error.  Book not deleted.</h3>";
    echo "<a href='index.php'>Return Home</a>";
    echo "</section>";
    require 'includes/footer.php';
    $conn->close();
    die();
}

// close the connection.
$conn->close();

//display a confirmation message and a link to the booklist
echo "<section class='message'>";
echo "<h3>You have successfully deleted the book from the database.</h3>";
echo "<a href='booklist.php'>View Books</a>";
echo "</section>";

require_once 'includes/footer.php';