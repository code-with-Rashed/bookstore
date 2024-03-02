<title>Book Details Page</title>
<!-- header area start -->
<?php view("/frontend/common/header"); ?>
<!-- header area end -->

<!-- Navbar start -->
<?php view("/frontend/common/navbar"); ?>
<!-- Navbar end -->

<div class="container">
  <div class="row mt-5">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="pill" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="pill" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Book Images</button>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <!-- Description start -->
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
        <div class="col-12 mt-4 shadow p-3 rounded">
          <h5>Description</h5>
          <div>
            <div class="mb-3">
              <span class="badge rounded-pill bg-light text-white text-wrap custom-bg">&#2547;&nbsp;<?php echo $data["books_details"]["price"]; ?></span>
              <button onclick="addToCart(<?php echo $data['books_details']['id']; ?>)" class="btn btn-sm custom-bg text-white shadow-none rounded-pill ms-2"><i class="bi bi-cart fw-bold"></i> Add to Cart</button>
            </div>
            <?php echo $data["books_details"]["description"]; ?>
          </div>
        </div>
      </div>
      <!-- Description end -->

      <!-- Book image carousel start -->
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
        <div class="col-12 p-4 mb-2 shadow-sm">
          <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <?php for ($i = 0; $i < count($data["books_images"]); $i++) { ?>
                <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? "active" : "" ?>" aria-current="<?php echo $i == 0 ? "true" : "" ?>" aria-label="Slide <?php echo $i; ?>"></button>
              <?php } ?>
            </div>
            <div class="carousel-inner">
              <?php foreach ($data["books_images"] as $key => $value) { ?>
                <div class="carousel-item <?php echo $key == 1 ? "active" : "" ?>" data-bs-interval="3000">
                  <img src="<?php echo stored_file("books_image/" . $value['image']); ?>" class="d-block rounded m-auto w-100" alt="book img" loading="lazy"/>
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
            <button onclick="addToCart(<?php echo $data['books_details']['id']; ?>)" class="btn btn-sm custom-bg text-white shadow-none rounded-pill ms-2"><i class="bi bi-cart fw-bold"></i> Add to Cart</button>
          </div>
        </div>
      </div>
      <!-- Book image carousel end -->
    </div>
  </div>
</div>
<!-- Footer area start -->
<?php view("/frontend/common/footer"); ?>
<!-- Footer area end -->