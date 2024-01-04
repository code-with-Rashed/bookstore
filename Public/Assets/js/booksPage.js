"use strict";

// fetch single books details
function booksDetail(id) {
  const editBooksModal = document.getElementById("editBooksModal");
  if (editBooksModal.querySelector(".ck")) {
    editBooksModal.querySelector(".ck").remove();
  }
  fetch(APP_URL + "/admin/books/" + id)
    .then((res) => res.json())
    .then((data) => {
      editBooksModal.querySelector("#id").value = data.id;
      editBooksModal.querySelector("#editName").value = data.name;
      editBooksModal.querySelector("#editPrice").value = data.price;
      editBooksModal.querySelector("#editBooksDescription").innerText =
        data.description;
      editior();
    })
    .catch((err) => console.log(err.message));
}
// open ck editor
function editior() {
  ClassicEditor.create(document.querySelector("#editBooksDescription"))
    .then((editor) => {
      // console.log(editor);
    })
    .catch((error) => {
      // console.error(error);
    });
}

// get books images
function getBooksImages(booksId) {
  const booksImageModal = document.getElementById("booksImageModal");
  booksImageModal.querySelector("#books_id").value = booksId;
  const booksImages = booksImageModal.querySelector("#booksImages");
  const booksImagesTemplate = document.querySelector("#booksImagesTemplate");
  booksImages.innerHTML = "";
  fetch(APP_URL + "/admin/books/image/" + booksId)
    .then((res) => res.json())
    .then((data) => {
      if (data.length > 0) {
        data.forEach((element) => {
          const template = booksImagesTemplate.content.cloneNode(true);
          fillData(template, element);
          booksImages.appendChild(template);
        });
      } else {
        booksImages.innerHTML = `<strong class="py-3 d-block text-danger">Images not found !! . Choosed books images.</strong>`;
      }
    })
    .catch((err) => console.log(err.message));

  function fillData(template, data) {
    const booksImageTableRow = template.querySelector("tr");
    const booksImage = template.querySelector("#booksImage");
    const thumbnail = template.querySelector("#thumbnail");
    const deleteBooksImage = template.querySelector("#deleteBooksImage");
    booksImage.src = booksImage.src + data.image;
    thumbnail.setAttribute(
      "onclick",
      `thumbnailSelect(${data.id},${data.thumbnail},${data.books_id})`
    );
    booksImageTableRow.setAttribute("id", `booksImageTableRow-${data.id}`);
    deleteBooksImage.setAttribute("onclick", `deleteBooksImage(${data.id})`);
    if (data.thumbnail == 1) {
      thumbnail.classList.add("btn-primary");
    } else {
      thumbnail.classList.add("btn-secondary");
    }
  }
}

function deleteBooksImage(id) {
  document.getElementById("booksImageTableRow-" + id).remove();
  fetch(APP_URL + "/admin/delete/books/image/" + id)
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
    })
    .catch((err) => console.log(err));
}
function thumbnailSelect(id, thumbnail, booksId) {
  fetch(
    APP_URL + "/admin/select/books/image/thumbnail/" + id + "/" + thumbnail
  );
  setTimeout(() => {
    getBooksImages(booksId);
  }, 100);
}
