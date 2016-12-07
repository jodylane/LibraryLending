<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 12/6/2016
 * Time: 6:46 PM
 */


require_once('includes/header.php');
require_once('includes/database.php');

    //if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'username') ||
    !filter_has_var(INPUT_POST, 'firstname') ||
    !filter_has_var(INPUT_POST, 'lastname') ||
    !filter_has_var(INPUT_POST, 'email') ||
    !filter_has_var(INPUT_POST, 'password')
) {

    echo "Something was not passed in.";
    echo "<a href='signup.php'>Click here to return</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}


$username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
$firstname = trim(filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING));
$lastname = trim(filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING));
$email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
$password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

$username = $conn->real_escape_string($username);
$firstname = $conn->real_escape_string($firstname);
$lastname = $conn->real_escape_string($lastname);
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

if(strlen($username) < 1 ||
    strlen($firstname) < 1 ||
    strlen($lastname) < 1 ||
    strlen($email) < 1 ||
    strlen($password) < 1
){
    echo "Something was not passed in.";
    echo "<a href='signup.php'>Click here to return</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$sql = "INSERT INTO users (user_name, first_name, last_name, user_email, password) VALUES ('$username', '$firstname', '$lastname', '$email', '$password');";

$query = @$conn->query($sql);

if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    echo "Create user failed: ($errno) $error.";
    require 'includes/footer.php';
    die();
}

$id = $conn->insert_id;

$conn->close();

echo "Welcome to Lending Library, $firstname";
echo "<p><a href='index.php'>Return to Home</a></p>";
require_once 'includes/footer.php';