<?php
  $id = $_GET["id"];
  $sql = "SELECT * FROM contacts WHERE id = $id";
  $rs = mysqli_query($connection, $sql) or die("Error fetching data from database: " + mysqli_error($connection));
  $data = mysqli_fetch_assoc($rs);

?>

<div class=" mt-5">
  <div class="">
    <h2>Edit Contact</h2>
    <div class="form-container">
      <div class="errors">
  
      </div>
      <form action="index.php?menu=update-contact&id=<?= $id ?>" id="add-contact-form" method="post" autocomplete="off" class="needs-validation">
        <div class="mb-3">
          <label for="exampleInputName1" class="form-label">Name</label>
          <input type="text" class="form-control" value="<?= $data["name"] ?>" name="name" id="exampleInputName1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">E-mail</label>
          <input type="email" class="form-control"  value="<?=  $data["email"] ?>" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPhone1" class="form-label">Phone</label>
          <input type="tel" class="form-control" name="phone" value="<?= $data["phone"] ?>" id="exampleInputPhone1" aria-describedby="phoneHelp">
        </div>
      <button type="submit" class="btn btn-primary" name="update-btn">Update Contact</button>
      </form>
    </div>
  </div>
</div>

<script src="../../assets/js/script.js"></script>