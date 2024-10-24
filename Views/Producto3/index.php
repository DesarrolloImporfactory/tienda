<?php include 'Views/templates/header3.php'; ?>

    <header class="py-5">
        <div class="container containerProductos3">
            <div class="d-flex justify-content-between align-items-center border-bottom border-2">
                <h3 class="display-6 fw-bold texto-secondary">Productos </h3>

            </div>
            <div class="cont2Productos row pt-4">

                <div class="filtro col-12 col-sm-6 col-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="buscador" placeholder="Buscar por nombre"
                            aria-label="Buscar por nombre" aria-describedby="button-addon2">
                        <label for="buscador">Buscar por nombre</label>
                    </div>
                    <a class="btn btn-primary w-100 mb-3" data-bs-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        Aplicar filtros
                    </a>

                    <div class="collapse mb-4" id="collapseExample">
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

                        <button id="btnBuscarActualizar2" class="btn btn-primary w-100 my-3">Actualizar</button>
                        <button id="btnLimpiarFiltros" class="btn btn-secondary w-100">Limpiar Filtros</button>
                    </div>


                </div>

                <div class="row col-md-9 col-sm-6 col-12 mx-auto" id="productosContainer">


                </div>
            </div>

        </div>
        <!-- Modal para mostrar detalles del producto -->
        <div class="modal fade" id="productoModal" tabindex="-1" aria-labelledby="productoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productoModalLabel">Detalles del Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img id="productoModalImagen" src="" class="w-100 mb-3" alt="Imagen del Producto">
                        <h5 id="productoModalTitulo"></h5>
                        <p id="productoModalDescripcion"></p>
                        <p><strong>Precio: $<span id="productoModalPrecio"></span></strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Comprar Ahora</button>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <script src="main.js"></script>
    <script src="citas.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <style>
        .imgCardProductos {
            padding: 30px;
            border: 0px;
            width: 181px;
            height: 160px;
            object-fit: cover;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            buscarActualizarProductos();
            document.getElementById('btnBuscarActualizar2').addEventListener('click', buscarActualizarProductos);

            // Añadir event listener para el campo de búsqueda
            document.getElementById('buscador').addEventListener('input', buscarActualizarProductos);
        });

        let productosTotales = [];
        let productosMostrados = 0;

        // Función para buscar y actualizar productos
        function buscarActualizarProductos() {
            const valorMinimo = document.getElementById('inputValorMinimo-left').value || 0;
            const valorMaximo = document.getElementById('inputValorMaximo-left').value || 1000;
            const ordenarPor = document.querySelector('input[name="ordenar_por"]:checked') ? document.querySelector('input[name="ordenar_por"]:checked').value : null;
            const buscadorInput = document.getElementById('buscador').value.toLowerCase(); // Convierte a minúsculas
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
                        throw new Error('Error al obtener los productos');
                    }
                    return response.json();
                })
                .then(data => {
                    productosTotales = data; // Guarda todos los productos
                    mostrarProductos(buscadorInput, valorMinimo, valorMaximo, ordenarPor); // Muestra productos filtrados
                })
                .catch(error => console.error('Error:', error));
        }

        // Función para mostrar productos según búsqueda y filtros
        function mostrarProductos(buscadorInput = '', valorMinimo = 0, valorMaximo = 1000, ordenarPor = null) {
            const container = document.getElementById('productosContainer');
            container.innerHTML = ''; // Limpiar el contenedor antes de agregar nuevos productos

            // Filtrar productos según búsqueda y filtros
            const productosFiltrados = productosTotales.filter(producto => {
                const nombreCoincide = producto.nombre_producto_tienda.toLowerCase().includes(buscadorInput);
                const precioCoincide = producto.pvp_tienda >= valorMinimo && producto.pvp_tienda <= valorMaximo;
                return nombreCoincide && precioCoincide; // Ambos deben coincidir
            });

            // Ordenar productos según la selección
            if (ordenarPor) {
                productosFiltrados.sort((a, b) => {
                    if (ordenarPor === 'precio_ascendente') {
                        return a.pvp_tienda - b.pvp_tienda; // Ordenar de menor a mayor
                    } else if (ordenarPor === 'precio_descendente') {
                        return b.pvp_tienda - a.pvp_tienda; // Ordenar de mayor a menor
                    }
                    return 0; // Sin ordenación
                });
            }

            // Mostrar los productos filtrados y ordenados
            productosFiltrados.forEach((producto, index) => {
                const imagenUrl = producto.imagen_principal_tienda || 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';

                container.innerHTML += `
            <div class="col-16 col-md-6 col-lg-4 mb-4 px-2">
                <div class="card"> 
                    <img src="${imagenUrl}" class="w-100 imgCardProductos rounded-3" alt="${producto.nombre_producto_tienda}" onerror="this.onerror=null; this.src='https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg'">
                    <div class="card-body card-body-paginaProductos">
                        <h5 class="card-title">${producto.nombre_producto_tienda}</h5>
                        <p class="card-text">Precio: <strong>$${producto.pvp_tienda}</strong></p>
                        <p class="card-text">Descripción: ${producto.descripcion_tienda || 'No disponible'}</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productoModal" onclick="abrirModal(${index})">
                            Ver Más
                        </button>
                    </div>
                </div>
            </div>
            `;
            });
        }

        function abrirModal(index) {
            const producto = productosTotales[index];
            if (!producto) return; // Verifica si el producto existe

            const modalTitulo = document.getElementById('productoModalTitulo');
            const modalDescripcion = document.getElementById('productoModalDescripcion');
            const modalPrecio = document.getElementById('productoModalPrecio');
            const modalImagen = document.getElementById('productoModalImagen');

            if (modalTitulo && modalDescripcion && modalPrecio && modalImagen) {
                // Actualizar el contenido del modal
                modalTitulo.innerText = producto.nombre_producto_tienda;
                modalDescripcion.innerText = producto.descripcion_tienda || 'No disponible';
                modalPrecio.innerText = producto.pvp_tienda;

                // Establecer la imagen del modal con un manejo de error
                modalImagen.src = producto.imagen_principal_tienda;
                modalImagen.alt = producto.nombre_producto_tienda;

                // Manejo de error para la imagen del modal
                modalImagen.onerror = function () {
                    this.onerror = null; // Evita bucles infinitos
                    this.src = 'https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';
                };
            } else {
                console.error('Elementos del modal no encontrados');
            }
        }

        document.getElementById('btnLimpiarFiltros').addEventListener('click', limpiarFiltros);
        function limpiarFiltros() {
            // Limpiar los campos de búsqueda
            document.getElementById('buscador').value = '';
            document.getElementById('inputValorMinimo-left').value = '';
            document.getElementById('inputValorMaximo-left').value = '';

            // Limpiar las opciones de ordenación
            const ordenacionRadios = document.querySelectorAll('input[name="ordenar_por"]');
            ordenacionRadios.forEach(radio => radio.checked = false);

            // Llamar a buscarActualizarProductos para mostrar todos los productos
            buscarActualizarProductos();
        }

    </script>



<?php include 'Views/templates/footer3.php'; ?>