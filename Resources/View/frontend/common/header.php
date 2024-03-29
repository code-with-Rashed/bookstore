<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?php echo assets("css/custom.css"); ?>" />
    <link rel="shortcut icon" href="<?php echo stored_file("favicon/" . get_favicon()); ?>" type="image/x-icon" />
</head>

<body class="bg-light" data-bs-spy="scroll">
    <!-- Scroll button start -->
    <?php view("/frontend/common/scroll"); ?>
    <!-- Scroll button end -->