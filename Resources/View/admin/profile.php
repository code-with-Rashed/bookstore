<title>Profile Management</title>
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
            <h2 class="fw-bold mb-3">Profile Management</h2>
            <div class="row">
              <!-- Profile Update Area Start -->
              <div class="col-md-6">
                <form class="shadow rounded p-4" action="<?php echo url("/admin/profile/information/update"); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="csrf_token" value="<?php echo $data["CSRF"]; ?>">
                  <input type="hidden" name="id" value="<?php echo $data["profile"]["id"]; ?>">
                  <div class="mb-4">
                    <img src="<?php echo stored_file("profile/" . ($data["profile"]["image"] ?? "user.jpg")); ?>" alt="Profile-Photo" class="rounded" width="100px" height="100px" />
                  </div>
                  <div class="form-group mb-3">
                    <label for="photo" class="mb-1">Change Photo</label>
                    <input type="file" id="photo" name="photo" class="form-control" accept="image/*" />
                  </div>
                  <div class="form-group mb-3">
                    <label for="name" class="mb-1">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo $data["profile"]["name"]; ?>" required maxlength="40" />
                  </div>
                  <div class="form-group mb-3">
                    <label for="email" class="mb-1">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $data["profile"]["email"]; ?>" required maxlength="50" />
                  </div>
                  <div class="form-group mb-3">
                    <label for="role" class="mb-1">Role</label>
                    <input type="text" id="role" class="form-control" value="Admin" required maxlength="10" readonly />
                  </div>
                  <button type="submit" class="btn btn-primary">
                    Update
                  </button>
                </form>
              </div>
              <!-- Profile Update Area End -->
              <!-- Change Password Area Start -->
              <div class="col-md-6">
                <form class="shadow rounded p-4" action="<?php echo url("/admin/profile/password/update"); ?>" method="post">
                  <input type="hidden" name="csrf_token" value="<?php echo $data["CSRF"]; ?>">
                  <input type="hidden" name="id" value="<?php echo $data["profile"]["id"]; ?>">
                  <p class="h5 fw-bold mb-3">Update Password</p>
                  <div class="form-group mb-3">
                    <label for="oldPassword" class="mb-1">Old Password</label>
                    <input type="password" id="oldPassword" name="old_password" class="form-control" placeholder="Enter old password" maxlength="25" required />
                  </div>
                  <div class="form-group mb-3">
                    <label for="newPassword" class="mb-1">New Password</label>
                    <input type="password" id="newPassword" name="new_password" class="form-control" placeholder="Enter new password" maxlength="25" required />
                  </div>
                  <div class="form-group mb-3">
                    <label for="confirmPassword" class="mb-1">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirm_password" class="form-control" placeholder="Enter confirm password" maxlength="25" required />
                  </div>
                  <button type="submit" class="btn btn-primary">
                    Change Password
                  </button>
                </form>
              </div>
              <!-- Change Password Area End -->
            </div>
          </div>
        </div>
        <!-- Content Management Area End -->
      </div>
      <!-- Content Area End -->
    </div>
  </div>
  <!-- footer area start -->
  <?php view("/admin/common/footer"); ?>
  <!-- footer area end -->
</body>

</html>