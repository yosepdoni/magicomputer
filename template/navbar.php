<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Magicomputer</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    $page = $_GET['p'];
    ?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background:#100F0F;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/magicomputer/">
            <img src="./assets/logo.png" alt="" width="40" height="30" class="d-inline-block">
            Magicomputer
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item <?php if ($page == 'produk') echo 'active'; ?>">
                    <a class="nav-link" style="color: #F1F1F1;" href="/magicomputer/produk">PRODUK</a>
                </li>
                <!-- <li class="nav-item <?php if ($page == 'blank') echo 'active'; ?>">
                    <a class="nav-link" style="color: #F1F1F1;" href="#">BLANK</a>
                </li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item <?php if ($page == 'about') echo 'active'; ?>">
                    <a class="nav-link" style="color: #F1F1F1;" href="/magicomputer/about">TENTANG</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item <?php if ($page == 'login') echo 'active'; ?>">
                    <a class="nav-link" style="color: #F1F1F1;" href="/magicomputer/login">LOGIN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <style>
        .navbar {
            list-style-type: none;
            overflow: hidden;
            top: 0;
            left:0;
            right:0;
            width: 100%;
            position: fixed;
            z-index: 1;
        }

        .wa {
            list-style-type: none;
            overflow: hidden;
            width: 98%;
            display: flex;
            justify-content: right;
            text-transform: uppercase;
            position: fixed;
            bottom: 0;
            z-index: 0;
        }
        .wa img {
            width: 3rem;
        }

        .nav-item.active {
            background-color: #343a40;
        }
    </style>
</body>
</html>
