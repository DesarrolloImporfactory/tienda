<?php include 'Views/templates/header2.php'; ?>
<?php include 'Views/Categoria2/css/categoria_style.php'; ?>
<?php require_once './Views/Producto/Modales/checkout.php'; ?>

<main>
    <div class="container my-5 custom-container">
        <div class="row">
            <!-- Barra lateral de filtros -->
            <div class="col-md-3 custom-filter-section">
                <h5>Filtrar por</h5>
                <hr>
                <div class="mb-4">
                    <h6>Categoría</h6>
                    <ul class="list-group" id="categoria-list">
                        <!-- Categorías dinámicas aquí -->
                    </ul>
                </div>
                <div>
                    <h6>Precio</h6>
                    <input type="range" class="form-range range-slider" min="0" max="3000" step="1" id="priceRange">
                    <p>Valor mínimo: $<span id="valorMinimo-range">0</span></p>
                    <p>Valor máximo: $<span id="valorMaximo-range">3000</span></p>
                </div>
            </div>

            <!-- Sección de productos -->
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Comprar todo</h3>
                    <div class="custom-sort-dropdown">
                        <select class="form-select" id="sortOptions">
                            <option value="">Ordenar por</option>
                            <option value="price-asc">Precio: bajo a alto</option>
                            <option value="price-desc">Precio: alto a bajo</option>
                            <option value="name-asc">Nombre: A-Z</option>
                            <option value="name-desc">Nombre: Z-A</option>
                        </select>
                    </div>
                </div>
                <div class="row" id="productosContainer">
                    <!-- Productos dinámicos aquí -->
                </div>
                <div class="text-center">
                    <button id="btnVerMas" class="mt-3" onclick="verMasProductos()">Ver Más</button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    let productosTotales = []; // Almacena todos los productos
    let productosMostrados = 0; // Contador de productos mostrados
    const productosPorPagina = 30; // Número de productos a mostrar por carga

    function actualizarProductos() {
        const valorMinimo = document.getElementById('valorMinimo-range').textContent || 0;
        const valorMaximo = document.getElementById('valorMaximo-range').textContent || 3000;
        const ordenarPor = document.getElementById('sortOptions').value;
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

    document.addEventListener('DOMContentLoaded', function() {
        // Inicializa el rango de precios
        initPriceRange();

        // Cargar categorías dinámicamente
        cargarCategorias();

        // Verifica si hay un ID de categoría en la URL y actualiza los productos si lo hay
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('id_cat')) {
            const idCategoria = urlParams.get('id_cat');
            filtrarPorCategoria(idCategoria);
        } else {
            verTodasCategorias();
        }

        // Manejo de cambios en la selección de ordenamiento
        document.getElementById('sortOptions').addEventListener('change', function() {
            actualizarProductos();
        });
    });

    function initPriceRange() {
        const priceRange = document.getElementById('priceRange');
        const valorMinimo = document.getElementById('valorMinimo-range');
        const valorMaximo = document.getElementById('valorMaximo-range');

        priceRange.addEventListener('input', function() {
            valorMinimo.textContent = this.value;
            actualizarProductos();
        });
    }

    function cargarCategorias() {
        let formDataCategoria = new FormData();
        formDataCategoria.append("id_plataforma", ID_PLATAFORMA);

        $.ajax({
            url: SERVERURL + 'Tienda/categoriastienda',
            method: 'POST',
            data: formDataCategoria,
            contentType: false,
            processData: false,
            success: function(response) {
                let categorias = JSON.parse(response);
                let categoriasHtml = '';

                categorias.forEach(categoria => {
                    categoriasHtml += `<li class="list-group-item" onclick="filtrarPorCategoria(${categoria.id_linea})">${categoria.nombre_linea}</li>`;
                });

                categoriasHtml += `<li class="list-group-item" onclick="verTodasCategorias()">Todos</li>`;
                $('#categoria-list').html(categoriasHtml);
            },
            error: function(error) {
                console.error("Error al consumir la API:", error);
            }
        });
    }

    function filtrarPorCategoria(idCategoria) {
        const valorMinimo = document.getElementById('valorMinimo-range').textContent || 0;
        const valorMaximo = document.getElementById('valorMaximo-range').textContent || 3000;
        const ordenarPor = document.getElementById('sortOptions').value;
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
            .then(response => response.json())
            .then(data => {
                productosTotales = data; // Guarda todos los productos
                productosMostrados = 0; // Reinicia el contador
                document.getElementById('productosContainer').innerHTML = ''; // Limpia el contenedor antes de mostrar nuevos productos
                mostrarProductos(); // Llama a la función para mostrar productos
            })
            .catch(error => console.error('Error:', error));
    }

    function verTodasCategorias() {
        filtrarPorCategoria(""); // Pasa una cadena vacía para ver todas las categorías
    }

    function mostrarProductos() {
        const productosContainer = document.getElementById('productosContainer');

        if (!Array.isArray(productosTotales)) {
            console.error('Productos no es un array:', productosTotales);
            return;
        }

        const nuevosProductos = productosTotales.slice(productosMostrados, productosMostrados + productosPorPagina);
        productosMostrados += nuevosProductos.length;

        nuevosProductos.forEach(producto => {
            const precioEspecial = parseFloat(producto.pvp_tienda);
            const precioNormal = parseFloat(producto.pref_tienda);

            const image_path = obtenerURLImagen(producto.imagen_principal_tienda);
            let texto_precioNormal = precioNormal > 0 ? `<p class="custom-price discounted">$${precioNormal.toFixed(2)}</p>` : '';
            const productoHtml = `
                <div class="col-md-4 mb-4">
                <a href="producto2?id=${producto.id_producto_tienda}" style="text-decoration: none;">
                    <div class="card custom-product-card">
                        <img src="${image_path}" class="card-img-top" alt="${producto.nombre_producto_tienda}">
                        <div class="custom-card-body">
                            <h5 class="custom-card-title">${producto.nombre_producto_tienda}</h5>
                            <div class="custom-price-container">
                                ${texto_precioNormal}
                                <p class="custom-price">$${precioEspecial.toFixed(2)}</p>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
            `;
            productosContainer.innerHTML += productoHtml;
        });

        const btnVerMas = document.getElementById('btnVerMas');
        if (productosMostrados >= productosTotales.length) {
            btnVerMas.style.display = 'none';
        } else {
            btnVerMas.style.display = 'block';
        }
    }

    function verMasProductos() {
        mostrarProductos(); // Muestra más productos al hacer clic
    }

    function obtenerURLImagen(imagePath) {
        if (imagePath) {
            if (imagePath.startsWith("http://") || imagePath.startsWith("https://")) {
                return imagePath;
            } else {
                return `${SERVERURL}${imagePath}`;
            }
        } else {
            console.error("imagePath es null o undefined");
            return null;
        }
    }
</script>

<?php include 'Views/templates/footer2.php'; ?>