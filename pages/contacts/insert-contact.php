<header class="mt-4">
  <h2>
    Insert Contact
  </h2>
</header>
<?php
  $name = mysqli_real_escape_string($connection, $_POST["name"]);
  $email = mysqli_real_escape_string($connection, $_POST["email"]);
  $phone = mysqli_real_escape_string($connection, $_POST["phone"]);

  $sql = "INSERT INTO contacts (
  name,email,phone) VALUES(
  '{$name}', '{$email}', '{$phone}'
  )
  ";

  mysqli_query($connection, $sql) or die("Contact creation error" . mysqli_error($connection));

  echo "Contact successfully created";
?>