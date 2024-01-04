<title>Books Management</title>
<!-- header area start -->
<?php view("/admin/common/header"); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<!-- header area end -->

<body class="bg-light">
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar Area Start -->
      <?php view("/admin/common/sidebar"); ?>
      <!-- Sidebar Area End -->
      <!-- Content Area Start-->
      <div class="col-10">
        <!-- Nav Header Area Start-->
        <?php view("/admin/common/navbar"); ?>
        <!-- Nav Header Area End -->
        <!-- Content Management Area Start -->
        <div class="row ms-1">
          <div class="col mt-5 bg-white shadow-sm p-4 rounded">
            <h2 class="fw-bold mb-3">Books Management</h2>
            <button class="btn btn-primary fw-bold py-2 mb-3" type="button" data-bs-toggle="modal" data-bs-target="#addBooksModal">
              <i class="bi bi-plus-square me-1"></i>
              Add New Book
            </button>
            <table class="table table-bordered table-striped text-center">
              <thead class="fs-5">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['books'] as $book) { ?>
                  <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['name']; ?></td>
                    <td class="fw-bold">&#2547;&nbsp;<?php echo $book['price']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($book['date'])); ?></td>
                    <td>
                      <?php if ($book['status']) { ?>
                        <a href="<?php echo url("/admin/books/status/change/" . $book['id'] . "/" . $book['status']); ?>" class="btn btn-primary btn-sm">
                          <i class="bi bi-cloud-arrow-up"></i>
                          Publish
                        </a>
                      <?php } else { ?>
                        <a href="<?php echo url("/admin/books/status/change/" . $book['id'] . "/" . $book['status']); ?>" class="btn btn-warning btn-sm">
                          <i class="bi bi-cloud-arrow-down"></i>
                          Un-Publish
                        </a>
                      <?php } ?>
                    </td>
                    <td>
                      <button class="btn btn-success btn-sm m-1" type="button" data-bs-toggle="modal" data-bs-target="#booksImageModal" onclick="getBooksImages(<?php echo $book['id']; ?>)">
                        <i class="bi bi-images"></i>
                        Images
                      </button>
                      <button class="btn btn-primary btn-sm m-1" type="button" data-bs-toggle="modal" data-bs-target="#editBooksModal" onclick="booksDetail(<?php echo $book['id']; ?>)">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                      </button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Content Management Area End -->
      </div>
      <!-- Content Area End -->
    </div>
  </div>
  <!-- Add Books Modal Start -->
  <div class="modal fade" id="addBooksModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">
            Add New Book
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo url("/admin/books/add"); ?>" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo $data['csrf']['CSRF']; ?>">
            <div class="form-group mb-3">
              <label for="name" class="fw-bold mb-2">Name</label>
              <input type="text" class="form-control border" id="name" name="name" required placeholder="Name...." maxlength="250" />
            </div>
            <div class="form-group mb-3">
              <label for="price" class="fw-bold mb-2">Price</label>
              <input type="number" class="form-control border" id="price" name="price" required placeholder="Price...." maxlength="5" />
            </div>
            <div class="form-group mb-3">
              <label for="addBooksDescription" class="fw-bold mb-2">Description</label>
              <textarea class="form-control" id="addBooksDescription" name="description" cols="30" rows="6"></textarea>
            </div>
            <div class="form-group d-flex justify-content-between">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Add Books Modal End -->

  <!-- Edit Books Modal Start -->
  <div class="modal fade" id="editBooksModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">
            Update Books
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo url("/admin/books/update"); ?>">
            <input type="hidden" name="csrf_token" value="<?php echo $data['csrf']['CSRF']; ?>">
            <input type="hidden" name="id" id="id">
            <div class="form-group mb-3">
              <label for="editName" class="fw-bold mb-2">Name</label>
              <input type="text" class="form-control border" id="editName" name="name" required maxlength="250" />
            </div>
            <div class="form-group mb-3">
              <label for="editPrice" class="fw-bold mb-2">Price</label>
              <input type="number" class="form-control border" id="editPrice" name="price" required maxlength="5" />
            </div>
            <div class="form-group mb-3">
              <label for="editBooksDescription" class="fw-bold mb-2">Description</label>
              <textarea class="form-control" id="editBooksDescription" name="description" cols="30" rows="6"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Edit News Modal End -->

  <!-- Images News Modal Start -->
  <div class="modal fade" id="booksImageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">
            Add New Book Image
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo url("/admin/add/books/image"); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $data['csrf']['CSRF']; ?>">
            <input type="hidden" name="books_id" id="books_id">
            <div class="form-group mb-3">
              <label for="image" class="fw-bold mb-2">Book Image :</label>
              <input type="file" class="form-control border" id="image" required accept="image/*" name="image" />
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

          <table class="table table-bordered my-4">
            <thead class="fs-5">
              <tr>
                <th>Images</th>
                <th>Thumbnail</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="booksImages">

            </tbody>
          </table>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
  </div>
  <template id="booksImagesTemplate">
    <tr>
      <td>
        <img src="<?php echo stored_file("books_image/"); ?>" alt="img" width="100px" id="booksImage" />
      </td>
      <td>
        <button class="btn" title="Set Thumbnail" id="thumbnail" onclick="">
          <i class="bi bi-check2-circle"></i>
        </button>
      </td>
      <td>
        <button class="btn btn-danger btn-sm m-1" type="button" id="deleteBooksImage">
          <i class="bi bi-trash"></i>
          Delete
        </button>
      </td>
    </tr>
  </template>
  <!-- Images News Modal End -->

  <!-- footer area start -->
  <?php view("/admin/common/footer"); ?>
  <script>
    ClassicEditor.create(document.querySelector("#addBooksDescription"))
      .then((editor) => {
        // console.log(editor);
      })
      .catch((error) => {
        // console.error(error);
      });
  </script>
  <script src="<?php echo assets("js/booksPage.js") ?>"></script>
  <!-- footer area end -->
</body>

</html>