<?php
/**
 * Created by PhpStorm.
 * User: Luke Brown
 * Date: 11/16/2016
 */
include "includes/header.php";

?>

<form action="insertbook.php" method="post" enctype="multipart/form-data">
    <table class="bookdetails">
        <tr>
            <td>
<!--                TODO Add file uploading-->
<!--                <h5>Please select an image to upload:</h5>-->
<!--                <input type="file" name="file" accept="image/*">-->
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
                <p><input required type="text" name="title"></p>
                <p><input required type="text" name="author"></p>
                <p><input required type="text" name="genre"></p>
                <p><input required type="number" name="isbn"></p>
                <p><input required type="date" name="publish_date"></p>
                <p><input required type="text" name="publisher"></p>
                <p><input required type="text" name="description"></p>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="booklist.php"><button type="button" class="btn btn-danger"  formnovalidate>Cancel</button></a>
            </td>
            <td>
                <input type="submit" class="btn btn-success right" value="Add Book">
            </td>
        </tr>
    </table>
</form>

<?php
include "includes/footer.php"
?>