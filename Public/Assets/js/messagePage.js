"use strict";

// fetch single message
function detailsMessage(id) {
  const detailMessageModal = document.getElementById("detailMessageModal");
  fetch(APP_URL + "/admin/message/details/" + id)
    .then((res) => res.json())
    .then((data) => {
      detailMessageModal.querySelector(".name").innerText = data.name;
      detailMessageModal.querySelector(".email").innerText = data.email;
      detailMessageModal.querySelector(".subject").innerText = data.subject;
      detailMessageModal.querySelector(".message").innerText = data.message;
    })
    .catch((err) => console.log(err.message));
}

// Confirmation delete message
function deleteMessageConfirmation(id) {
  const deleteModal = document.getElementById("deleteModal");
  deleteModal
    .querySelector("[data-delete-message]")
    .setAttribute("data-delete-message", id);
}
// delete message request
function deleteMessage(deleteButton) {
  const id = deleteButton.getAttribute("data-delete-message");
  fetch(APP_URL + "/admin/delete/message/" + id)
    .then((res) => res.json())
    .then((data) => {
      if (data.message) {
        document.getElementById("row-" + id).remove();
      }
    })
    .catch((err) => console.log(err.message));
}
