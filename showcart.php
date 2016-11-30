<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 11/29/2016
 * Time: 6:38 PM
 * Description: This file was created to
 */
require_once 'includes/header.php';
require_once 'includes/database.php';
if(!isset($_SESSION['cart']) || !$_SESSION['cart']){
    echo "Your shopping cart is empty.";
    require_once 'includes/footer.php';
    exit;
}
$cart = $_SESSION['cart'];
?>
<table>
    <tr>
        <th>Title</th>
        <th>Available Copies</th>
        <th>Quantity</th>
        <th>Due Date</th>
    </tr>
    <?php
        $sql = "SELECT title, due_date, item_id, count(is_available) AS num_copy FROM books, inventory WHERE 0";
        foreach(array_keys($cart) as $id){
            $sql .= " OR inventory.book_id=$id AND books.book_id=$id AND is_available=1";
        }
    $sql .= " GROUP BY title";
    echo $sql;
    $query = $conn->query($sql);
    while($row = $query->fetch_assoc()){
        $title = $row['title'];
        $num_copy = $row['num_copy'];
        $qty = $cart[$id];
        $due_date = date('Y-m-d',strtotime('+2 week')) . "\n";
        echo "<tr>",
        "<td><a href='bookdetails.php?book_id=". $id."'>$title</a></td>",
        "<td>$num_copy</td>",
        "<td>$qty</td>",
        "<td>$due_date</td>",
        "</tr>";
    }

    ?>
</table>
<div>
    <a href="cancel.php"><button class="btn btn-danger">Cancel</button></a>
    <a href="checkout.php"><button class="btn btn-success">Checkout</button></a>

</div>
<?php
require_once 'includes/footer.php';
?>

