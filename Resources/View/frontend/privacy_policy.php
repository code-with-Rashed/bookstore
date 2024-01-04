<title>Privacy Policy</title>
<!-- header area start -->
<?php view("/frontend/common/header"); ?>
<!-- header area end -->

<!-- Navbar start -->
<?php view("/frontend/common/navbar"); ?>
<!-- Navbar end -->

<div class="my-5 px-4">
    <h2 class="fw-bold text-center h-fonts">Our Privacy Policy</h2>
    <div class="h-line bg-dark"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 mb-5 p-4">
            <div class="bg-white shadow p-4 rounded">
                <?php echo $data["data"]; ?>
            </div>
        </div>
    </div>
</div>
<!-- Footer area start -->
<?php view("/frontend/common/footer"); ?>
<!-- Footer area end -->