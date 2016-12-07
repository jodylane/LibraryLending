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

    <form class="sign-up-form" action="#">
      <input type="text" class="input" placeholder="What's your username?" autofocus>
      <input type="email" class="input" placeholder="What's your email?">
      <input type="text" class="input" placeholder="What's your address?">
      <input type="password" class="input" placeholder="Choose a password">
      <input type="password" class="input" placeholder="Confirm your password">
      <input type="submit" value="Sign me up!" class="btn btn-default">
    </form>

  </section>

<?php include "includes/footer.php"; ?>
