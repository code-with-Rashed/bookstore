<title>Orders Management</title>
<!-- header area start -->
<?php view("/admin/common/header"); ?>
<!-- header area end -->

<body class="bg-light">
  <div class="container-fluid d-print-none">
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
            <h2 class="fw-bold mb-3">Orders Management</h2>
            <table class="table table-bordered table-striped text-center">
              <thead class="fs-5">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Datetime</th>
                  <th>Order status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $value) { ?>
                  <tr id="row-<?php echo $value["id"]; ?>">
                    <td><?php echo $value["id"]; ?></td>
                    <td><?php echo $value["name"]; ?></td>
                    <td><?php echo $value["phone"]; ?></td>
                    <td><?php echo $value["datetime"]; ?></td>
                    <td>
                      <?php if ($value["status"]) { ?>
                        <a href="<?php echo url("/admin/orders/status/change/" . $value["id"] . "/" . $value["status"]); ?>" class="btn btn-primary btn-sm">
                          <i class="bi bi-check-circle"></i>
                          Complite
                        </a>
                      <?php } else { ?>
                        <a href="<?php echo url("/admin/orders/status/change/" . $value["id"] . "/" . $value["status"]); ?>" class="btn btn-warning btn-sm">
                          <i class="bi bi-dash-circle"></i>
                          Un-Complite
                        </a>
                      <?php } ?>
                    </td>
                    <td>
                      <button class="btn btn-success btn-sm m-1" type="button" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" onclick="orderDetails(<?php echo $value['id']; ?>,<?php echo $value['books_id']; ?>)">
                        <i class="bi bi-file-earmark-break"></i>
                        Details
                      </button>
                      <button class="btn btn-danger btn-sm m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteOrdersConfirmation(<?php echo $value['id']; ?>)">
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

  <!-- Order Details Modal Start -->
  <div class="modal fade" id="orderDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 d-print-none" id="staticBackdropLabel">
            Order Details
          </h1>
          <h1 class="modal-title fs-5 d-none d-print-block" id="staticBackdropLabel">
            Invoice Details
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="showOrderDetails"></div>
          <div class="d-print-none">
            <hr>
            <button type="button" class="btn btn-primary btn-sm text-center m-auto d-block py-2" onclick="invoicePrint()">
              <i class="bi bi-printer"></i>
              Print Invoice
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Order Details Modal End -->

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
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" data-orders-delete="0" onclick="deleteOrders(this)">
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

  <!-- Invoice start -->
  <div class="container d-none d-print-block">
    <div class="row justify-content-center">
      <div class="col bg-white shadow-sm p-4 rounded mt-3" id="printableInvoice"></div>
    </div>
  </div>
  <!-- Invoice end -->

  <!-- Invoice template start -->
  <template id="invoiceTemplate">
    <div class="d-flex justify-content-center mb-5">
      <div>
        <img src="<?php echo stored_file("books_image/"); ?>" alt="selling-book" width="100px" class="rounded mb-2" id="book_image" />
      </div>
      <div class="ms-3">
        <h6 class="mb-2"><span id="book_name"></span></h6>
        <strong>&#2547;&nbsp;<span id="book_price"></span></strong>
      </div>
    </div>
    <hr>
    <div class="d-flex justify-content-center">
      <div>
        <p><strong>Order Id : </strong><span id="order_id"></span></p>
        <p><strong>Name : </strong><span id="name"></span></p>
        <p><strong>Phone : </strong><span id="phone"></span></p>
        <p><strong>Email : </strong><span id="email"></span></p>
        <p><strong>Whatsapp / Imo number : </strong><span id="whatsapp_imo"></span></p>
        <p><strong>Order Time : </strong><span id="order_time"></span></p>
        <p>
          <strong>Payment : </strong>Cash on delivery with delivery charge
        </p>
        <p>
          <strong>Address : </strong><span id="address"></span>
        </p>
      </div>
    </div>
  </template>
  <!-- Invoice template end -->

  <!-- footer area start -->
  <?php view("/admin/common/footer"); ?>
  <script src="<?php echo assets("js/orderPage.js") ?>"></script>
  <!-- footer area end -->
</body>

</html>