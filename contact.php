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

      <form class="contact-form" action="sendcontact.php" method="post">

        <div class="message">

          <input class="input" type="text" id="input-name" placeholder="Name" required>
          <input class="input" type="email" id="input-email" placeholder="Email address" required>
          <input class="input" type="text" id="input-subject" placeholder="Subject" required>

        </div>

        <div class="message">

          <textarea class="input" name="message" type="text" id="input-message" placeholder="Message" required></textarea>

        </div>

        <input type="submit" value="Submit" class="btn btn-default">

      </form>

  </section>

<?php include "includes/footer.php"; ?>
