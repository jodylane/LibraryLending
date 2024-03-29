<?php
/**
 * Created by PhpStorm.
 * User: Luke Brown
 * Date: 11/16/2016
 */

include "includes/header.php";
include "includes/database.php";

//checks to see if id was passed if no id is found display error exit code
if(!filter_has_var(INPUT_GET,'book_id')){
    echo "<section class='message'>";
    echo "<h3>Error: book id was not found.</h3>";
    echo "<a href='index.php'>Return Home</a>";
    echo "</section>";
    require_once ('includes/footer.php');
    exit();
}

//set id to this
$book_id = filter_input(INPUT_GET,'book_id',FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT * FROM books WHERE book_id=" . $book_id;

// execute the query
$query = @$conn->query($sql);


//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once ('includes/footer.php');
    exit;
}

//retrieve results
$row = $query->fetch_assoc();
?>
<form action="modifybook.php" method="post">
    <table class="bookdetails" >
        <tr>
            <td>
                <?php
                if(strlen($row['image_link']) == 0){
                    echo "<img src='assets/book_covers/no_cover.gif'/>";
                }
                else{
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
                <p style="display: none"><input required type="text" name="book_id" value="<?= $book_id ?>"></p>
                <p><input required type="text" name="title" value="<?= $row['title'] ?>"></p>
                <p><input required type="text" name="author" value="<?= $row['author'] ?>"></p>
                <p><input required type="text" name="genre" value="<?= $row['genre'] ?>"></p>
                <p><input required type="number" name="isbn" value="<?= $row['isbn'] ?>"></p>
                <p><input required type="date" name="publish_date" value="<?= $row['publication_date'] ?>"></p>
                <p><input required type="text" name="publisher" value="<?= $row['publisher'] ?>"></p>
                <p><input required type="text" name="description" value="<?= $row['description'] ?>"></p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="bookdetails.php?book_id=<?= $book_id ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
            </td>
            <td>
                <input type="submit" class="btn btn-success" value="Update">
            </td>
        </tr>
    </table>
</form>

<?php
include "includes/footer.php"
?>