<?php
  include("db/connection.php");
?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css?v=1.0">
  <title>Pipeline Agenda</title>
</head>
<body>
  <?php include("./pages/navbar.php") ?>
  <section>
      <main>
        <hr>
        <?php
          $menu = (isset($_GET["menu"])) ? $_GET["menu"] : "home"; 

          switch($menu) {
            case "tasks": {
              include("pages/tasks.php");
              break;
            }
            case "contacts": {
              include("pages/contacts/contacts.php");
              break;
            }
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
            case "events": {
              include("pages/events.php");
              break;
            }

            default: {
              include("pages/home.php");
              break;
            }
          }
        ?>
      </main>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="./assets/js/script.js"></script>
</body>
</html>