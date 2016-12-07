<?php
/**
<<<<<<< Updated upstream
 * User: Nathan Ekema
 * Date: 11/5/2016
 * Description: This file was created to be used as the signup page

 */

include "includes/header.php";
include "includes/database.php";

?>

<form action="sendsignup.php" method="post">
    <table class="bookdetails" >
        <tr>
            <td>
                <h4>Choose a username:</h4>
                <h4>First Name:</h4>
                <h4>Last Name:</h4>
                <h4>E-mail:</h4>
                <h4>Password:</h4>
            </td>
            <td>
                <p><input required type="text" name="username"></p>
                <p><input required type="text" name="firstname"></p>
                <p><input required type="text" name="lastname"></p>
                <p><input required type="email" name="email"></p>
                <p><input required type="password" name="password"></p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="index.php"><button type="button" href="index.php" class="btn btn-danger" formnovalidate>Cancel</button></a>
            </td>
            <td>
                <input type="submit" class="btn btn-success right" value="Register">
            </td>
        </tr>
    </table>
</form>

<?php include "includes/footer.php"; ?>
