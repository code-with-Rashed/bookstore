// increment add to cart count 
const cartCountOne = document.getElementById("cart-count-one");
const cartCountTwo = document.getElementById("cart-count-two");
function addToCart(id = 0) {
    fetch(APP_URL + "/add-to-cart/" + id).then(res => res.json()).then((cart) => {
        cartCountOne.innerHTML = cart.count;
        cartCountTwo.innerHTML = cart.count;
    });
}
addToCart();

// fetch add to cart data
function fetchCartData() {
    let cart_item = "";
    fetch(APP_URL + "/fetch-cart-data").then(res => res.json()).then((data) => {
        if (data.is_carts_empty) {
            for (const cart of data.carts_books) {
                cart_item += `<div class="col mb-5 px-4">
               <div class="bg-white shadow p-4 rounded border-4 border-top border-dark pop">
                   <div class="d-flex mb-2">
                       <img src="${IMAGE_URL + cart.image}" alt="cart image" width="80px" id="cart-book-image">
                       <div>
                           <h2 class="m-3 h6" id="cart-book-name">${cart.name}</h2>
                           <div class="m-3">
                               <span class="badge rounded-pill bg-light text-dark text-wrap" id="cart-book-price">&#2547;&nbsp;${cart.price}</span>
                           </div>
                           <div class="d-flex m-3">
                               <div class="me-3">
                                   <button type="button" class="btn btn-sm custom-bg text-white shadow-none px-3 fw-bold" onclick="up_quantity(${cart.id})">+</button>
                               </div>
                               <div class="me-3 btn btn-sm bg-danger text-white shadow-none px-3 fw-bold" id="item-${cart.id}">0</div>
                               <div>
                                   <button type="button" class="btn btn-sm custom-bg text-white shadow-none px-3 fw-bold" onclick="down_quantity(${cart.id})">-</button>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
             </div>`;
            }
            document.getElementById('carts-container').innerHTML = cart_item;
            item_quantity();
        } else {
            document.getElementById("empty-cart-message").classList.remove("d-none");
        }
    });
}

// up cart item quantity
function up_quantity(id) {
    fetch(APP_URL + "/up_quantity/" + id);
    item_quantity();
}

// down cart item quantity
function down_quantity(id) {
    fetch(APP_URL + "/down_quantity/" + id);
    item_quantity();
}

function item_quantity() {
    fetch(APP_URL + "/item_quantity/").then(res => res.json()).then((data) => {
        for (const item in data) {
            document.getElementById("item-" + item).innerHTML = data[item];
        }
        cart_item_cost();
    });
}

// get cart item total cost then price show the user
function cart_item_cost() {
    fetch(APP_URL + "/price/").then(res => res.json()).then((data) => {
        document.getElementById("price").innerHTML = data.price;
        document.getElementById("subtotal").innerHTML = data.price;
        document.getElementById("shipping").innerHTML = data.shipping;
        document.getElementById("total-price").innerHTML = data.total_price;
    });
}