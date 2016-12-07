<?php
/**
 * Created by PhpStorm.*/
require 'includes/database.php';
require 'includes/header.php';
?>

<section class="login">
    <form action="sendlogin.php" method="post">
        <table class="bookdetails" >
            <tr>
                <td>
                    <h4>Username:</h4>
                    <h4>Password:</h4>
                </td>
                <td>
                    <p><input required type="text" name="username"></p>
                    <p><input required type="password" name="password"></p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href="index.php"><button type="button" href="index.php" class="btn btn-danger" formnovalidate>Cancel</button></a>
                </td>
                <td>
                    <a href="signup.php"><button type="button" href="index.php" class="btn btn-info" formnovalidate>Register</button></a>
                </td>
                <td>
                    <input type="submit" class="btn btn-success right" value="Log In">
                </td>
            </tr>
        </table>
    </form>
<section class="login">

<?php
require 'includes/footer.php'
?>