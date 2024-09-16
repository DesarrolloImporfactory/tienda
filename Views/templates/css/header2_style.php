<style>
    /* Navbar Styles */

    /* Cambia el color del ícono de la hamburguesa */
    .custom-toggler .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='<?php echo COLOR_TEXTO_CABECERA; ?>' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    /* Cambia el color de fondo del botón si es necesario */
    .custom-toggler {
        border-color: <?php echo COLOR_TEXTO_CABECERA; ?>;
    }

    .navbar-nav .nav-link {
        color: <?php echo COLOR_TEXTO_CABECERA; ?>;
    }

    .navbar-nav .nav-link:hover {
        color: <?php echo COLOR_HOVER_CABECERA; ?>;
    }

    #buscar_input {
        border-radius: 20px 0 0 20px !important;
    }

    .bg-custom {
        background-color: <?php echo COLOR_CABECERA; ?> !important;
    }

    .buscar {
        border-radius: 0 20px 20px 0 !important;
        border: 2px solid <?php echo COLOR_TEXTO_CABECERA; ?> !important;
        color: <?php echo COLOR_TEXTO_CABECERA; ?> !important;
        background-color: transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .buscar:hover {
        background-color: <?php echo COLOR_TEXTO_CABECERA; ?> !important;
        color: <?php echo COLOR_HOVER_CABECERA; ?> !important;
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 24px;
    }

    .navbar-nav .badge {
        margin-left: 5px;
    }

    /* Sub-Navigation */
    .sub-nav {
        background-color: <?php echo COLOR_CABECERA; ?> !important;
        padding: 0.5rem 1rem;
    }

    .sub-nav .navbar-nav {
        flex-direction: row;
        justify-content: center;
        flex-wrap: nowrap;
        overflow-x: auto;
        white-space: nowrap;
    }

    .sub-nav .nav-link {
        margin-right: 1rem;
        color: <?php echo COLOR_TEXTO_CABECERA; ?>;
        padding: 0.5rem 1rem;
        text-align: center;
    }

    .sub-nav .nav-link:hover {
        color: <?php echo COLOR_HOVER_CABECERA; ?>;
        background-color: <?php echo COLOR_TEXTO_CABECERA; ?>;
        border-radius: 5px;
    }

    /* Estilos específicos para OwlCarousel en pantallas grandes */
    @media (min-width: 992px) {
        .owl-carousel .nav-item {
            width: auto !important;
        }

        .sub-nav .navbar-nav {
            flex-wrap: nowrap;
            /* Sin wrap para que OwlCarousel funcione bien */
        }
    }

    /* Responsive Styles para pantallas pequeñas */
    @media (max-width: 992px) {
        .navbar-brand {
            font-size: 20px;
        }

        #buscar_input {
            margin-right: 0;
        }

        .buscar {
            width: 100%;
            margin-top: 0.5rem;
        }

        .sub-nav .navbar-nav {
            flex-direction: column;
            align-items: flex-start;
            overflow-x: visible;
        }

        .sub-nav .nav-link {
            margin-right: 0;
            width: 100%;
            font-size: 1rem;
            padding: 0.5rem 0.75rem;
            text-align: left;
        }
    }


    .custom-carousel {
        height: 60vh;
        /* Ajusta esto a 30vh o 40vh según prefieras */
    }

    .custom-carousel .carousel-inner {
        height: 60vh;
    }

    .custom-carousel .carousel-item img {
        height: 60vh;
    }

    .carousel-caption {
        text-align: left;
        left: 10%;
        right: 50%;
        bottom: 20%;
    }

    .carousel-caption .tag {
        background-color: #e74c3c;
        color: white;
        padding: 0.5rem 1rem;
        font-weight: bold;
        display: inline-block;
        margin-bottom: 1rem;
    }

    .carousel-caption h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #000;
    }

    .carousel-caption p {
        font-size: 1.25rem;
        color: #000;
    }

    .carousel-caption .btn-primary {
        background-color: #6f42c1;
        border-color: #6f42c1;
        font-size: 1.25rem;
        padding: 0.75rem 1.5rem;
    }

    .carousel-caption .btn-primary:hover {
        background-color: #563d7c;
        border-color: #563d7c;
    }

    @media (max-width: 768px) {
        .custom-carousel {
            height: 200px;
            /* Ajusta esto a 30vh o 40vh según prefieras */
        }

        .custom-carousel .carousel-inner {
            height: 200px;
        }

        .custom-carousel .carousel-item img {
            height: 200px;
        }
    }

    .menu-icon {
        font-size: 30px;
        padding-right: 5px;
    }

    .seccion {
        padding: 20px;
    }

    .flex_seccionOfertas {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        height: 400px;
    }

    .promotion-card {
        position: relative;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: white;
        padding: 20px;
        border-radius: 8px;
        background-size: cover;
        background-position: center;
        text-align: left;
        overflow: hidden;
    }

    .promotion-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    .promotion-content {
        position: relative;
        z-index: 2;
        padding: 20px;
        border-radius: 8px;
    }

    .promotion-content h1,
    .promotion-content h2,
    .promotion-content p,
    .promotion-content button {
        margin: 0 0 10px;
    }

    .promotion-content h1 {
        font-size: 2rem;
        font-weight: bold;
    }

    .promotion-content h2 {
        font-size: 1.5rem;
    }

    .promotion-content p {
        font-size: 1rem;
    }

    .promotion-content button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
    }

    /* Responsivo */
    @media (max-width: 768px) {
        .flex_seccionOfertas {
            flex-direction: column;
        }

        .promotion-card {
            text-align: center;
        }

        .promotion-content {
            max-width: 100%;
        }

        .promotion-content h1 {
            font-size: 1.5rem;
        }

        .promotion-content h2 {
            font-size: 1.25rem;
        }

        .promotion-content p {
            font-size: 0.875rem;
        }

        .promotion-content button {
            font-size: 0.875rem;
            padding: 8px 16px;
        }
    }

    .caja {
        padding-top: 40px !important;
        padding-bottom: 40px !important;
        border-radius: 25px;
        -webkit-box-shadow: -2px 5px 5px 0px rgba(0, 0, 0, 0.23);
        -moz-box-shadow: -2px 2px 5px 0px rgba(0, 0, 0, 0.23);
        box-shadow: -2px 2px 5px 0px rgba(0, 0, 0, 0.23);
        background-color: white;
    }

    .caja_transparente {
        border-radius: 25px;
        border: 1px solid #ccc;
    }

    .seccion_iconos {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        font-weight: bold;
        font-size: 20px;
        gap: 10%;
        justify-content: center;
    }

    /* CSS para carrito de compras */
    /* El panel del carrito deslizante */
    .cart-sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #fff;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
        overflow-x: hidden;
        transition: 0.5s;
        z-index: 1001;
        padding-top: 60px;
    }

    /* Contenido del carrito dentro del panel */
    .cart-sidebar-content {
        padding: 20px;
    }

    /* Encabezado del panel deslizante con botón de cerrar */
    .cart-sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: #f5f5f5;
        border-bottom: 1px solid #ddd;
    }

    /* Botón de cerrar el panel */
    .close-btn {
        background: none;
        border: none;
        font-size: 30px;
        cursor: pointer;
    }

    /* Fondo oscuro cuando el panel está abierto */
    .cart-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        display: none;
    }

    /* Mostrar el panel y el overlay */
    .cart-sidebar.open {
        width: 300px;
        /* Puedes ajustar el ancho según lo necesites */
    }

    .cart-overlay.show {
        display: block;
    }

    /* Fin CSS para carrito de compras */
    /* seccion mas vendidos */
    .mas_vendidos {
        padding: 20px;
    }

    .mas_vendidos h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .flex_mas_vendidos {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        padding-left: 30px;
        padding-right: 30px;
    }

    .mas_vendidos-card {
        position: relative;
        flex: 1 1 150px;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: transparent;
        text-align: center;
        transition: transform 0.3s ease;
        overflow: hidden;
    }

    .mas_vendidos-card:hover .mas_vendidos-image {
        transform: scale(1.1);
    }

    .mas_vendidos-tag {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #e74c3c;
        color: white;
        padding: 5px 10px;
        font-weight: bold;
        border-radius: 3px;
        z-index: 2;
    }

    .mas_vendidos-image-wrapper {
        overflow: hidden;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .mas_vendidos-image {
        width: 300px;
        height: 300px;
        object-fit: cover;
        margin-bottom: 10px;
        transition: transform 0.3s ease;
    }

    .mas_vendidos-info {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .mas_vendidos-info p {
        margin: 5px 0;
    }

    .mas_vendidos-price {
        font-weight: bold;
        color: #333;
    }

    .mas_vendidos-old-price {
        text-decoration: line-through;
        color: <?php echo COLOR_TEXTO_PRECIO; ?>;
    }

    hr {
        height: 3px;
        border-top: 3px solid #333;
        margin: 30px 0;
        border-radius: 5px;
    }

    .hr_vertical {
        width: 1px;
        /* Grosor de la línea */
        background-color: black;
        /* Color de la línea */
        height: 40px;
        /* Altura inicial, puedes editarla */
        margin: 0 10px;
        /* Margen opcional alrededor de la línea */
        display: inline-block;
        /* Para asegurarse de que actúe como un bloque en línea */
    }


    .custom-delete-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #dc3545;
        /* Color de fondo similar a btn-danger */
        border: none;
        /* Elimina el borde */
        color: #fff;
        /* Color del texto */
        padding: 6px 12px;
        /* Espaciado interno similar a btn-sm */
        font-size: 14px;
        /* Tamaño de fuente similar a btn-sm */
        border-radius: 4px;
        /* Borde redondeado */
        cursor: pointer;
        /* Cursor de pointer al pasar el mouse */
        transition: background-color 0.3s ease;
        /* Transición suave para el color de fondo */
    }

    .custom-delete-button i {
        font-size: 16px;
        /* Ajustar el tamaño del icono */
    }

    /* Efectos al pasar el ratón */
    .custom-delete-button:hover {
        background-color: #c82333;
        /* Color más oscuro al hacer hover, como btn-danger hover */
    }

    /* Efectos cuando se hace clic */
    .custom-delete-button:active {
        background-color: #bd2130;
        /* Color cuando se presiona el botón */
    }

    /* Responsivo */
    @media (max-width: 768px) {
        .flex_mas_vendidos {
            flex-direction: column;
            align-items: center;
        }

        .mas_vendidos-card {
            flex: 1 1 auto;
            width: 80%;
        }
    }

    @media (max-width: 576px) {
        .mas_vendidos-card {
            width: 100%;
        }

        .mas_vendidos-image {
            width: 200px;
            height: 200px;
        }

        .mas_vendidos-price {
            font-size: 0.875rem;
        }

        .mas_vendidos-old-price {
            font-size: 0.75rem;
        }
    }

    /* Fin seccion mas vendidos */

    /* seccion ahorra 1 */
    .ahorro-section {
        display: flex;
        align-items: stretch;
        /* Asegura que ambos elementos tengan la misma altura */
        justify-content: center;
        padding: 20px;
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        /* Oculta cualquier contenido que sobresalga */
    }

    .ahorro-image {
        flex: 0 0 80%;
        /* Imagen ocupa el 70% del ancho */
        position: relative;
        overflow: hidden;
        border-radius: 8px 0 0 8px;
        /* Solo redondear las esquinas izquierda */
        display: flex;
        /* Usado para asegurar la altura completa */
        align-items: center;
        /* Centra verticalmente la imagen */
    }

    .ahorro-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Hace que la imagen cubra todo el espacio disponible */
    }

    .ahorro-content {
        flex: 0 0 30%;
        /* Contenido ocupa el 30% del ancho */
        background-color: #ffffff;
        padding: 40px;
        border-radius: 0 8px 8px 0;
        /* Solo redondear las esquinas derecha */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        z-index: 1;
        clip-path: polygon(0 0, 100% 0, 100% 100%, 10% 100%);
        /* Inclinación de abajo hacia arriba en el lado izquierdo */
        margin-left: -10%;
        /* Superposición para cubrir parte de la imagen */
    }

    .circle-badge {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #e74c3c;
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 50%;
        font-weight: bold;
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100px;
        height: 100px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .text-content {
        text-align: left;
        z-index: 1;
    }

    .text-content h1 {
        font-size: 3rem;
        font-weight: bold;
        color: #000;
        margin: 0;
    }

    .text-content h2 {
        font-size: 2rem;
        margin: 0;
        color: #000;
    }

    .text-content p {
        font-size: 1.25rem;
        color: #333;
        margin: 10px 0;
    }

    .text-content small {
        font-size: 0.875rem;
        color: #777;
    }

    .tienda-btn {
        background-color: #6f42c1;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1.25rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .tienda-btn:hover {
        background-color: #563d7c;
    }

    /* Responsivo */
    @media (max-width: 768px) {
        .ahorro-section {
            flex-direction: column;
        }

        .circle-badge {
            top: -25px;
            left: 50%;
            transform: translate(-50%, 0);
        }

        .ahorro-content {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            margin-left: 0;
        }

        .ahorro-image,
        .ahorro-content {
            flex: 1 0 auto;
            /* Full width in responsive mode */
        }
    }

    /* fin seccion ahorra 1 */

    /* FOOTER TEMPORAL */
    .footer {
        background-color: #f8f9fa;
        padding: 20px 0;
        color: #6c757d;
    }

    .footer .copyright {
        background-color: #343a40;
        color: #ffffff;
        padding: 10px 0;
    }

    .footer a {
        color: #6c757d;
        text-decoration: none;
    }

    .footer a:hover {
        text-decoration: underline;
    }

    /* FIN FOOTER TEMPORAL */

    /* carrito checkout */
    .productos_carrito-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        font-family: 'Helvetica Neue', Arial, sans-serif;
        /* Cambia la fuente */
        font-weight: 400;
        /* Fuente estándar */
    }

    .productos_carrito-item img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
        /* Para agregar un toque más moderno */
    }

    .productos_carrito-item .productos_carrito-info {
        flex: 1;
        margin-left: 15px;
        font-size: 18px;
        /* Ajuste del tamaño de fuente */
        font-weight: 600;
        /* Aumentar el grosor de la fuente */
    }

    .productos_carrito-item .productos_carrito-info a {
        font-size: 18px;
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
        /* Aumentar el grosor de los enlaces */
    }

    .productos_carrito-item .productos_carrito-info a:hover {
        text-decoration: underline;
    }

    .productos_carrito-item .productos_carrito-precio {
        margin-right: 10px;
        font-size: 18px;
        /* Ajuste del tamaño de la fuente */
        font-weight: 700;
        /* Aumentar el grosor de la fuente para el precio */
        color: #000;
        /* Color negro más fuerte para el precio */
    }

    .resumen_carrito {
        border-top: 1px solid #ddd;
        padding-top: 15px;
        font-size: 16px;
        font-weight: bold;
        /* Texto más grueso para el resumen del carrito */
    }


    /* fin carrito checkout */

    .custom-card {
        border: 2px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        max-width: 350px;
        margin: auto;
        font-family: 'Helvetica Neue', Arial, sans-serif;
        /* Cambia la fuente */
        font-weight: 400;
        /* Fuente estándar */
    }

    .custom-card-header {
        font-weight: bold;
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 10px;
    }

    .custom-card-body {
        background-color: #f4f6f9;
        /* Ajuste de color de fondo más claro */
        padding: 10px;
        border-radius: 8px;
    }

    .custom-product {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        /* Aumenta el espaciado interno */
        margin-bottom: 10px;
        background-color: white;
        /* Fondo blanco para las tarjetas */
        border: 2px solid #f0f0f0;
        /* Un borde más grueso y más claro */
        border-radius: 8px;
    }

    .custom-product-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
    }

    .custom-product-info {
        flex-grow: 1;
        margin-left: 10px;
        font-weight: 600;
        /* Aumenta el grosor de la fuente */
    }

    .custom-discount {
        display: inline-block;
        background-color: #fe0000;
        /* Color rojo para el descuento */
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.9rem;
        font-weight: bold;
        /* Aumenta el grosor */
        margin-top: 5px;
    }

    .custom-product-price {
        text-align: right;
        font-size: 1rem;
        /* Ajuste del tamaño de fuente */
    }

    .old-price {
        text-decoration: line-through;
        color: #999;
        font-size: 0.9rem;
    }

    .new-price {
        font-weight: bold;
        font-size: 1.5rem;
        /* Ajuste de tamaño para el precio nuevo */
        color: #000;
        /* Color negro más fuerte */
    }

    .custom-card-footer {
        margin-top: 10px;
        background-color: #e9e9e9;
        padding: 10px;
        border-radius: 8px;
    }

    .custom-summary {
        display: flex;
        justify-content: space-between;
        font-size: 18px;
        margin-bottom: 5px;
    }

    .free-shipping {
        color: #007bff;
        font-weight: bold;
    }

    .custom-total {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
        font-size: 1rem;
    }

    .total-price {
        color: #007bff;
        /* Color rojo para el precio final */
        font-size: 1.2rem;
    }
</style>