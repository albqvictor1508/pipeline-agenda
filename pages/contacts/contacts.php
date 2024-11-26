<header>
  <h3>Contacts!</h3>
</header>
  
  <div class="contacts-table">
    <a href="index.php?menu=add-contact" style="text-decoration: none;">
      <button>New contact.</button>
    </a>
    <div class="mt-5">
      <form action="index.php?menu=contacts" method="post" class="contacts-search" autocomplete="off" >
        <input type="search" name="txt_search" class="table__input-search" />
        <button type="submit" class="table__search-button">Search</button>
      <!-- name="txt_search" -->
      </form>
    </div>
    
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Favorite</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $quantityOfContactsPerPage = 10;
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $start = ($quantityOfContactsPerPage * $page) - $quantityOfContactsPerPage;
  
        $txt_search = isset($_POST["txt_search"]) ? mysqli_real_escape_string($connection, $_POST["txt_search"]) : "";
  
        $sql = "
          SELECT * FROM contacts
          WHERE id='{$txt_search}' OR name LIKE '%{$txt_search}%'
          ORDER BY name ASC
          LIMIT $start, $quantityOfContactsPerPage
        ";
        $rs = mysqli_query($connection, $sql) or die("Error executing the query: " . mysqli_error($connection));
  
        while ($data = mysqli_fetch_assoc($rs)) {
      ?>
      <tr>
        <td><?= htmlspecialchars($data["id"]) ?></td>
        <td><?= htmlspecialchars($data["name"]) ?></td>
        <td><?= htmlspecialchars($data["email"]) ?></td>
        <td><?= htmlspecialchars($data["phone"]) ?></td>
        <td><?= htmlspecialchars($data["favority_flag"]) ?></td>
        <td><button class="table__edit-button" ><a href="index.php?menu=edit-contact&id=<?= htmlspecialchars($data["id"]) ?>">Edit</a></button></td>
        <td><button class="table__delete-button" ><a href="index.php?menu=delete-contact&id=<?= htmlspecialchars($data["id"]) ?>">Delete</a></button></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<br>
<?php
  $totalSQL = "SELECT id FROM contacts";
  $qr = mysqli_query($connection, $totalSQL) or die(mysqli_error($connection));
  $numTotal = mysqli_num_rows($qr);
  $pageTotal = ceil($numTotal / $quantityOfContactsPerPage);

  echo "Total of contacts: $numTotal<br>";

  if ($page > 1) {
    echo "<a href=\"?menu=contacts&page=" . ($page - 1) . "\"> << </a>";
  }

  for ($i = 1; $i <= $pageTotal; $i++) {
    if ($i == $page) {
      echo $i;
    } else {
      echo "<a class=\"pagination-link\"  href=\"?menu=contacts&page=$i\">$i</a>";
    }
  }

  if ($page < $pageTotal) {
    echo "<a  class=\"pagination-link\" href=\"?menu=contacts&page=" . ($page + 1) . "\"> >> </a>";
  }
?>
