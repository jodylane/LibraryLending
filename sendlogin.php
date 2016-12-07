<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 12/6/2016
 * Time: 6:43 PM
 */

require_once('includes/header.php');
require_once('includes/database.php');

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'username') ||
    !filter_has_var(INPUT_POST, 'password')
) {

    echo "Please go back and include a username and password";
    echo "<a href='login.php'>Click here to return</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
$password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

if(strlen($username) < 1 ||
    strlen($password) < 1
){

    echo "Please go back and include a username and password";
    echo "<a href='login.php'>Click here to return</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$sql = "SELECT * FROM users WHERE user_name = '$username' AND password = '$password';";


$query = @$conn->query($sql);

//retrieve results
$row = $query->fetch_assoc();

if(!$row){
    echo "Invalid username or password";
    echo "<a href='login.php'>Click here to return</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}


//user info
$user_id = $row['user_id'];
$firstname = $row['first_name'];
$lastname = $row['last_name'];
$username = $row['user_name'];
$email = $row['user_email'];
$admin = $row['is_admin'];

//start session
$_SESSION['first_name'] = $firstname;
$_SESSION['last_name'] = $lastname;
$_SESSION['user_name'] = $username;
$_SESSION['user_email'] = $email;
$_SESSION['user_id'] = $user_id;
$_SESSION['is_admin'] = $admin;
echo "Successfully logged in to Lending Library, " , $_SESSION['first_name'];
echo "<p><a href='index.php'>Return to Home</a></p>";
require_once 'includes/footer.php';