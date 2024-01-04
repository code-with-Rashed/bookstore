<title>Terms & Conditions Management</title>
<!-- header area start -->
<?php view("/admin/common/header");?>
<!-- header area end -->

<body class="bg-light">
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar Area Start -->
      <?php view("/admin/common/sidebar"); ?>
      <!-- Sidebar Area End -->
      <!-- Content Area Start -->
      <div class="col-10">
        <!-- Nav Header Area Start-->
        <?php view("/admin/common/navbar"); ?>
        <!-- Nav Header Area End -->
        <!-- Content Management Area Start -->
        <div class="row ms-1">
          <div class="col mt-5 bg-white shadow-sm p-4 rounded">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h2 class="fw-bold mb-3">Terms & Conditions Management</h2>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTermsConditionsModal">
                <i class="bi bi-pencil-square"></i>
                Edit Terms & Conditions
              </button>
            </div>
            <div class="row">
              <div class="col-10 p-2 rounded shadow-sm m-auto">
               <?php echo $data["data"];?>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Management Area End -->
      </div>
      <!-- Content Area End -->
    </div>
  </div>

  <!-- Edit Books Modal Start -->
  <div class="modal fade" id="editTermsConditionsModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">
            Update Terms & Conditions
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo url("/admin/terms/conditions/update"); ?>">
          <input type="hidden" name="csrf_token" value="<?php echo $data["csrf"];?>">
            <div class="form-group mb-3">
              <label for="editTermsConditions" class="fw-bold mb-2">Terms & Conditions</label>
              <textarea class="form-control" id="editTermsConditions" name="data" cols="30" rows="6"><?php echo $data["data"];?></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Edit News Modal End -->

  <!-- footer area start -->
  <?php view("/admin/common/footer"); ?>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor.create(document.querySelector("#editTermsConditions"))
      .then((editor) => {
        // console.log(editor);
      })
      .catch((error) => {
        // console.error(error);
      });
  </script>
  <!-- footer area end -->
</body>

</html>