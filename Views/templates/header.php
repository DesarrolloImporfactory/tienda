<?php include 'Views/templates/css/header_style.php'; ?>
<script>
            const SERVERURL = "<?php echo SERVERURL ?>";
            const MARCA = "<?php echo MARCA?>";
            const CARGO = <?php echo $_SESSION['cargo']; ?>
        </script>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Proyecto PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css">
    <!-- <link rel="stylesheet" href="/Views/templates/css/header_style.php"> -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand d-lg-none ms-auto" href="#">
                <img src="/img/logo_imporsuit.png" alt="IMPORT SHOP">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="font-size: 20px;">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catálogo</a>
                    </li>
                </ul>
                <a class="navbar-brand d-none d-lg-block mx-auto" href="#">
                    <img src="/img/logo_imporsuit.png" alt="IMPORT SHOP">
                </a>
                <form class="d-flex ms-auto">
                    <input class="form-control search-box" type="search" placeholder="Buscar" aria-label="Buscar">
                </form>
            </div>
        </div>
    </nav>