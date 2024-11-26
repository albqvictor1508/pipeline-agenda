<header>
  <h3>Contacts!</h3>
</header>
<div>
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
      $sql = "SELECT * FROM contacts";
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