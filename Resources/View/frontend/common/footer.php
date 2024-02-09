<?php $contact_information = get_contact_information(); ?>
<footer>
    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-md-4 p-4">
                <h3 class="h-fonts fw-bold fs-3 mb-3">Nibras Book Store</h3>
                <a href="<?php echo url("/privacy/policy"); ?>" class="d-inline-block text-dark text-decoration-none mb-2">Privacy Policy</a><br />
                <a href="<?php echo url("/terms/conditions"); ?>" class="d-inline-block text-dark text-decoration-none mb-2">Terms & Conditions</a><br />
            </div>
            <div class="col-md-4 p-4">
                <h3 class="h-fonts fw-bold fs-3 mb-3">Links</h3>
                <a href="<?php echo url("/"); ?>" class="d-inline-block text-dark text-decoration-none mb-2">Home</a><br />
                <a href="<?php echo url("/contact"); ?>" class="d-inline-block text-dark text-decoration-none mb-2">Contact us</a><br />
            </div>
            <div class="col-md-4 p-4">
                <h3 class="h-fonts fw-bold fs-3 mb-3">Fllow us</h3>
                <a href="<?php echo $contact_information["twitter"] ?? ""; ?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
                    <i class="bi bi-twitter me-1"></i> Twitter
                </a>
                <br />
                <a href="<?php echo $contact_information["facebook"] ?? ""; ?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
                    <i class="bi bi-facebook me-1"></i> Facebook
                </a>
                <br />
                <a href="<?php echo $contact_information["instagram"] ?? ""; ?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
                    <i class="bi bi-instagram me-1"></i> Instagram
                </a>
                <br />
            </div>
        </div>
    </div>
</footer>
<p class="text-center h-fonts bg-dark text-white p-3 m-0 h6">
    &copy; Alright reserved
</p>
<!-- Cart management -->
<?php  view("/frontend/cart");?>
<!-- Cart management -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>