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
                <div class="col-md-10 bg-white shadow-sm p-4 rounded mt-3">
                    <div class="row mb-3">
                        <div class="col-md-8 col-sm-12">
                            <p>
                                <strong>Invoice Number :</strong> <span><?php echo $data["delivery_details"]["id"]; ?></span>
                            </p>
                            <p>
                                <strong>Date & Time : </strong> <span><?php echo $data["delivery_details"]["datetime"]; ?></span>
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <p>
                                <strong>Name : </strong> <span><?php echo $data["delivery_details"]["name"]; ?></span>
                            </p>
                            <p>
                                <strong>Phone : </strong> <span><?php echo $data["delivery_details"]["phone"]; ?></span>
                            </p>
                            <p>
                                <strong>Address : </strong><span><?php echo $data["delivery_details"]["address"]; ?></span>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $subtotal = 0;
                                $delivery_charge = $data["delivery_option"][$data["delivery_details"]["delivery_option"]];
                                foreach ($data["order_books"] as $key => $value) {
                                    $subtotal += $value["price"] * $value["quantity"];
                                ?>
                                    <tr>
                                        <td><?php echo $value["name"]; ?></td>
                                        <td>&#2547;&nbsp;<?php echo $value["price"]; ?></td>
                                        <td><?php echo $value["quantity"]; ?></td>
                                        <td>&#2547;&nbsp;<?php echo $value["price"] * $value["quantity"]; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Subtotal :</th>
                                    <td colspan="4">&#2547;&nbsp;<?php echo $subtotal; ?></td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-end">Delivery Charge :</th>
                                    <td colspan="4">&#2547;&nbsp;<?php echo $delivery_charge; ?></td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-end">Total Price :</th>
                                    <td colspan="4" class="fw-bold">&#2547;&nbsp;<?php echo $subtotal + $delivery_charge; ?></td>
                                </tr>
                            </tfoot>
                        </table>
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