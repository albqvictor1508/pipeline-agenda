<div>
  <div class="form-container">
    <div class="errors">

    </div>
    <form action="index.php?menu=insert-contact" id="add-contact-form" method="post" autocomplete="off">
      <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Name</label>
        <input type="text" class="form-control"  name="name" id="exampleInputName1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">E-mail</label>
        <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPhone1" class="form-label">Phone</label>
        <input type="tel" class="form-control" name="phone" id="exampleInputPhone1" aria-describedby="phoneHelp">
      </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" name="favority_flag" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Favorite</label>
    </div>
    <button type="submit" class="btn btn-primary">Add Contact</button>
    </form>
  </div>
</div>

<script src="../../assets/js/script.js"></script>