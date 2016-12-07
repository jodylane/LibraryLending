<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 12/6/2016
 * Time: 9:10 PM
 */

require_once('includes/header.php');

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'name') ||
    !filter_has_var(INPUT_POST, 'email') ||
    !filter_has_var(INPUT_POST, 'subject') ||
    !filter_has_var(INPUT_POST, 'message')
) {

    echo "<section class='message'>";
    echo "<h3>You're missing something.</h3>";
    echo "<a href='contact.php'>Click here to return</a>";
    echo "</section>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
$email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
$subject = trim(filter_input(INPUT_POST, "subject", FILTER_SANITIZE_STRING));
$message = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING));

echo "<section class='message'>";
echo "<h3>Message validated.</h3>";
echo "<a href='index.php'>Click here to return</a>";
echo "</section>";
require_once 'includes/footer.php';