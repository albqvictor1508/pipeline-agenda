<header>
  <h3>
    Update Contact
  </h3>
</header>
<?php
  $name = mysqli_real_escape_string($connection, $_POST["name"]);
  $email = mysqli_real_escape_string($connection, $_POST["email"]);
  $phone = mysqli_real_escape_string($connection, $_POST["phone"]);

  $sql = "UPDATE contacts SET
  name = {$name},
  email = {$email},
  phone = {$phone},
  WHERE id = $id
  ";

  mysqli_query($connection, $sql) or die("Contact creation error" . mysqli_error($connection));

  echo "Contact successfully updated";
?>