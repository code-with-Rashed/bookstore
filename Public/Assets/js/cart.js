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
