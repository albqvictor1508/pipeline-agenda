<header class="mt-4">
  <h2>Delete Contact</h2>
</header>

<?php
  $id = mysqli_real_escape_string($connection, $_GET["id"]);
  $sql = "DELETE FROM contacts WHERE id = '{$id}'";

  mysqli_query($connection, $sql) or die("Error deleting the contact: " + mysqli_error($connection));

  echo "Contact deleted successfully";
?>