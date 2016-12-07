<?php
/**
 * User: Nathan Ekema
 * Date: 11/5/2016
 * Description: This file was created to be used as the book list page
 */

include "includes/header.php";
include "includes/database.php";
?>

<section class="book-list">

    <h2 class="booklist-headline">Book List</h2>

    <table class="booklist-table" style="width:100%">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Publish Date</th>
            <th>Publisher</th>
            <th>Genre</th>
        </tr>

        <?php
        while (($row = $query->fetch_assoc()) !== NULL) {
            echo "<tr>";
            echo "<td><a href='bookdetails.php?book_id=", $row['book_id'], "'>", $row['title'], "</a></td>";
            echo "<td>", $row['author'], "</td>";
            echo "<td>", $row['isbn'], "</td>";
            echo "<td>", $row['publication_date'], "</td>";
            echo "<td>", $row['publisher'], "</td>";
            echo "<td>", $row['genre'], "</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <?php
        if($admin == 1){
            echo "<a href='addbook.php'><button class='btn btn-success'>Add a new Book</button></a>";
        }
    ?>
<br>
<br>
</section>

<?php include "includes/footer.php"; ?>



