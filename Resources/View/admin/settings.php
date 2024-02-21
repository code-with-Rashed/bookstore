<title>Settings Management</title>
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
            <h2 class="fw-bold mb-3">Settings Management</h2>
            <div class="row">
              <div class="col-md-6 shadow rounded p-3 m-2 w-25 text-center">
                <div class="h5 mb-2">Favicon</div>
                <div>
                  <img src="<?php echo stored_file("favicon/" . $data['favicon']); ?>" alt="favicon" title="Current Favicon" width="80px" />
                </div>
                <button type="button" class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#changeFaviconModal">
                  Change Favicon
                </button>
              </div>
              <div class="col-md-6 shadow rounded p-3 m-2 w-25 text-center">
                <div class="h5 mb-2">Logo</div>
                <div>
                  <img src="<?php echo stored_file("logo/" . $data['logo']); ?>" alt="favicon" width="80px" title="Current Logo" />
                </div>
                <button type="button" class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#changeLogoModal">
                  Change Logo
                </button>
              </div>
              <!-- Shipping charge management start -->
              <div class="col-md-6 shadow rounded p-3 m-2 w-25 text-center">
                <div class="h5 mb-2">Home Delivery Charge</div>
                <div class="d-flex justify-content-around">
                  <div class="me-2">
                    <span class="badge rounded bg-secondary text-wrap fw-bold fs-6">
                      <b>inside dhaka</b><br>
                      <i class="bi bi-truck"></i><br>
                      <?php echo $data["shipping_charge"]["inside_dhaka"]; ?>&nbsp;&#2547;
                    </span>
                  </div>
                  <div>
                    <span class="badge rounded bg-secondary text-wrap fw-bold fs-6">
                      <b>outside dhaka</b><br>
                      <i class="bi bi-truck"></i><br>
                      <?php echo $data["shipping_charge"]["outside_dhaka"]; ?>&nbsp;&#2547;
                    </span>
                  </div>
                </div>
                <button type="button" class="btn btn-sm btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#changeChargeModal">
                  Change Charge
                </button>
              </div>
              <!-- Shipping charge management start -->
            </div>
          </div>
        </div>
        <div class="row ms-1 my-3">
          <div class="col bg-white shadow-sm p-4 rounded">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">Contact Settings</h5>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#contacts-s">
                <i class="bi bi-pencil-square"></i> Edit
              </button>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-4">
                  <div class="card-subtitle fw-bold mb-1">Address</div>
                  <p class="card-text">
                    <i class="bi bi-geo-alt me-1"></i><span id="address"><?php echo $data['contact_information']['address']; ?></span>
                  </p>
                </div>
                <div class="mb-4">
                  <div class="card-subtitle fw-bold mb-1">Phone numbers</div>
                  <p class="card-text">
                    <i class="bi bi-telephone-fill"></i>
                    <span><?php echo $data['contact_information']['phone']; ?></span>
                  </p>
                  <p class="card-text">
                    <i class="bi bi-whatsapp"></i>
                    <span><?php echo $data['contact_information']['whatsapp']; ?></span>
                  </p>
                  <p class="card-text">
                    <i class="bi bi-telegram"></i>
                    <span><?php echo $data['contact_information']['telegram']; ?></span>
                  </p>
                </div>
                <div class="mb-4">
                  <div class="card-subtitle fw-bold mb-1">E-mail</div>
                  <p class="card-text">
                    <i class="bi bi-envelope-fill"></i>
                    <span id="email"><?php echo $data['contact_information']['email']; ?></span>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-4">
                  <div class="card-subtitle fw-bold mb-1">Social links</div>
                  <p class="card-text">
                    <i class="bi bi-twitter fw-bold fs-6 me-1"></i>
                    <span id="twitter" class="text-dark" title="Twitter link"><?php echo $data['contact_information']['twitter']; ?></span>
                  </p>
                  <p class="card-text">
                    <i class="bi bi-facebook fw-bold fs-6 me-1"></i>
                    <span id="facebook" class="text-dark" title="Facebook link"><?php echo $data['contact_information']['facebook']; ?></span>
                  </p>
                  <p class="card-text">
                    <i class="bi bi-instagram fw-bold fs-6 me-1"></i>
                    <span id="instagram" class="text-decoration-none text-dark" title="Instagram link"><?php echo $data['contact_information']['instagram']; ?></span>
                  </p>
                </div>
                <div class="mb-4">
                  <div class="card-subtitle fw-bold mb-1">iframe link</div>
                  <iframe src="<?php echo $data['contact_information']['iframe_link']; ?>" loading="lazy" class="w-100 border p-2" id="iframe"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Content Management Area End -->
      </div>
      <!-- Content Area End -->
    </div>
  </div>
  <!-- Change Favicon Modal Start-->
  <div class="modal fade" id="changeFaviconModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">
            Change Favicon
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo url("/admin/settings/change/favicon"); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $data['CSRF']; ?>">
            <div class="form-group">
              <label for="changeFavicon" class="fw-bold mb-2">Change Favicon</label>
              <input type="file" class="form-control" id="changeFavicon" name="favicon" accept="image/*" required />
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="btn btn-primary">Change</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Change Favicon Modal End-->
  <!-- Change Logo Modal Start-->
  <div class="modal fade" id="changeLogoModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">
            Change Logo
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo url("/admin/settings/change/logo"); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $data['CSRF']; ?>">
            <div class="form-group">
              <label for="changeLogo" class="fw-bold mb-2">Change Logo</label>
              <input type="file" class="form-control" id="changeLogo" name="logo" accept="image/*" required />
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="btn btn-primary">Change</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Change Favicon Modal End-->

  <!-- Change charge Modal Start-->
  <div class="modal fade" id="changeChargeModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">
            Update Shipping Charge
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo url("/admin/settings/change/charge"); ?>" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo $data['CSRF']; ?>">
            <div class="form-group mb-2">
              <label for="inside_dhaka_charge" class="fw-bold mb-2">Inside Dhaka</label>
              <input type="number" class="form-control" id="inside_dhaka_charge" name="inside_dhaka" required maxlength="6" value="<?php echo $data["shipping_charge"]["inside_dhaka"];?>" />
            </div>
            <div class="form-group">
              <label for="outside_dhaka_charge" class="fw-bold mb-2">Outside Dhaka</label>
              <input type="number" class="form-control" id="outside_dhaka_charge" name="outside_dhaka" required maxlength="6" value="<?php echo $data["shipping_charge"]["outside_dhaka"];?>" />
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="btn btn-primary">Change Charge</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Change change Modal End-->

  <!-- Contact modal -->
  <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form action="<?php echo url("/admin/settings/contact/information"); ?>" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $data["CSRF"]; ?>">
        <div class="modal-content modal-lg">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              Contact Settings
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label fw-bold">Address</label>
                  <div class="input-group">
                    <span class="input-group-text border-0"><i class="bi bi-geo-alt me-1"></i></span>
                    <input type="text" name="address" class="form-control shadow-none" title="Enter your official Address" maxlength="250" value="<?php echo $data['contact_information']['address']; ?>" required />
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">E-mail</label>
                  <div class="input-group">
                    <span class="input-group-text border-0"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" name="email" class="form-control shadow-none" title="Enter your location Address link" maxlength="100" value="<?php echo $data['contact_information']['email']; ?>" required />
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Phone Numbers</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text border-0"><i class="bi bi-telephone-fill"></i></span>
                    <input type="text" name="phone" class="form-control shadow-none" title="Enter your official Phone Number" maxlength="11" value="<?php echo $data['contact_information']['phone']; ?>" required />
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text border-0"><i class="bi bi-whatsapp"></i></span>
                    <input type="text" name="whatsapp" class="form-control shadow-none mb-1" title="Enter your official Phone Number" maxlength="11" value="<?php echo $data['contact_information']['whatsapp']; ?>" required />
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text border-0"><i class="bi bi-telegram"></i></span>
                    <input type="text" name="telegram" class="form-control shadow-none mb-1" title="Enter your official Phone Number" maxlength="11" value="<?php echo $data['contact_information']['telegram']; ?>" required />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label fw-bold">Twitter link</label>
                  <div class="input-group">
                    <span class="input-group-text border-0"><i class="bi bi-twitter"></i></span>
                    <input type="url" name="twitter" class="form-control shadow-none" title="Enter your Twitter link" maxlength="250" value="<?php echo $data['contact_information']['twitter']; ?>" required />
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Facebook link</label>
                  <div class="input-group">
                    <span class="input-group-text border-0"><i class="bi bi-facebook"></i></span>
                    <input type="url" name="facebook" class="form-control shadow-none" title="Enter your Facebook link" maxlength="250" value="<?php echo $data['contact_information']['facebook']; ?>" required />
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Instagram link</label>
                  <div class="input-group">
                    <span class="input-group-text border-0"><i class="bi bi-instagram"></i></span>
                    <input type="url" name="instagram" class="form-control shadow-none" title="Enter your Instagram link" maxlength="250" value="<?php echo $data['contact_information']['instagram']; ?>" required />
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Iframe link</label>
                  <div class="input-group">
                    <span class="input-group-text border-0"><i class="bi bi-map"></i></span>
                    <input type="url" name="iframe_link" class="form-control shadow-none" title="Enter your Iframe link" maxlength="250" value="<?php echo $data['contact_information']['iframe_link']; ?>" required />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">SAVE</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- footer area start -->
  <?php view("/admin/common/footer"); ?>
  <!-- footer area end -->
</body>

</html>