<nav id="nav-bar" class="navbar navbar-expand-lg bg-white navbar-light px-lg-3 py-lg-2 shadow-sm sticky-top mb-2">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fs-3 fw-bold h-fonts" href="<?php echo url("/"); ?>">
            <img src="<?php echo stored_file("logo/" . get_logo()); ?>" alt="logo" width="50px">
        </a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2" aria-current="page" href="<?php echo url("/"); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="<?php echo url("/contact"); ?>">Contact us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>