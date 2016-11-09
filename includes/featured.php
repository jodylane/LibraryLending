<?php
/**
 * User: Nathan Ekema
 * Date: 11/5/2016
 * Description: This file was created to be used as the featured section of the home page
 */
?>

<!-- featured section -->
<section class="featured-section">

    <!-- headline -->
    <h3 class="featured-headline">Featured Books</h3>

    <!-- book thumbnails -->
    <div class="bookthumb-container">
        <?php

        while (($row = $query->fetch_assoc()) !== NULL) {
            echo "<a class='book_thumb' href='bookdetails.php?book_id=", $row['book_id'], "'>";
            echo "<div class='book-overlay'>";
            echo "<img src='assets/book_covers/", $row['image_link'], "'/>";
            echo "</div></a>";
        }

        ?>
    </div>

</section>
