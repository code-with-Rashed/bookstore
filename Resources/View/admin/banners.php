<title>Banners Management</title>
<!-- header area start -->
<?php view("/admin/common/header"); ?>
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
              <h2 class="fw-bold mb-3">Promotion Banners</h2>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#banners">
                <i class="bi bi-plus-square"></i>
                Add Banner
              </button>
            </div>
            <div class="row">
              <?php foreach ($data['banners'] as $banner) { ?>
                <div class="col-md-6 mb-4">
                  <div class="card bg-dark text-white">
                    <img class="card-img" src="<?php echo stored_file("banners/" . $banner['image']); ?>" alt="team image" />
                    <div class="card-img-overlay text-end">
                      <a href="<?php echo url("/admin/delete/banner/" . $banner['id']) ?>" class="text-white">
                        <button class="btn btn-danger btn-sm shadow-none card-title" type="button">
                          <i class="bi bi-trash"></i> Delete
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <!-- Content Management Area End -->
      </div>
      <!-- Content Area End -->
    </div>
  </div>
  <!-- Change Favicon Modal Start-->
  <div class="modal fade" id="banners" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">
            New Banner
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="<?php echo url("/admin/add/banner"); ?>" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $data['csrf']['CSRF']; ?>">
            <div class="form-group mb-3">
              <label for="bannerImage" class="fw-bold mb-2">Add Banner</label>
              <input type="file" class="form-control" name="image" required />
            </div>
            <div class="form-group">
              <label for="link" class="fw-bold mb-2">Redirect url</label>
              <input type="url" class="form-control" name="link" required />
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Change Favicon Modal End-->

  <!-- footer area start -->
  <?php view("/admin/common/footer"); ?>
  <!-- <script src="<?php //echo assets("js/bannerPage.js") 
                    ?>"></script> -->
  <!-- footer area end -->
</body>

</html>