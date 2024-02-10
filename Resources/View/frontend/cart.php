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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- cart books start -->
                <div class="row" id="carts-container"></div>
                <!-- cart books end -->
                <div class="text-danger text-center d-none" id="empty-cart-message">No Books Found in your cart</div>
                <hr>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<template id="cart-prototype-template">
    <div class="col mb-5 px-4">
        <div class="bg-white shadow p-4 rounded border-4 border-top border-dark pop">
            <div class="d-flex mb-2">
                <img src="<?php echo stored_file("books_image/"); ?>" alt="cart image" width="80px" id="cart-book-image">
                <div>
                    <h2 class="m-3 h6" id="cart-book-name"></h2>
                    <div class="m-3">
                        <span class="badge rounded-pill bg-light text-dark text-wrap" id="cart-book-price"></span>
                    </div>
                    <div class="d-flex m-3">
                        <div class="me-3">
                            <button type="button" class="btn btn-sm custom-bg text-white shadow-none px-3 fw-bold">+</button>
                        </div>
                        <div class="me-3 btn btn-sm bg-danger text-white shadow-none px-3 fw-bold">1</div>
                        <div>
                            <button type="button" class="btn btn-sm custom-bg text-white shadow-none px-3 fw-bold">-</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    var APP_URL = "<?php echo APP_URL ?>";
</script>
<script src="<?php echo assets("js/cart.js") ?>" defer></script>