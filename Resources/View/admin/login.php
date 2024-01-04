<!-- header area start -->
<?php view("/admin/common/header"); ?>
<!-- header area end -->

<body class="bg-light">
  <div class="w-50 m-auto shadow-sm p-4 bg-white mt-5 rounded">
    <img src="<?php echo stored_file("logo/" . get_logo()); ?>" alt="logo" class="d-block m-auto mb-3" width="80px" />
    <p class="h5 text-center mb-4">Login Your Account</p>
    <form action="<?php echo url("/admin/login"); ?>" method="post">
      <input type="hidden" name="csrf_token" value="<?php echo $data["CSRF"]; ?>">
      <div class="form-group mb-3">
        <label for="email" class="mb-2">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" maxlength="50" required autofocus />
      </div>
      <div class="form-group mb-3">
        <label for="password" class="mb-2">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" maxlength="25" required />
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</body>

</html>