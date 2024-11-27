<?php
  $id = $_GET["id"];
  $sql = "SELECT * FROM contacts WHERE id = $id";
  $rs = mysqli_query($connection, $sql) or die("Error fetching data from database: " + mysqli_error($connection));
  $data = mysqli_fetch_assoc($rs);

?>

<div class="row mt-5">
  <div class="col-6">
    <h2>Edit Contact</h2>
    <div class="form-container">
      <div class="errors">
  
      </div>
      <form action="index.php?menu=update-contact&id=<?= $id ?>" id="add-contact-form" method="post" autocomplete="off">
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
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="favority_flag" value="<?= $data["favority_flag"] ?>" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Favorite</label>
      </div>
      <button type="submit" class="btn btn-primary" name="update-btn">Update Contact</button>
      </form>
    </div>
  </div>
  <div class="col-6">
    <?php
      if($data["photo"] == "" || !file_exists("assets/img/". $data['photo'])) {
        $photoName = "no-photo.jpeg";
      } else {
        $photoName = $data["photo"];
      }
    ?>
    <div class="mb-3"><img src="assets/img/<?= $photoName ?>" width="500px" alt=""></div>
    <div class="mb-3">
      <button class="edit-photo-btn">
      <i class='bx bxs-camera'></i> Edit photo
      </button>
    </div>

    <form action="" id="form-upload-photo" class="mb-3" method="post" encytype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $id ?>" />
      <label class="form-label" for="fileInput">Select the photo</label>

      <div class="input-group">
        <input class="form-control" type="file" name="file" id="fileInput" />
        <input type="submit" class="btn btn-secondary" value="Send">
      </div>
    </form>
      <div id="preloader" class="mb-3 alert alert-success">
        
      </div>
  </div>
</div>

<script src="../../assets/js/script.js"></script>