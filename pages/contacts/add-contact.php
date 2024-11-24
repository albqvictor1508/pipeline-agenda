<div>
  <?php?>

  <div class="form-container">
    <div class="errors">

    </div>
    <form action="index.php?menu=insert-contact" id="add-contact-form" method="post">
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
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<script>
  (() => {
    const form = document.querySelector("#add-contact-form");
    const name = document.querySelector("#exampleInputName1");
    const email = document.querySelector("#exampleInputEmail1");
    const phone = document.querySelector("#exampleInputPhone1");

    form.addEventListener("submit", (e) => {
      e.preventDefault();

      if(handleSubmit()) {
        form.submit();
      }

    })

    function handleSubmit() {
      const errorsField = document.querySelector(".errors"); 
      let valid = true;
      const errors = [];

      if(!name.value || !phone.value) {
        errors.push("name and phone are required");
        valid = false;
      }

      if(name.value.length < 3 || name.value.length >= 15) {
        errors.push("invalid name");
        valid = false;
      }

      if(!valid) {
        errorsField.style.display = "block";
        errorsField.innerText = "";
        const errorsMap = errors.map(error => {
          const p = document.createElement("p");
          p.textContent = error;
          errorsField.appendChild(p);
          return p;
        })
        return false;
      }

      errorsField.style.display = "none";
      errorsField.innerText = "";
      return valid;
    }
  })();
</script>