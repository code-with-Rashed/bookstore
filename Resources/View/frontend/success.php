<title>Order Successful</title>
<!-- header area start -->
<?php view("/frontend/common/header"); ?>
<!-- header area end -->

<!-- Navbar start -->
<div class="d-print-none">
    <?php view("/frontend/common/navbar"); ?>
</div>
<!-- Navbar end -->

<div class="my-5 px-4">
    <h2 class="fw-bold text-center h-fonts">ORDER SUCCESSFUL</h2>
    <div class="h-line bg-dark"></div>
</div>
<div class="container">
    <div class="row">
        <!-- Invoice start -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 bg-white shadow-sm p-4 rounded mt-3">
                    <div class="d-flex justify-content-center mb-5">
                        <div>
                            <img src="<?php echo stored_file("books_image/" . $data["book_image"]); ?>" alt="selling-book" width="100px" class="rounded mb-2" />
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-2"><?php echo $data["book_name"]; ?></h6>
                            <strong>&#2547;&nbsp;<?php echo $data["book_price"]; ?></strong>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <div>
                            <p><strong>Order Id : </strong><?php echo $data["order_details"]["id"]; ?></p>
                            <p><strong>Name : </strong><?php echo $data["order_details"]["name"]; ?></p>
                            <p><strong>Phone : </strong><?php echo $data["order_details"]["phone"]; ?></p>
                            <p><strong>Email : </strong><?php echo $data["order_details"]["email"] ?></p>
                            <p><strong>Whatsapp / Imo number : </strong><?php echo $data["order_details"]["whatsapp_imo"]; ?></p>
                            <p><strong>Order Time : </strong><?php echo $data["order_details"]["datetime"]; ?></p>
                            <p>
                                <strong>Payment : </strong>Cash on delivery with delivery charge
                            </p>
                            <p>
                                <strong>Address : </strong><?php echo $data["order_details"]["address"]; ?>
                            </p>
                        </div>
                    </div>
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
        <!-- Invoice end -->

    </div>
</div>
<!-- Footer area start -->
<div class="d-print-none">
    <?php view("/frontend/common/footer"); ?>
</div>
<!-- Footer area end -->
<script>
    function invoicePrint() {
        setTimeout(() => {
            window.print();
        }, 200);
    }
</script>