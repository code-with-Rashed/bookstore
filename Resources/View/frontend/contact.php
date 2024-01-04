<title>Contact Us</title>
<!-- header area start -->
<?php view("/frontend/common/header"); ?>
<!-- header area end -->

<!-- Navbar start -->
<?php view("/frontend/common/navbar"); ?>
<!-- Navbar end -->

<div class="my-5 px-4">
  <h2 class="fw-bold text-center h-fonts">CONTACT US</h2>
  <div class="h-line bg-dark"></div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 mb-5 px-4">
      <?php $contact_information = get_contact_information(); ?>
      <div class="bg-white shadow p-4 rounded">
        <iframe class="w-100 mb-4" height="320" src="<?php echo $contact_information["iframe_link"] ?? ""; ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <h5>Address</h5>
        <i class="bi bi-geo-alt me-1"></i>
        <?php echo $contact_information["address"] ?? ""; ?>
        <h5 class="mt-4">Call us</h5>
        <div class="mb-2">
          <a href="tel: <?php echo $contact_information["phone"] ?? ""; ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> <?php echo $contact_information["phone"] ?? ""; ?>
          </a>
        </div>
        <div class="mb-2">
          <i class="bi bi-whatsapp"></i> <?php echo $contact_information["whatsapp"] ?? ""; ?>
        </div>
        <div class="mb-2">
          <i class="bi bi-telegram"></i> <?php echo $contact_information["telegram"] ?? ""; ?>
        </div>

        <h5 class="mt-4">Email</h5>
        <a href="mailto: <?php echo $contact_information["email"] ?? ""; ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
          <i class="bi bi-envelope-fill"> </i>
          <?php echo $contact_information["email"] ?? ""; ?>
        </a>

        <h5 class="mt-4">Follow Us</h5>
        <a href="<?php echo $contact_information["twitter"] ?? ""; ?>" target="_blank" class="text-decoration-none text-dark fs-5 fw-bold me-2">
          <i class="bi bi-twitter"></i>
        </a>
        <a href="<?php echo $contact_information["facebook"] ?? ""; ?>" target="_blank" class="text-decoration-none text-dark fs-5 fw-bold me-2">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="<?php echo $contact_information["instagram"] ?? ""; ?>" target="_blank" class="text-decoration-none text-dark fs-5 fw-bold">
          <i class="bi bi-instagram"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 mb-5 px-4">
      <div class="bg-white shadow p-4 rounded">
        <h5 class="fw-bold">Send a message</h5>
        <form action="<?php echo url("/insert/contact"); ?>" method="POST" autocomplete="off">
          <input type="hidden" name="csrf_token" value="<?php echo $data['CSRF']; ?>">
          <div class="mt-3">
            <label class="form-label">Name</label>
            <input type="text" maxlength="40" class="form-control shadow-none" name="name" required />
          </div>
          <div class="mt-3">
            <label class="form-label">Email</label>
            <input type="email" maxlength="50" class="form-control shadow-none" name="email" required />
          </div>
          <div class="mt-3">
            <label class="form-label">Subject</label>
            <input type="text" maxlength="150" class="form-control shadow-none" name="subject" required />
          </div>
          <div class="mt-3">
            <label class="form-label">Message</label>
            <textarea maxlength="250" rows="5" style="resize: none" class="form-control shadow-none" name="message" required></textarea>
          </div>
          <div class="mt-3">
            <button type="submit" class="btn custom-bg text-white" name="send">
              SEND
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Footer area start -->
<?php view("/frontend/common/footer"); ?>
<!-- Footer area end -->