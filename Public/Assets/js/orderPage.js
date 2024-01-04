"use strict";

// fetch single books details
function orderDetails(ordersId, booksId) {
  const showOrderDetails = document.getElementById("showOrderDetails");
  const printableInvoice = document.getElementById("printableInvoice");
  const invoiceTemplate = document.getElementById("invoiceTemplate");
  showOrderDetails.innerHTML = "";
  printableInvoice.innerHTML = "";
  fetch(APP_URL + "/admin/order/details/" + ordersId + "/" + booksId)
    .then((res) => res.json())
    .then((data) => {
        const template = invoiceTemplate.content.cloneNode(true);
        fillData(template, data);
        showOrderDetails.appendChild(template);
        printableInvoice.appendChild(template);
    })
    .catch((err) => console.log(err.message));
}

function fillData(template, data) {
  const bookImage = template.querySelector("#book_image");
  bookImage.src = bookImage.src + data.book_image;
  template.querySelector("#book_name").innerHTML = data.book_name;
  template.querySelector("#book_price").innerHTML = data.book_price;
  template.querySelector("#order_id").innerHTML = data.order_details.id;
  template.querySelector("#name").innerHTML = data.order_details.name;
  template.querySelector("#phone").innerHTML = data.order_details.phone;
  template.querySelector("#email").innerHTML = data.order_details.email;
  template.querySelector("#whatsapp_imo").innerHTML = data.order_details.whatsapp_imo;
  template.querySelector("#order_time").innerHTML = data.order_details.datetime;
  template.querySelector("#address").innerHTML = data.order_details.address;
}

// Confirmation for deleted orders
function deleteOrdersConfirmation(id) {
  const deleteModal = document.getElementById("deleteModal");
  deleteModal.querySelector("[data-orders-delete]").setAttribute("data-orders-delete", id);
}

// Request for deleted orders
function deleteOrders(deleteButton) {
  const id = deleteButton.getAttribute("data-orders-delete");
  
  fetch(APP_URL + "/admin/delete/orders/" + id)
    .then((res) => res.json())
    .then((data) => {
      if (data.message) {
        document.getElementById("row-" + id).remove();
      }
    })
    .catch((err) => console.log(err.message));
}

// invoice
function invoicePrint() {
    window.print();
}