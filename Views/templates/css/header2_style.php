<style>
    /* Navbar Styles */
    .navbar-nav .nav-link {
        color: #000;
    }

    .navbar-nav .nav-link:hover {
        color: #007bff;
    }

    .form-control {
        border-radius: 20px 0 0 20px;
    }

    .bg-light {
        background-color: white !important;
    }

    .btn-outline-primary {
        border-radius: 0 20px 20px 0;
        border-color: #6f42c1;
        color: #6f42c1;
    }

    .btn-outline-primary:hover {
        background-color: #6f42c1;
        color: #fff;
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
        background-color: #d8d7d7 !important;
        padding: 0.5rem 1rem;
    }

    .sub-nav .navbar-nav {
        flex-direction: row;
        /* Default to row on larger screens */
        justify-content: center;
        flex-wrap: nowrap;
        overflow-x: auto;
        /* Allows scrolling if content overflows */
        white-space: nowrap;
        /* Prevents text wrapping */
    }

    .sub-nav .nav-link {
        margin-right: 1rem;
        color: #000;
        padding: 0.5rem 1rem;
        text-align: center;
    }

    .sub-nav .nav-link:hover {
        color: #007bff;
        background-color: #f0f0f0;
        border-radius: 5px;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {

        /* Adjust breakpoint to lg */
        .navbar-brand {
            font-size: 20px;
        }

        .form-control {
            margin-right: 0;
        }

        .btn-outline-primary {
            width: 100%;
            margin-top: 0.5rem;
        }

        .sub-nav .navbar-nav {
            flex-direction: column;
            /* Change to column on smaller screens */
            align-items: flex-start;
            /* Align items to the start */
            overflow-x: visible;
            /* No need for horizontal scrolling on small screens */
        }

        .sub-nav .nav-link {
            margin-right: 0;
            width: 100%;
            /* Full width for better touch target */
            font-size: 1rem;
            padding: 0.5rem 0.75rem;
            /* More padding for touch devices */
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
            align-items: center;
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
        color: #888;
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

    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
        /* position: fixed; */
        bottom: 0;
        width: 100%;
    }
</style>