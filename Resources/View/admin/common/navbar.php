<div class="row p-4 bg-white ms-1 shadow-sm">
  <div class="col-md-6">
    <button type="button" class="btn btn-outline-dark btn-sm shadow-none" title="collapse">
      <i class="bi bi-list-ul fw-bold fs-5"></i>
    </button>
  </div>
  <div class="col-md-6 d-flex justify-content-end">
    <div class="btn-group">
      <button type="button" class="btn btn-outline-dark btn-sm shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
        <img src="<?php echo stored_file("profile/" . (get_session_data("admin")["image"] ?? "user.jpg")); ?>" alt="profile-photo" width="30px" height="30px" class="rounded-circle" />
        <strong><?php echo get_session_data("admin")["name"]; ?></strong>
      </button>
      <ul class="dropdown-menu dropdown-menu-lg-end">
        <li>
          <a href="<?php echo url("/admin/profile"); ?>" class="dropdown-item">Profile</a>
        </li>
        <li><a href="<?php echo url("/admin/logout"); ?>" class="dropdown-item">Logout</a></li>
      </ul>
    </div>
  </div>
</div>