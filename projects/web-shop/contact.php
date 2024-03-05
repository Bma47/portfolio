<?php
include('page-content/database-.php');

include('page-content/navbaar.php');


?>

<body>

<h3>Contact Form</h3>

<div class="container-forum">
    <form action="/action_page.php" method="post">
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="firstname" placeholder="Your name..">

      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Your email..">

      <label for="subject">Subject</label>
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

      <input type="submit" value="Submit">
    </form>
  </div>
  <?php


include('page-content/footer.php');

?>
