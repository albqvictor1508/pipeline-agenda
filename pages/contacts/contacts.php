<link rel="stylesheet" href="../../assets/css/style.css">

<header class="mt-4 contacts-header">
  <h3>Contacts!</h3>
  <div class="contacts-table">
    <a href="index.php?menu=add-contact" style="text-decoration: none;">
      <button class="add-contact-btn">Add Contact</button>
    </a>
</header>
  
    <div class="mt-5 mb-4">
      <form action="index.php?menu=contacts" method="post" class="contacts-search" autocomplete="off" >
        <input type="search" name="txt_search" class="table__input-search" />
        <button type="submit" class="table__search-button">Search</button>
      <!-- name="txt_search" -->
      </form>
    </div>
    
  <table class="table table-striped contacts-table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php  
        $txt_search = isset($_POST["txt_search"]) ? mysqli_real_escape_string($connection, $_POST["txt_search"]) : "";
  
        $sql = "
          SELECT * FROM contacts
          WHERE id='{$txt_search}' OR name LIKE '%{$txt_search}%'
          ORDER BY name ASC
        ";
        $rs = mysqli_query($connection, $sql) or die("Error executing the query: " . mysqli_error($connection));
  
        while ($data = mysqli_fetch_assoc($rs)) {
      ?>
      <tr>
        <td><?= htmlspecialchars($data["id"]) ?></td>
        <td><?= htmlspecialchars($data["name"]) ?></td>
        <td><?= htmlspecialchars($data["email"]) ?></td>
        <td><?= htmlspecialchars($data["phone"]) ?></td>
        <td><button class="table__edit-button" ><a href="index.php?menu=edit-contact&id=<?= htmlspecialchars($data["id"]) ?>"><i class='bx bxs-edit-alt'></i></a></button></td>
        <td><button class="table__delete-button" ><a href="index.php?menu=delete-contact&id=<?= htmlspecialchars($data["id"]) ?>"><i class='bx bxs-trash'></i></a></button></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

