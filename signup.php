<?php
/**
 * User: Nathan Ekema
 * Date: 11/5/2016
 * Description: This file was created to be used as the signup page
 */

include "includes/header.php";
include "includes/database.php";
?>

  <section class="signup-section">

    <h2 class="signup-headline">Sign Up!</h2>

    <form class="sign-up-form">
      <input type="text" class="sign-up-input" placeholder="What's your username?" autofocus>
      <input type="password" class="sign-up-input" placeholder="Choose a password">
      <input type="submit" value="Sign me up!" class="sign-up-button">
    </form>

  </section>

<?php include "includes/footer.php"; ?>
