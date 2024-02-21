<div class="position-fixed d-lg-none shadow" style="top: 200px;right:10px;z-index: 500;" data-bs-toggle="modal" data-bs-target="#cartModal" onclick="fetchCartData()">
    <button type="button" class="btn custom-bg shadow-none">
        <span class="badge text-bg-danger" id="cart-count-two">0</span>
        <i class="bi bi-bag fs-4 text-white"></i>
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="cartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title fs-5" id="staticBackdropLabel">
                    <span class="badge rounded bg-light text-white text-wrap custom-bg d-none" id="show-price">Price : <span id="price"></span>&nbsp;&#2547;</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- cart books start -->
                <div class="row" id="carts-container"></div>
                <!-- cart books end -->
                <!-- Chose delivery option start  -->
                <div class="row d-none" id="show-delivery-option">
                    <div class="col mb-5 px-4">
                        <div class="bg-white shadow p-4 rounded border-4 border-top border-dark pop">
                            <div class="mb-2">হোম ডেলিভারি নির্বাচন করুন</div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" onchange="inside_dhaka()" checked>
                                <label class="form-check-label" for="inlineRadio1">ঢাকার ভিতরে</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" onchange="outside_dhaka()">
                                <label class="form-check-label" for="inlineRadio2">ঢাকার বাইরে</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Chose delivery option end  -->
                <!-- Cart item price start  -->
                <div class="row d-none" id="show-cost-list">
                    <div class="col mb-5 px-4">
                        <div class="bg-white shadow p-4 rounded border-4 border-top border-dark pop">
                            <div class="mb-1">
                                <span class="badge rounded bg-light text-white text-wrap custom-bg">Subtotal : <span id="subtotal" class="fw-bold"></span>&nbsp;&#2547;</span>
                            </div>
                            <div class="mb-1">
                                <span class="badge rounded bg-primary text-wrap">Home Delivery: <span id="shipping" class="fw-bold"></span>&nbsp;&#2547;</span>
                            </div>
                            <div class="mb-1">
                                <span class="badge rounded bg-danger text-wrap">Total Price: <span id="total-price" class="fw-bold"></span>&nbsp;&#2547;</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cart item price end  -->
                <div class="text-danger text-center d-none" id="empty-cart-message">No Books Found in your cart</div>
                <hr>
                <!-- checkout buttoun start -->
                <div class="w-50 m-auto d-none" id="checkout-button">
                    <a href="<?php echo url("/checkout"); ?>" class="btn btn-sm custom-bg text-white shadow-none d-block fw-bold py-2">Checkout</a>
                </div>
                <!-- checkout buttoun end -->
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<script>
    var APP_URL = "<?php echo APP_URL ?>";
    var IMAGE_URL = "<?php echo stored_file("books_image/"); ?>";
</script>
<script src="<?php echo assets("js/cart.js") ?>" defer></script>