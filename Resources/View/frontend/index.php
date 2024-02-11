<title>Home</title>
<!-- header area start -->
<?php view("/frontend/common/header"); ?>
<!-- header area end -->

<!-- Navbar start -->
<?php view("/frontend/common/navbar"); ?>
<!-- Navbar end -->

<!-- Carusol Start  -->
<?php
$banners = get_banners();
if (!empty($banners)) {
  $total_banner = count($banners);
?>
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <?php for ($i = 0; $i < $total_banner; $i++) { ?>
        <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? "active" : "" ?>" aria-current="<?php echo $i == 0 ? "true" : "" ?>" aria-label="Slide <?php echo $i; ?>"></button>
      <?php } ?>
    </div>
    <div class="carousel-inner">
      <?php foreach ($banners as $key => $value) { ?>
        <div class="carousel-item <?php echo $key == 0 ? "active" : "" ?>" data-bs-interval="3000">
          <img src="<?php echo stored_file("banners/" . $value['image']); ?>" class="d-block w-100" alt="banner" />
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
<?php } ?>
<!-- Carusol end  -->
<!-- Our Books -->
<h2 class="text-center h-fonts mt-5 mb-2 pt-4 fw-bold">OUR BOOKS</h2>
<div class="h-line bg-dark"></div>
<div class="container mt-4">
  <div class="row">
    <?php
    $books = get_home_page_books();
    if (!empty($books)) {
      foreach ($books as $key => $value) {
    ?>
        <div class="col-lg-4 col-md-6 mb-5 px-4">
          <div class="bg-white shadow p-4 rounded border-4 border-top border-dark pop">
            <div class="d-flex mb-2">
              <img src="<?php echo stored_file("books_image/" . $value['image']); ?>" alt="books image" width="100px" />
              <div>
                <h2 class="m-3 h4"><?php echo $value["name"]; ?></h2>
                <div class="m-3">
                  <span class="badge rounded-pill bg-light text-dark text-wrap">&#2547;&nbsp;<?php echo $value["price"]; ?></span>
                </div>
              </div>
            </div>
            <div class="d-flex mb-2 mt-4 justify-content-evenly">
              <button onclick="addToCart(<?php echo $value['id']; ?>)" class="btn btn-sm custom-bg text-white shadow-none"><i class="bi bi-cart fw-bold"></i> Add to Cart</button>
              <a href="<?php echo url("/details/" . $value["id"]); ?>" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
            </div>
          </div>
        </div>
    <?php }
    } ?>
  </div>
</div>
<!-- Reach Us -->
<h2 class="text-center h-fonts mt-5 mb-4 pt-4 fw-bold">REACH US</h2>
<?php $contact_information = get_contact_information(); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 bg-white p-4 rounded mb-3 mb-lg-0">
      <iframe class="w-100" height="320" src="<?php echo $contact_information["iframe_link"] ?? ""; ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="col-lg-4 col-md-4">
      <div class="bg-white p-4 mb-4 rounded">
        <h5 class="mb-2">Call us</h5>
        <div class="mb-2">
          <a href="tel: <?php echo $contact_information["phone"] ?? ""; ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> <?php echo $contact_information["phone"] ?? ""; ?>
          </a>
        </div>
        <div class="mb-2">
          <a href="tel: <?php echo $contact_information["whatsapp"] ?? ""; ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-whatsapp"></i> <?php echo $contact_information["whatsapp"] ?? ""; ?>
          </a>
        </div>
        <div class="mb-2">
          <a href="tel: <?php echo $contact_information["telegram"] ?? ""; ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telegram"></i> <?php echo $contact_information["telegram"] ?? ""; ?>
          </a>
        </div>
      </div>
      <div class="bg-white p-4 mb-4 rounded">
        <h5>Follow us</h5>
        <a href="<?php echo $contact_information["twitter"] ?? ""; ?>" target="_blank" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
            <i class="bi bi-twitter me-1"></i> Twitter
          </span>
        </a>
        <br />
        <a href="<?php echo $contact_information["facebook"] ?? ""; ?>" target="_blank" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
            <i class="bi bi-facebook me-1"></i> Facebook
          </span>
        </a>
        <br />
        <a href="<?php echo $contact_information["instagram"] ?? ""; ?>" target="_blank" class="d-inline-block">
          <span class="badge bg-light text-dark fs-6 p-2">
            <i class="bi bi-instagram me-1"></i> Instagram
          </span>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Footer area start -->
<?php view("/frontend/common/footer"); ?>
<!-- Footer area end -->