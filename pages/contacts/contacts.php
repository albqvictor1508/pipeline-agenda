<header>
  <h3>Contacts!</h3>
</header>
<div>
  <form action="index.php?menu=contacts" method="post">
    <input type="text" name="txt_search" />
    <input type="submit" value="Search" />
    
  </form>
  <button>
    <a href="index.php?menu=add-contact">New contact.</a>
  </button>
</div>
<table>
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
      $page = (isset($_GET["page"]))? (int)$_GET["page"] : "";

      $start = ($quantityOfContactsPerPage * $page) - $quantityOfContactsPerPage;

    $txt_search = (isset($_POST["txt_search"]))? $_POST["txt_search"] : "";
      $sql = "SELECT * FROM contacts WHERE id='{$txt_search}' or name LIKE '%{$txt_search}%'
      ORDER BY name ASC
      LIMIT $start, $quantityOfContactsPerPage;
      ";
      $rs = mysqli_query($connection, $sql) or die("Error executing the query: " . mysqli_error($connection));
      
      while($data = mysqli_fetch_assoc($rs)) {

    ?>
    <tr>
      <td>
        <?= $data["id"] ?>
      </td>
      <td><?= $data["name"] ?></td>
      <td>
      <?= $data["email"] ?>
      </td>
      <td><?= $data["phone"] ?></td>
      <td><?= $data["favority_flag"] ?></td>
      <td><a href="index.php?menu=edit-contact&id=<?= $data["id"] ?>">Editar</a></td>
      <td><a href="index.php?menu=delete-contact&id=<?= $data["id"] ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<br>
<?php
  $totalSQL = "SELECT id FROM 'contacts'";
  $qr = mysqli_query($connection, $totalSQL) or die(mysqli_error($connection));
  $numTotal = mysqli_num_rows($qr);
  $pageTotal = ceil(($numTotal / $quantityOfContactsPerPage))

  echo "total of contacts: $numTotal";

  for($i = 1; $i <= $pageTotal; i++) {
    if($i == $page) {
      echo $i;
    } else {
      echo "<a href"\"page=$i\>$i</a>"
    }
  }
?>