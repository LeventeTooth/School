<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop and authentication system</title>

    <link rel="shortcut icon" href="../public/img/favaxe.png" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- My CSS -->
    <link rel="stylesheet" href="../public/style.css">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/b8d8792df0.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="display: inline-block">Kerti Torpe Webshop</a>
            <form class="d-flex" role="search" style="display: inline-block">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <!-- Nem tudtam azt megoldani, hogy a Kosar, es a bejelentkezen 1 sorba legyen telefonos nezetben is -->
            <ul class="navbar-nav d-flex align-items-center" style="display: inline-block">
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Kosar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Belepes</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END Navbar -->

    <div class="container mt-3" id="mainContent">