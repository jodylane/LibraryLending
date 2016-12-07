<?php
/**
 * User: Nathan Ekema
 * Date: 11/5/2016
 * Description: This file was created to be used as the footer section
 */
?>
<footer>

  <nav class="nav-footer">
    <a class="a-footer" href="index.php">Home</a>
    <a class="a-footer" href="about.php">About</a>
    <?php
    if($firstname != ""){
      echo "<a class='a-footer' href='booklist.php'>Book List</a>";
      echo "<a class='a-footer' href='checkout.php'>Cart( $count )</a>";
    }

    ?>

    <a class="a-footer" href="contact.php">Contact</a>
    <?php

    if ($firstname != "") {
      echo "<span class='signup-btn'>";
      echo "<a class='a-footer' href='logout.php'>Sign Out</a></span>";
    } else {
      echo "<span class='signup-btn'>";
      echo "<a class='a-footer' href='login.php'>Sign In</a></span>";
    }
    ?>
  </nav>

  <p class="copyright">All content copyright 2016</p>

</footer>
</body>
</html>
