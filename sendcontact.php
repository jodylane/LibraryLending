<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 12/6/2016
 * Time: 9:10 PM
 */

require_once('includes/header.php');

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'input-name') ||
    !filter_has_var(INPUT_POST, 'input-email') ||
    !filter_has_var(INPUT_POST, 'input-subject') ||
    !filter_has_var(INPUT_POST, 'input-message')
) {

    echo "You're missing something.";
    echo "<a href='contact.php'>Click here to return</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
$email = trim(filter_input(INPUT_POST, "input-email", FILTER_SANITIZE_EMAIL));
$subject = trim(filter_input(INPUT_POST, "input-subject", FILTER_SANITIZE_STRING));
$message = trim(filter_input(INPUT_POST, "input-message", FILTER_SANITIZE_STRING));


echo "Message validated.";
echo "<a href='index.php'>Click here to return</a>";
require_once 'includes/footer.php';