<?php
  include("db/connection.php");
?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="assets/css/style.css?v=1.0">
  <title>Pipeline Agenda</title>
</head>
<body>
  <?php include("./pages/navbar.php") ?>
  <section>
    <div class="container">
      <main>
        <?php
          $menu = (isset($_GET["menu"])) ? $_GET["menu"] : "home"; 

          switch($menu) {
            case "add-contact": {
              include("pages/contacts/add-contact.php");
              break;
            }
            case "insert-contact": {
              include("pages/contacts/insert-contact.php");
              break;
            }
            case "edit-contact": {
              include("pages/contacts/edit-contact.php");
              break;
            }
            case "update-contact": {
              include("pages/contacts/update-contact.php");
              break;
            }
            case "delete-contact": {
              include("pages/contacts/delete-contact.php");
              break;
            }

            case "login": {
              include("pages/login.php");
              break;
            }

            case "register": {
              include("pages/register.php");
              break;
            }

            default: {
              include("pages/contacts/contacts.php");
              break;
            }
          }
        ?>
      </main>
      </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="./assets/js/validation.js"></script>
</body>
</html>