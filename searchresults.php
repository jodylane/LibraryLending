<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 11/29/2016
 * Time: 9:43 PM
 * Description: This file was created to
 */
require_once ('includes/header.php');
require_once('includes/database.php');
if(filter_has_var(INPUT_GET,'terms')){
    $terms_str = filter_input(INPUT_GET,'terms',FILTER_SANITIZE_STRING);
}else{
    echo "<section class='message'>";
    echo "<h3>There were no search terms found.</h3>";
    echo "<a href='index.php'>Return Home</a>";
    echo "</section>";
    include 'includes/footer.php';
    exit;
}
$terms = explode(" ", $terms_str);

$sql = "SELECT books.book_id, title, author, genre, count(is_available) AS num_copy FROM books, inventory WHERE 1";
foreach($terms as $term){
    $sql .= " AND title LIKE '%$term%' AND is_available=1 AND inventory.book_id=books.book_id";
}
$sql .= " GROUP BY title";
$query = $conn->query($sql);
if(!$query){
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "<section class='message'>";
    echo "<h3>Selection failed with: ($errno) $errmsg</h3>";
    echo "<a href='index.php'>Return Home</a>";
    echo "</section>";
    $conn->close();
    include 'includes/footer.php';
    exit;
}

if($query->num_rows == 0){
    echo "<section class='message'>";
    echo "<h3>Your search <i>$term_str</i> did not match any books in our inventory.</h3>";
    echo "<a href='index.php'>Return Home</a>";
    echo "</section>";
    include 'includes/footer.php';
    exit;
}
?>
<section class="showcart">
    <?="<h2 class='booklist-headline'>Your Search: <i>\"$terms_str\"</i></h2>"?>
    <table class="booklist-table">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Available Copies</th>
        </tr>
        <?php
        while(($row = $query->fetch_assoc())!== NULL){
            echo "<tr>";
            echo "<td><a href='bookdetails.php?book_id=", $row['book_id'],"'>", $row['title'],"</a></td>";
            echo "<td>", $row['author'], "</td>";
            echo "<td>", $row['genre'], "</td>";
            echo "<td>", $row['num_copy'], "</td>";
        }
        ?>
    </table>
    <br>
    <br>
</section>
<?php
include 'includes/footer.php';
?>
