<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 12/7/2016
 * Time: 3:31 AM
 * Description: This file was created to
 */
require 'includes/header.php';
//unset session variables
session_unset();
//delete session cookie
setcookie(session_name(), '', time()-3600);
//destroy the session
session_destroy();
echo "<section class='message'>";
echo "<h3>You have successfully signed out!</h3>";
echo "<a href='index.php'>Return Home</a>";
echo "</section>";
require 'includes/footer.php';
?>
