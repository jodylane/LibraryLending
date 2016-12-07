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

echo "You have successfully signed out!";
echo "<a href='index.php'>Return Home</a>";
require 'includes/footer.php';
?>
