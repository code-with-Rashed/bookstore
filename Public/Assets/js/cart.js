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
    fetch(APP_URL + "/fetch-cart-data").then(res => res.json()).then((data) => {
        if (data.is_carts_empty) {
            bindCarts(data.carts_books);
        } else {
            document.getElementById("empty-cart-message").classList.remove("d-none");
        }
    });
}

function bindCarts(carts) {
    const cartsContainer = document.getElementById('carts-container');
    const cartPrototypeTemplate = document.getElementById('cart-prototype-template');

    cartsContainer.innerHTML = '';

    carts.forEach(cart => {
        const cartsClone = cartPrototypeTemplate.content.cloneNode(true);
        filDataInCartsContainer(cartsClone, cart);
        cartsContainer.appendChild(cartsClone);
    });
}

function filDataInCartsContainer(cartsClone, cart) {
    const cartBookImage = cartsClone.querySelector('#cart-book-image');
    const cartBookName = cartsClone.querySelector('#cart-book-name');
    const cartBookPrice = cartsClone.querySelector('#cart-book-price');

    cartBookImage.src = cartBookImage.src + cart.image;
    cartBookName.innerHTML = cart.name;
    cartBookPrice.innerHTML = "&#2547;&nbsp;" + cart.price;
}