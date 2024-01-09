<title>Order page</title>
<!-- header area start -->
<?php view("/frontend/common/header"); ?>
<!-- header area end -->

<!-- Navbar start -->
<?php view("/frontend/common/navbar"); ?>
<!-- Navbar end -->

<div class="container">
  <div class="row mt-5">
    <div class="col-lg-7 col-md-12 py-4 mb-2 shadow-sm">
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php for ($i = 0; $i < count($data["books_images"]); $i++) { ?>
            <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? "active" : "" ?>" aria-current="<?php echo $i == 0 ? "true" : "" ?>" aria-label="Slide <?php echo $i; ?>"></button>
          <?php } ?>
        </div>
        <div class="carousel-inner">
          <?php foreach ($data["books_images"] as $key => $value) { ?>
            <div class="carousel-item <?php echo $key == 1 ? "active" : "" ?>" data-bs-interval="3000">
              <img src="<?php echo stored_file("books_image/" . $value['image']); ?>" class="d-block rounded m-auto w-100" alt="book img" />
            </div>
          <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div class="text-center">
          <h1 class="h4  my-3"><?php echo $data["books_details"]["name"]; ?></h1>
          <span class="badge rounded-pill bg-light text-white text-wrap custom-bg">&#2547;&nbsp;<?php echo $data["books_details"]["price"]; ?></span>
      </div>
    </div>

    <div class="col-lg-5 col-md-12 px-3">
      <div class="card my-4 border-0 shadow-sm p-2">
        <div class="card-body">
          <h6 class="mb-3">Delivery Details</h6>
          <form method="post" action="<?php echo url("/order/now"); ?>" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?php echo $data["csrf_token"]; ?>"/>
            <input type="hidden" name="id" value="<?php echo $data["books_details"]["id"]; ?>"/>
            <div class="row">
              <div class="col-md-6">
                <label class="form-label">Name <strong class="text-danger">*</strong></label>
                <input type="text" name="name" class="form-control shadow-none mb-3" required maxlength="40"/>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone number <strong class="text-danger">*</strong></label>
                <input type="number" name="phone" class="form-control shadow-none mb-3" required maxlength="11"/>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control shadow-none mb-3" maxlength="50"/>
              </div>
              <div class="col-md-6">
                <label class="form-label">Whatsapp / Imo number</label>
                <input type="number" name="whatsapp_imo" class="form-control shadow-none mb-3" maxlength="11"/>
              </div>
              <div class="col-12">
                <label class="form-label">Address <strong class="text-danger">*</strong></label>
                <textarea name="address" rows="3" class="form-control shadow-none mb-3" required maxlength="250"></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn w-100 custom-bg text-white shadow-none">
                  Order Submit
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-12 mt-4 shadow p-3 rounded">
      <h5>Description</h5>
      <div>
        <div class="mb-3">
          <span class="badge rounded-pill bg-light text-white text-wrap custom-bg">&#2547;&nbsp;<?php echo $data["books_details"]["price"]; ?></span>
        </div>
        <?php echo $data["books_details"]["description"]; ?>
      </div>
    </div>
  </div>
</div>
<!-- Footer area start -->
<?php view("/frontend/common/footer"); ?>
<!-- Footer area end -->