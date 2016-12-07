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
    echo "Error: book id was not found.";
    require_once('includes/footer.php');
    exit();
}

//set id to this
$book_id = filter_input(INPUT_GET, 'book_id', FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT * FROM books WHERE book_id=" . $book_id;

// execute the query
$query = $conn->query($sql);

//retrieve results
$row = $query->fetch_assoc();

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
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
                <h4>Description:</h4>
            </td>
            <td>
                <p><?= $row['title'] ?></p>

                <p><?= $row['author'] ?></p>

                <p><?= $row['genre'] ?></p>

                <p><?= $row['isbn'] ?></p>

                <p><?= $row['publication_date'] ?></p>

                <p><?= $row['publisher'] ?></p>

                <p><?= $row['description'] ?></p>
            </td>
        </tr>
    </table>
    <div class="details-holder">
        <a href="booklist.php">
            <button href="booklist.php" class="btn btn-danger">Cancel</button>
        </a>

        <a href="editbookdetails.php?book_id=<?= $row['book_id'] ?>">
            <button class="btn btn-info">Modify</button>
        </a>

        <a href="deletebook.php?book_id=<?= $row['book_id'] ?>">
            <button class="btn btn-danger">Delete Book</button>
        </a>

        <a href="addtocart.php?book_id=<?= $row['book_id'] ?>">
            <button class="btn btn-success right">Add to Cart</button>
        </a>
    </div>
<br>
<br>
<?php
include "includes/footer.php"
?>
