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
        <input class="input" name="name" type="text" placeholder="Name" required>
        <input class="input" name="email" type="email" placeholder="Email address" required>
        <input class="input" name="subject" type="text" placeholder="Subject" required>
        <textarea class="input" name="message" type="text" placeholder="Message" required></textarea>

        <input type="submit" value="Submit" class="btn btn-default">

    </form>

</section>

<?php include "includes/footer.php"; ?>
