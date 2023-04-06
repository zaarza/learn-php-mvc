<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <link href="<?= BASE_URL; ?>/assets/styles/bootstrap.min.css" rel="stylesheet">
<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL; ?>/home">PHP-MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= BASE_URL; ?>/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/about">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of navbar -->