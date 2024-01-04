<title>Massages</title>
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
            <h2 class="fw-bold mb-3">Message Management</h2>
            <table class="table table-bordered table-striped text-center">
              <thead class="fs-5">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Time</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data['data'] as $message) {
                ?>
                  <tr id="row-<?php echo $message['id']; ?>">
                    <td><?php echo $message['id']; ?></td>
                    <td><?php echo $message['name']; ?></td>
                    <td><?php echo $message['email']; ?></td>
                    <td><?php echo $message['subject']; ?></td>
                    <td><?php echo date('d/m/Y - h:i:s', strtotime($message['datetime'])); ?></td>
                    <td>
                      <?php if ($message['status']) { ?>
                        <a href="<?php echo url("/admin/message/status/change/" . $message['id'] . "/" . $message['status']); ?>" class="btn btn-primary btn-sm">
                          <i class="bi bi-cloud-arrow-up"></i>
                          Read
                        </a>
                      <?php } else { ?>
                        <a href="<?php echo url("/admin/message/status/change/" . $message['id'] . "/" . $message['status']); ?>" class="btn btn-warning btn-sm">
                          <i class="bi bi-cloud-arrow-down"></i>
                          Un-Read
                        </a>
                      <?php } ?>

                    </td>
                    <td>
                      <button class="btn btn-success btn-sm m-1" type="button" data-bs-toggle="modal" data-bs-target="#detailMessageModal" onclick="detailsMessage(<?php echo $message['id']; ?>)">
                        <i class="bi bi-file-earmark-break"></i>
                        Details
                      </button>
                      <button class="btn btn-danger btn-sm m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteMessageConfirmation(<?php echo $message['id']; ?>)">
                        <i class="bi bi-trash"></i>
                        Delete
                      </button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Content Management Area End -->
      </div>
      <!-- Content Area End -->
    </div>
  </div>
  <!-- Detail Message Modal Start -->
  <div class="modal fade" id="detailMessageModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">
            Details Message
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><strong>Name : </strong> <span class="name"></span></p>
          <p><strong>Email : </strong><span class="email"></span></p>
          <p>
            <strong>Subject : </strong><br />
            <span class="subject"></span>
          </p>
          <p>
            <strong>Message : </strong><br />
            <span class="message"></span>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- Detail Message Modal End -->
  <!-- Delete Warning Modal Start -->
  <div class="modal fade" id="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <strong>Are You Sure You Wan't to Delete ?</strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" data-delete-message="0" onclick="deleteMessage(this)">
            Yes
          </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            No
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Delete Warning Modal End -->

  <!-- footer area start -->
  <?php view("/admin/common/footer"); ?>
  <script src="<?php echo assets("js/messagePage.js") ?>"></script>
  <!-- footer area end -->
</body>

</html>