<title>Dashboard</title>
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
        <div class="row ms-1 justify-content-around mt-5 text-center">
          <div class="col-md-3 bg-white shadow-sm p-4 rounded mb-2">
            <strong class="d-block">TOTAL BOOKS</strong>
            <span><?php echo $data["total_books"]; ?></span>
          </div>
          <div class="col-md-3 bg-white shadow-sm p-4 rounded mb-2">
            <strong class="d-block">UNCOMPLITE ORDERS</strong>
            <span><?php echo $data["un_complite_orders"]; ?></span>
          </div>
          <div class="col-md-3 bg-white shadow-sm p-4 rounded mb-2">
            <strong class="d-block">UNREAD MESSAGES</strong>
            <span><?php echo $data["total_unread_messages"]; ?></span>
          </div>
        </div>
        <!-- Content Management Area End -->
      </div>
      <!-- Content Area End-->
    </div>
  </div>


  <!-- footer area start -->
  <?php view("/admin/common/footer"); ?>
  <!-- footer area end -->
</body>

</html>