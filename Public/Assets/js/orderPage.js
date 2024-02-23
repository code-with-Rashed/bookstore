"use strict";

// fetch single books details
function orderDetails(orderId) {
  const showOrderDetails = document.getElementById("showOrderDetails");
  let html = "";
  fetch(APP_URL + "/admin/order/details/" + orderId)
    .then((res) => res.json())
    .then((data) => {
      let delivery_aria = { "inside_dhaka": "ঢাকার ভিতরে", "outside_dhaka": "ঢাকার বাইরে" };
      html += `<div class="row mb-3">
      <div class="col-md-8 col-sm-12">
        <p>
          <strong>Invoice Number :</strong> <span>${data.delivery_details.id}</span>
        </p>
        <p>
          <strong>Date & Time : </strong> <span>${data.delivery_details.datetime}</span>
        </p>
        <p>
          <strong>Delivery Area : </strong> <span>${delivery_aria[data.delivery_details.delivery_option]}</span>
        </p>
      </div>
      <div class="col-md-4 col-sm-12">
        <p>
          <strong>Name : </strong> <span>${data.delivery_details.name}</span>
        </p>
        <p>
          <strong>Phone : </strong> <span>${data.delivery_details.phone}</span>
        </p>
        <p class="d-print-none">
          <strong>Whatsapp / Imo : </strong> <span>${data.delivery_details.whatsapp_imo}</span>
        </p>
        <p class="d-print-none">
          <strong>Email : </strong> <span>${data.delivery_details.email}</span>
        </p>
        <p>
          <strong>Address : </strong><span>${data.delivery_details.address}</span>
        </p>
      </div>
    </div><hr>`;
      html += `<div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>`;
      let subtotal = 0;
      let delivery_charge = data.delivery_option[data.delivery_details.delivery_option];
      for (const order of data.order_books) {
        subtotal += Number(order.price) * Number(order.quantity);
        html += `
              <tr>
                <td>${order.name}</td>
                <td>&#2547;&nbsp;${order.price}</td>
                <td>${order.quantity}</td>
                <td>&#2547;&nbsp;${Number(order.price) * Number(order.quantity)}</td>
              </tr>`;
      }
      html += `</tbody>
      <tfoot>
        <tr>
          <th colspan="3" class="text-end">Subtotal :</th>
          <td colspan="4">&#2547;&nbsp;${subtotal}</td>
        </tr>
        <tr>
          <th colspan="3" class="text-end">Delivery Charge :</th>
          <td colspan="4">&#2547;&nbsp;${delivery_charge}</td>
        </tr>
        <tr>
          <th colspan="3" class="text-end">Total Price :</th>
          <td colspan="4" class="fw-bold">&#2547;&nbsp;${Number(subtotal) + Number(delivery_charge)}</td>
        </tr>
      </tfoot>
    </table>
  </div> `;
      showOrderDetails.innerHTML = html;
    })
    .catch((err) => console.log(err.message));
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