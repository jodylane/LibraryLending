<?php
/**
 * Created by PhpStorm.
 * User: Luke Brown
 * Date: 11/16/2016
 */

//TODO Add file uploading

require_once('includes/header.php');
require_once('includes/database.php');

//if the script did not receive post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'title') ||
    !filter_has_var(INPUT_POST, 'author') ||
    !filter_has_var(INPUT_POST, 'isbn') ||
    !filter_has_var(INPUT_POST, 'publish_date') ||
    !filter_has_var(INPUT_POST, 'publisher') ||
    !filter_has_var(INPUT_POST, 'genre') ||
//    !filter_has_var(INPUT_POST, 'image') ||
    !filter_has_var(INPUT_POST, 'description')) {

    echo "There were problems retrieving book details. New book cannot be added.";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING));
$isbn = trim(filter_input(INPUT_POST, "isbn", FILTER_SANITIZE_NUMBER_INT));
$author = trim(filter_input(INPUT_POST, "author", FILTER_SANITIZE_STRING));
$genre = trim(filter_input(INPUT_POST, "genre", FILTER_SANITIZE_STRING));
$publish_date = trim(preg_replace("([^0-9-])", "", $_POST['publish_date']));
$publisher = trim(filter_input(INPUT_POST, "publisher", FILTER_SANITIZE_STRING));
$image = trim(filter_input(INPUT_POST, "image", FILTER_SANITIZE_URL));
$description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING));

$title = $conn->real_escape_string($title);
$isbn = $conn->real_escape_string($isbn);
$author = $conn->real_escape_string($author);
$genre = $conn->real_escape_string($genre);
$publish_date = $conn->real_escape_string($publish_date);
$publisher = $conn->real_escape_string($publisher);
$image = $conn->real_escape_string($image);
$description = $conn->real_escape_string($description);


//echo $image;
//$image = "nothing.jpg";

$sqlsetup = "
INSERT INTO 
books 
(title, isbn, author, publication_date, publisher, genre, description) 
VALUES 
('$title', '$isbn', '$author', '$publish_date', '$publisher', '$genre', '$description')
;";

$query = @$conn->query($sqlsetup);

if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    echo "Insert query failed: ($errno) $error.";
    require 'includes/footer.php';
    die();
}

//determine the id of the newly added book
$id = $conn->insert_id;

//create an inventory item
$inventory_sql = "INSERT INTO inventory (book_id) VALUES ($id);";

$inventory_query = @$conn->query($inventory_sql);

if (!$inventory_query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    echo "Insert query failed: ($errno) $error.";
    require 'includes/footer.php';
    die();
}

// close the connection.
$conn->close();

//display a confirmation message and a link to display details of the new book
echo "You have successfully inserted the new book into the database.";
echo "<p><a href='bookdetails.php?book_id=$id'>Book Details</a></p>";
require_once 'includes/footer.php';