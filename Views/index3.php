<?php include 'Views/templates/header3.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NOMBRE_TIENDA; ?></title>
    <link rel="icon" href="<?php echo SERVERURL . FAVICON; ?>" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Cargar jQuery antes que cualquier script que lo necesite -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Enlazar CSS de Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Enlazar JS de Swiper -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>

<body>
    <div id="chatOverlay"></div>


    <button onclick="openChat()"
        class="border-0 shadow d-flex wppFixed justify-content-center align-items-center p-3 position-fixed z-3 rounded-circle"
        style="bottom: 20px; right: 20px; background-color: #5dc355; height: 50px; width: 50px;">
        <i class="bi bi-whatsapp text-white"></i>
    </button>

    <div id="chatWindow" class="chat-window position-fixed rounded-3 p-0 shadow-lg"
        style="display: none; bottom: 80px; right: 20px; background-color: white; width: 300px;">
        <div class="chat-header text-white p-2 rounded-top px-4">
            <strong>Tu empresa</strong>
            <span class="close-chat float-right cursor-pointer" onclick="closeChat()">
                <i class="bi bi-x-lg text-white"></i>
            </span>
        </div>
        <div class="chat-body p-3" style="height: 200px; overflow-y: auto;">
            <p class="bg-white p-3 rounded-3">Hola, somos "Tu empresa".<br>¿En qué podemos ayudarte? 👋</p>
        </div>
        <div class="chat-footer d-flex align-items-center gap-2 p-2">
            <input style="font-family: 'Roboto Mono', monospace; font-size: 14px;" type="text" id="customerMessage"
                class="form-control w-100" placeholder="Escribe tu mensaje...">
            <button onclick="sendMessage()" class="btn text-white" style="background-color: #4BA783;">
                <i class="bi bi-send-fill"></i>
            </button>
        </div>
    </div>

    <nav class="navbar bg-white fixed-top shadow-sm">
        <div class="container px-4 d-flex">
            <a class="navbar-brand texto-primary display-5 fw-bold" href="#">Logo 1</a>

            <ul id="listaNav1" class="navbar-nav d-md-flex d-none  flex-row gap-4 ">
                <li class="nav-item">
                    <a class="nav-link texto-secondary active" aria-current="page" href="#inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-secondary" href="#quienes">Quienes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-secondary" href="#servicios">Servicios</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link texto-secondary" href="#doctores">Doctores</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link texto-secondary" href="citas.html">Agendar Cita</a>
                </li>

            </ul>
            <button class="navbar-toggler d-block" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div id="listaNav2" class="offcanvas-body p-4 d-flex flex-column">
                    <ul class="navbar-nav flex-row gap-4 d-flex flex-column mb-4">
                        <li class="nav-item">
                            <a class="nav-link texto-secondary active" aria-current="page" href="#inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="#quienes">Quienes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="#servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="#urgencias">Urgencias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="#doctores">Doctores</a>
                        </li>
                    </ul>

                    <!-- Botón para abrir otro modal -->
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbarForm" aria-controls="offcanvasNavbarForm">
                        Envianos tu consulta
                    </button>

                    <p class="text-center text-body-secondary mt-auto">&copy; 2024 Company, Inc</p>
                </div>
            </div>


            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarForm"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Envianos tu consulta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-4 d-flex flex-column">
                    <button class="btn" style="width:fit-content;" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                        <i class="bi bi-arrow-left fs-3"></i>
                    </button>
                    <form id="consultaForm">
                        <div class="d-flex gap-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingName" placeholder="Nombre">
                                <label for="floatingName">Nombre <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingSurname" placeholder="Apellido">
                                <label for="floatingSurname">Apellido <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="floatingPhone" placeholder="Teléfono">
                            <label for="floatingPhone">Teléfono <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingEmail"
                                placeholder="Correo electrónico">
                            <label for="floatingEmail">Correo electrónico <span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Deja tu comentario aquí" id="floatingTextarea"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea">Comentario (opcional)</label>
                        </div>
                        <div id="alertContainer"></div> <!-- Contenedor para alertas -->
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>

                    <p class="text-center text-body-secondary mt-auto">&copy; 2024 Company, Inc</p>

                </div>
            </div>

        </div>
    </nav>
    <div data-bs-spy="scroll" data-bs-target="#listaNav1" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-0 rounded-3" tabindex="0">
        <div data-bs-spy="scroll" data-bs-target="#listaNav2" data-bs-root-margin="0px 0px -40%"
            data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-0 rounded-3" tabindex="0">

            <header id="inicio" class="d-flex align-items-center">
                <div
                    class="container px-4 containerHeader d-flex align-items-md-end align-items-center flex-column flex-md-row">
                    <div
                        class="d-flex w-100 flex-column pb-5 text-start textosHeader align-items-center align-items-md-start">
                        <a class="d-flex logoHeaderLink" href="/">
                            <h3 class="texto-primary display-6 fw-bold d-flex">Logo</h3>
                        </a>

                        <p class="mb-0 texto-secondary fw-bold texto1Header text-center text-md-start">Odontología para
                            ti
                            y tu familia <span class="texto-primary" id="element"></span>
                        </p>

                        <p class="mb-0 text-center text-md-start">En nuestro servicio de odontología, nos enfocamos en
                            brindar atención personalizada
                            y de
                            calidad a nuestros pacientes.</p>
                        <button type="button" class="btn btn-primary mt-4" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbarForm" aria-controls="offcanvasNavbarForm">Consulta</button>
                    </div>
                    <div class="d-flex w-100">
                        <img src="https://content.app-sources.com/s/53156514013336927/uploads/Images/Recurso_1-4440997.png?format=webp"
                            class="w-100 imgHeader" alt="">
                    </div>
                </div>

            </header>

            <!-- Seccion iconos -->
            <section class="seccion1">
                <div class="container px-4 containerSeccion1 d-flex flex-column flex-sm-row gap-3" id="tarjetas-container">
                    <!-- Las tarjetas se cargarán dinámicamente aquí -->
                </div>
            </section>
            <!-- Fin seccion iconos -->

            <section id="quienes" class="seccion2 mb-0">
                <div class="container px-4 d-flex flex-column text-white py-5 text-center">
                    <h3 class="display-2 fw-bold">Velamos por su salud</h1>
                        <p class="fs-4">Somos expertos en salud oral </p>
                        <p class="">Un consultorio odontológico experto por contar con profesionales altamente
                            capacitados y
                            tecnología de
                            última generación en sus instalaciones</p>
                        <button type="button" class="btn btn-light mx-auto mt-4" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbarForm" aria-controls="offcanvasNavbarForm">Consulta</button>
                </div>
            </section>
            <img id="banner-image" src="" alt="Banner" class="d-block w-100">


            <section id="servicios" class="seccion3 padding">
                <div class="container px-4 d-flex flex-column">
                    <h3 class="display-5 fw-bold texto-secondary mb-4">Nuestros servicios </h3>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 mb-4">

                            <div class="card overflow-hidden rounded-3">
                                <img style="height: 200px; object-fit: cover;"
                                    src="https://images.unsplash.com/photo-1598531228433-d9f0cb960816?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8ZGVudGlzdGF8ZW58MHx8MHx8fDA%3D"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Servicio 1</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Agendar Cita
                                    </button>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">

                            <div class="card overflow-hidden rounded-3">
                                <img style="height: 200px; object-fit: cover;"
                                    src="https://images.unsplash.com/photo-1571772996211-2f02c9727629?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGRlbnRpc3RhfGVufDB8fDB8fHww"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Servicio 2</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Agendar Cita
                                    </button>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">

                            <div class="card overflow-hidden rounded-3">
                                <img style="height: 200px; object-fit: cover;"
                                    src="https://plus.unsplash.com/premium_photo-1674575134867-cb7623d39bdb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGRlbnRpc3RhfGVufDB8fDB8fHww"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Servicio 3</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Agendar Cita
                                    </button>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">

                            <div class="card overflow-hidden rounded-3">
                                <img style="height: 200px; object-fit: cover;"
                                    src="https://images.unsplash.com/photo-1626736985932-c0df2ae07a2e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzB8fGRlbnRpc3RhfGVufDB8fDB8fHww"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Servicio 4</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Agendar Cita
                                    </button>

                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 mb-4">

                            <div class="card overflow-hidden rounded-3">
                                <img style="height: 200px; object-fit: cover;"
                                    src="https://images.unsplash.com/photo-1667133295352-ef4c83620e8e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjB8fGRlbnRpc3RhfGVufDB8fDB8fHww"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Servicio 5</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Agendar Cita
                                    </button>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">

                            <div class="card overflow-hidden rounded-3">
                                <img style="height: 200px; object-fit: cover;"
                                    src="https://plus.unsplash.com/premium_photo-1681997203595-e45e06abe034?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGJyYWNrZXRzfGVufDB8fDB8fHww"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Servicio 6</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Agendar Cita
                                    </button>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">

                            <div class="card overflow-hidden rounded-3">
                                <img style="height: 200px; object-fit: cover;"
                                    src="https://plus.unsplash.com/premium_photo-1674179010595-81dff6bb844a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTYxfHx0cmF0YW1pZW50byUyMG9ydG9kb25jaWF8ZW58MHx8MHx8fDA%3D"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Servicio 7</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Agendar Cita
                                    </button>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">

                            <div class="card overflow-hidden rounded-3">
                                <img style="height: 200px; object-fit: cover;"
                                    src="https://plus.unsplash.com/premium_photo-1661436643545-732ea5236e59?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTczfHx0cmF0YW1pZW50byUyMG9ydG9kb25jaWF8ZW58MHx8MHx8fDA%3D"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Servicio 8</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Agendar Cita
                                    </button>

                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal servicios
                                        quemada</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img style="height: 200px; object-fit: cover;"
                                        src="https://plus.unsplash.com/premium_photo-1661436643545-732ea5236e59?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTczfHx0cmF0YW1pZW50byUyMG9ydG9kb25jaWF8ZW58MHx8MHx8fDA%3D"
                                        class="card-img-top rounded-3 border my-4" alt="...">

                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti quas consectetur
                                    doloribus, totam aliquid illum et at aperiam velit enim reiciendis maiores sit nobis
                                    magnam.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>

            <section id="urgencias" class="seccion4">
                <div class="container px-4 d-flex flex-column flex-md-row">
                    <div class="w-100 d-flex mb-4 mb-md-0">
                        <img class="mx-auto" style="width: 100%; max-width: 400px;"
                            src="https://content.app-sources.com/s/53156514013336927/uploads/Images/Recurso_10-4440997.png?format=webp"
                            alt="">
                    </div>
                    <div class="w-100 d-flex fondo-primary p-5 flex-column text-white rounded-3 shadow">
                        <h5 class="display-6">Urgencias</h5>
                        <h3 class="display-1 fw-bold">24 horas </h3>
                        <p>Proporcionamos servicio de atención de urgencias durante todo el día en nuestro consultorio
                            dental.
                        </p>
                    </div>
                </div>
            </section>
            <section class="seccion5">
                <div class="container px-4 d-flex flex-column flex-md-row">

                    <div class="w-100 d-flex p-5 pb-0 pb-md-5 flex-column texto-secondary">
                        <h5 class="display-6">Urgencias</h5>
                        <h3 class="display-1 fw-bold texto-primary">24 horas </h3>
                        <p>Proporcionamos servicio de atención de urgencias durante todo el día en nuestro consultorio
                            dental.
                        </p>
                    </div>
                    <div class="w-100 d-flex order-first order-md-last">
                        <img class="mx-auto rounded-3 shadow img2Seccion5"
                            src="https://images.unsplash.com/photo-1670250721717-889b17349fc4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODB8fGRlbnRpc3RhfGVufDB8fDB8fHww"
                            alt="">
                    </div>
                </div>
            </section>

            <section id="doctores" class="seccion6 mb-0 padding">
                <div class="container px-4 d-flex flex-column">
                    <h4 class="display-4 text-center fw-bold texto-secondary">Profesionales de calidad </h4>
                    <p class="mb-5 text-center fw-bold texto-secondary mx-auto" style="max-width: 700px;">Lorem ipsum
                        dolor sit amet consectetur, adipisicing elit. Laudantium consequuntur quas sunt libero vero!
                        Nemo sit sapiente voluptatem quisquam ea.</p>
                    <div class="d-flex gap-3  flex-column flex-md-row">
                        <div class="mx-auto card border shadow mb-3" style="width: 18rem;">
                            <img class="" style="height: 200px; object-fit: cover;"
                                src="https://www.dentaltix.com/es/sites/default/files/odontologo-clinica-dental.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Dra. Angelica Martinez</h5>
                                <hr>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of the card's content.</p>
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalDortores">
                                    Mas sobre el doctor
                                </button>
                            </div>
                        </div>
                        <div class="mx-auto card border shadow mb-3" style="width: 18rem;">
                            <img class="" style="height: 200px; object-fit: cover;"
                                src="https://doctorweb.agency/assets/img/blog/marketing-digital-para-odontologos.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Dr. David Granda</h5>
                                <hr>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of the card's content.</p>
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalDortores">
                                    Mas sobre el doctor
                                </button>
                            </div>
                        </div>
                        <div class="mx-auto card border shadow mb-3" style="width: 18rem;">
                            <img class="" style="height: 200px; object-fit: cover;"
                                src="https://www.clinicasonrisasegura.pe/wp-content/uploads/2023/04/BLOG-DENTISTAS-EN-LIMA.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Dra. Maria Valencia</h5>
                                <hr>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of the card's content.</p>
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalDortores">
                                    Mas sobre el doctor
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modalDortores" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal doctores</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img style="height: 200px; object-fit: cover;"
                                        src="https://www.clinicasonrisasegura.pe/wp-content/uploads/2023/04/BLOG-DENTISTAS-EN-LIMA.webp"
                                        class="card-img-top rounded-3 border my-4" alt="...">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, totam. Iste nemo
                                    architecto voluptates soluta, odit velit at distinctio quis eius laudantium dolores
                                    pariatur facilis impedit reiciendis saepe sed possimus.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>

    <footer class="fondo-tertiary pt-4">
        <div class="container px-4 border-top d-flex justify-content-between py-3 my-4 flex-column flex-md-row">
            <div class=" d-flex flex-column accordion-body align-items-center align-items-md-start w-100">
                <a class="texto-primary fs-2 fw-bold mb-3" href="#">Logo</a>
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="#inicio" class="nav-link px-2 text-body-secondary">Inicio</a></li>
                    <li class="nav-item"><a href="#quienes" class="nav-link px-2 text-body-secondary">Quienes Somos</a></li>
                    <li class="nav-item"><a href="#servicios" class="nav-link px-2 text-body-secondary">Servicios</a></li>
                    <li class="nav-item"><a href="#doctores" class="nav-link px-2 text-body-secondary">Doctores</a></li>
                    <li class="nav-item"><a href="citas.html" class="nav-link px-2 text-body-secondary">Agendar cita</a></li>
                </ul>
                <p class="text-center text-body-secondary">&copy; 2024 Company, Inc</p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10074.886852202728!2d-78.55683778728343!3d-0.25860257925138724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d598df3ddc65c5%3A0x18203d4f3fa6602c!2sBiloxi%2C%20Quito!5e0!3m2!1ses-419!2sec!4v1728095977382!5m2!1ses-419!2sec"
                allowfullscreen="" loading="lazy" class="w-100 rounded-3 border shadow"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


    <script src="Views/templates/js/main_header3.js"></script>
    <script src="Views/templates/js/index_header3.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <script>
    /* Sección iconos */
    // ID de la plataforma o parámetro necesario
    let formDataIconos = new FormData();
    formDataIconos.append("id_plataforma", ID_PLATAFORMA);

    $.ajax({
        url: SERVERURL + 'Tienda/iconostienda', // URL de la API de iconos
        method: 'POST',
        data: formDataIconos,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log('Respuesta completa de la API (iconos):', response);

            try {
                var iconos = JSON.parse(response); // Parsear la respuesta de la API
            } catch (e) {
                console.error('Error al parsear la respuesta:', e);
                return;
            }

            if (iconos && Array.isArray(iconos)) {
                var $tarjetasContainer = $("#tarjetas-container");

                // Limpiamos el contenedor de tarjetas por si acaso
                $tarjetasContainer.empty();

                // Iteramos sobre los iconos obtenidos de la API
                iconos.forEach(function(icono) {
                    var texto = icono.texto || 'Texto predeterminado'; // Texto de la tarjeta
                    var icon_text = icono.icon_text || 'fa-question-circle'; // Clase de Font Awesome, usa "fa" o "fas"
                    var color_icono = icono.color_icono || '#000000'; // Color del ícono

                    // Generar el HTML de la tarjeta con el diseño proporcionado, usando Font Awesome
                    var tarjetaItem = `
                        <div class="card w-100 shadow border">
                            <div class="card-body text-center d-flex flex-column gap-3 p-4">
                                <i class="fas ${icon_text} display-5" style="color: ${color_icono};"></i>
                                <p class="texto-secondary fw-bold mb-0 fs-5">${texto}</p>
                            </div>
                        </div>
                    `;

                    // Agregar la tarjeta al contenedor
                    $tarjetasContainer.append(tarjetaItem);
                });
            } else {
                console.error('La respuesta no contiene iconos válidos.');
            }
        },
        error: function(error) {
            console.log('Error al cargar los iconos:', error);
        }
    });

    /* Sección banner */
    let formDataSlider = new FormData();
    formDataSlider.append("id_plataforma", ID_PLATAFORMA);

    $.ajax({
        url: SERVERURL + 'Tienda/bannertienda', // URL de la API para el banner
        method: 'POST',
        data: formDataSlider,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(data) {
            console.log('Respuesta completa de la API (banner):', data);

            if (data && data.length > 0) {
                let banner = data[0]; // Obtenemos el primer banner
                let image_path = SERVERURL + banner.fondo_banner; // Concatenamos la ruta del servidor con la ruta del banner
                
                // Actualizamos el src de la imagen con el banner
                $('#banner-image').attr('src', image_path);
            } else {
                console.error('No se encontraron banners.');
            }
        },
        error: function(error) {
            console.error('Error fetching banner data', error);
        }
    });
</script>

    <?php include 'Views/templates/footer3.php'; ?>