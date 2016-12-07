<?php
/**
 * Created by PhpStorm.
 * User: Luke Brown
 * Date: 11/16/2016
 */

//TODO Add file uploading

require_once('includes/header.php');
require_once('includes/database.php');

//if post is missing something, kill the page
if (!filter_has_var(INPUT_POST, 'book_id') ||
    !filter_has_var(INPUT_POST, 'title') ||
    !filter_has_var(INPUT_POST, 'author') ||
    !filter_has_var(INPUT_POST, 'isbn') ||
    !filter_has_var(INPUT_POST, 'publish_date') ||
    !filter_has_var(INPUT_POST, 'publisher') ||
    !filter_has_var(INPUT_POST, 'genre') ||
    !filter_has_var(INPUT_POST, 'description')) {
    echo "<section class='message'>";
    echo "<h3>There were problems retrieving book details. Book cannot be modified.</h3>";
    echo "<a href='index.php'>Return Home</a>";
    echo "</section>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$book_id = trim(filter_input(INPUT_POST, "book_id", FILTER_SANITIZE_NUMBER_INT));
$title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING));
$isbn = trim(filter_input(INPUT_POST, "isbn", FILTER_SANITIZE_NUMBER_INT));
$author = trim(filter_input(INPUT_POST, "author", FILTER_SANITIZE_STRING));
$genre = trim(filter_input(INPUT_POST, "genre", FILTER_SANITIZE_STRING));
$publish_date = trim(preg_replace("([^0-9-])", "", $_POST['publish_date']));
$publisher = trim(filter_input(INPUT_POST, "publisher", FILTER_SANITIZE_STRING));
$description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING));

$book_id = $conn->real_escape_string($book_id);
$title = $conn->real_escape_string($title);
$isbn = $conn->real_escape_string($isbn);
$author = $conn->real_escape_string($author);
$genre = $conn->real_escape_string($genre);
$publish_date = $conn->real_escape_string($publish_date);
$publisher = $conn->real_escape_string($publisher);
$description = $conn->real_escape_string($description);


$sql = "
UPDATE 
books 
SET
title = '$title',
isbn = '$isbn',
author = '$author',
genre = '$genre',
publication_date = '$publish_date',
publisher = '$publisher',
description = '$description'
WHERE
book_id = '$book_id';";

$query = @$conn->query($sql);

if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    echo "<section class='message'>";
    echo "<h3>Update query failed: ($errno) $error.</h3>";
    echo "<a href='index.php'>Return Home</a>";
    echo "</section>";
    require 'includes/footer.php';
    die();
}

// close the connection.
$conn->close();

//display a confirmation message and a link to display details of the book.
echo "<section class='message'>";
echo "<h3>You have successfully modified the book.</h3>";
echo "<a href='bookdetails.php?book_id=$book_id'>Book Details</a>";
echo "</section>";

require_once 'includes/footer.php';