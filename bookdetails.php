<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 11/8/2016
 * Time: 11:34 PM
 * Description: This file was created to
 */
include "includes/header.php";
include "includes/database.php";

//checks to see if id was passed if no id is found display error exit code
if (!filter_has_var(INPUT_GET, 'book_id')) {
    echo "<section class='message'>";
    echo "<h3>Error: book id was not found.</h3>";
    echo "<a href='booklist.php'>Return Home</a>";
    echo "</section>";

    require_once('includes/footer.php');
    exit();
}

//set id to this
$book_id = filter_input(INPUT_GET, 'book_id', FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT title, description, books.book_id, author, genre, publisher, publication_date, isbn, image_link, item_id, count(is_available) AS num_copy FROM books, inventory WHERE books.book_id=" . $book_id . " AND inventory.book_id=" . $book_id . " AND is_available=1 GROUP BY title";

// execute the query
$query = $conn->query($sql);

//retrieve results
$row = $query->fetch_assoc();

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    echo "<section class='message'>";
    echo "<h3>Selection failed with: ($errno) $errmsg</h3>";
    echo "<a href='booklist.php'>Return Home</a>";
    echo "</section>";
    $conn->close();
    //include the footer
    require_once('includes/footer.php');
    exit;
}
?>
<table class="bookdetails">
    <tr>
        <td>
            <?php
            if (strlen($row['image_link']) == 0) {
                echo "<img src='assets/book_covers/no_cover.gif'/>";
            } else {
                echo "<img src='assets/book_covers/", $row['image_link'], "'/>";
            }
            ?>
        </td>
        <td>
            <h4>Title:</h4>
            <h4>Author:</h4>
            <h4>Genre:</h4>
            <h4>ISBN:</h4>
            <h4>Date:</h4>
            <h4>Publisher:</h4>
            <h4>Available:</h4>
            <h4>item:</h4>
            <h4>Description:</h4>

        </td>
        <td>
            <p><?= $row['title'] ?></p>

            <p><?= $row['author'] ?></p>

            <p><?= $row['genre'] ?></p>

            <p><?= $row['isbn'] ?></p>

            <p><?= $row['publication_date'] ?></p>

            <p><?= $row['publisher'] ?></p>
            <p><?= $row['num_copy'] ?></p>
            <p><?= $row['item_id'] ?></p>

            <p><?= $row['description'] ?></p>

        </td>
    </tr>
</table>
<div class="details-holder">
    <a href="booklist.php">
        <button href="booklist.php" class="btn btn-danger">Cancel</button>
    </a>
    <?php
    if ($admin == 1) {
        echo "<a href='editbookdetails.php?book_id=" . $book_id . "'>";
        echo "<button class='btn btn-info'>Modify</button>";
        echo "</a>";
        echo "<a href='deletebook.php?book_id=" . $book_id . "'>";
        echo "<button class='btn btn-danger'>Delete Book</button>";
        echo "</a>";
        echo "<a href='addtocart.php?book_id=" . $book_id . "&item_id=" . $row['item_id'] . "'>";
        echo "<button class='btn btn-success right'>Add to Cart</button>";
        echo "</a>";
    }
    else if($firstname !=""){
        echo "<a href='addtocart.php?book_id=" . $book_id . "'>";
        echo "<button class='btn btn-success right'>Add to Cart</button>";
        echo "</a>";
    }
    ?>



</div>
<br>
<br>
<?php
include "includes/footer.php"
?>
