<?php
/**
 * User: Nathan Ekema
 * Date: 11/5/2016
 * Description: This file was created to be used as the contact page
 */

include "includes/header.php";
include "includes/database.php";
?>

  <!-- Contact form -->
  <section class="contact">

    <h2 class="contact-headline">Contact Us!</h2>

      <form class="contact-form">

        <div class="message">

          <input class="input" type="text" id="input-name" placeholder="Name">
          <input class="input" type="email" id="input-email" placeholder="Email address">
          <input class="input" type="text" id="input-subject" placeholder="Subject">

        </div>

        <div class="message">

          <textarea class="input" name="message" type="text" id="input-message" placeholder="Message"></textarea>

        </div>

        <input type="submit" value="Submit" id="input-submit">

      </form>

  </section>

<?php include "includes/footer.php"; ?>
