<?php include 'Views/templates/header3.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - <?php echo NOMBRE_TIENDA; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <style>

    </style>
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
            <a class="navbar-brand texto-primary display-5 fw-bold" href="#">Logo</a>

            <ul id="listaNav1" class="navbar-nav d-md-flex d-none  flex-row gap-4 ">
                <li class="nav-item">
                    <a class="nav-link texto-secondary" aria-current="page" href="index.html#inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-secondary" href="index.html#quienes">Quienes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-secondary" href="index.html#servicios">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-secondary" href="index.html#doctores">Doctores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-secondary active" href="citas.html">Agendar Cita</a>
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
                            <a class="nav-link texto-secondary active" aria-current="page"
                                href="index.html#inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="index.html#quienes">Quienes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="index.html#servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="index.html#urgencias">Urgencias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link texto-secondary" href="index.html#doctores">Doctores</a>
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


    <header class="mt-5">
        <div class="container">
            <div class="proHeaderTitulo d-flex justify-content-between align-items-center border-bottom border-2">
                <h3 class="display-6 fw-bold texto-secondary">Nuestros servicios </h3>

                <div class="input-group w-25">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                </div>

            </div>
            <div class="cont2Productos row">

                <div class="filtro col-3">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="inputValorMinimo-left" placeholder="0">
                        <label for="inputValorMinimo-left">Precio Mínimo</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="inputValorMaximo-left" placeholder="1000">
                        <label for="inputValorMaximo-left">Precio Máximo</label>
                    </div>

                    <label>Ordenar Por:</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ordenar_por" id="precioAscendente"
                            value="precio_ascendente">
                        <label class="form-check-label" for="precioAscendente">Precio Ascendente</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ordenar_por" id="precioDescendente"
                            value="precio_descendente">
                        <label class="form-check-label" for="precioDescendente">Precio Descendente</label>
                    </div>

                    <button id="btnActualizar" class="btn btn-primary">Actualizar Productos</button>

                </div>
                <div class="row col-9" id="productosContainer">

                </div>
            </div>

        </div>
    </header>




    <footer class="fondo-tertiary pt-4">
        <div class="container px-4 border-top d-flex justify-content-between py-3 my-4 flex-column flex-md-row">
            <div class=" d-flex flex-column accordion-body align-items-center align-items-md-start w-100">
                <a class="texto-primary fs-2 fw-bold mb-3" href="#">Logo</a>
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="index.html#inicio"
                            class="nav-link px-2 text-body-secondary">Inicio</a></li>
                    <li class="nav-item"><a href="index.html#quienes" class="nav-link px-2 text-body-secondary">Quienes
                            Somos</a></li>
                    <li class="nav-item"><a href="index.html#servicios"
                            class="nav-link px-2 text-body-secondary">Servicios</a></li>
                    <li class="nav-item"><a href="index.html#doctores"
                            class="nav-link px-2 text-body-secondary">Doctores</a></li>
                    <li class="nav-item"><a href="citas.html" class="nav-link px-2 text-body-secondary">Agendar cita</a>
                    </li>
                </ul>
                <p class="text-center text-body-secondary">&copy; 2024 Company, Inc</p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10074.886852202728!2d-78.55683778728343!3d-0.25860257925138724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d598df3ddc65c5%3A0x18203d4f3fa6602c!2sBiloxi%2C%20Quito!5e0!3m2!1ses-419!2sec!4v1728095977382!5m2!1ses-419!2sec"
                allowfullscreen="" loading="lazy" class="w-100 rounded-3 border shadow"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </footer>

    <script src="main.js"></script>
    <script src="citas.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


    <script>
        let productosTotales = [];
        let productosMostrados = 0;

        // Agrega un event listener al botón
        document.getElementById('btnActualizar').addEventListener('click', actualizarProductos);

        // Función para actualizar los productos
        function actualizarProductos() {
            const valorMinimo = document.getElementById('inputValorMinimo-left').value || 0;
            const valorMaximo = document.getElementById('inputValorMaximo-left').value || 1000;
            const ordenarPor = document.querySelector('input[name="ordenar_por"]:checked') ? document.querySelector('input[name="ordenar_por"]:checked').value : null;
            const urlParams = new URLSearchParams(window.location.search);
            const idCategoria = urlParams.has('id_cat') ? urlParams.get('id_cat') : '';

            const idPlataforma = ID_PLATAFORMA;

            const formData = new FormData();
            formData.append('id_plataforma', idPlataforma);
            formData.append('id_categoria', idCategoria);
            formData.append('precio_minimo', valorMinimo);
            formData.append('precio_maximo', valorMaximo);
            formData.append('ordenar_por', ordenarPor);

            fetch(SERVERURL + 'Tienda/obtener_productos_tienda_filtro', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    productosTotales = data; // Guarda todos los productos
                    productosMostrados = 0; // Reinicia el contador
                    document.getElementById('productosContainer').innerHTML = ''; // Limpia el contenedor antes de mostrar nuevos productos
                    mostrarProductos(); // Llama a la función para mostrar productos
                })
                .catch(error => console.error('Error:', error));
        }

        function mostrarProductos() {
            const container = document.getElementById('productosContainer');
            productosTotales.forEach(producto => {
                const div = document.createElement('div');
                div.classList.add('producto');
                div.innerHTML = ` 
                 <div class="card h-100"> 
                <img src="${producto.imagen_principal_tienda}" class="card-img-top" alt="${producto.nombre_producto_tienda}">
                <div class="card-body">
                    <h5 class="card-title">${producto.nombre_producto_tienda}</h5>
                    <p class="card-text">Precio: <strong>$${producto.pvp_tienda}</strong></p>
                    <p class="card-text">Descripción: ${producto.descripcion_tienda || 'No disponible'}</p>
                    <a href="#" class="btn btn-primary">Ver Más</a> <!-- Botón de acción -->
                </div>
            </div>
                `;
                container.appendChild(div);
            });
        }
    </script>

</body>

</html>