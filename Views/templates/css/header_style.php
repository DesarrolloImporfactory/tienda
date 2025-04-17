<style>
    
    #productos-carousel {
    max-width: 600px; /* Ajusta según lo necesario */
    margin: auto; /* Centrar el carrusel */
}
 /*variables que se definieron para las fuentes */
:root {
    --font-body-family: Montserrat, sans-serif;
    --font-body-style: normal;
    --font-body-weight: 400;
    --font-body-weight-bold: 700;
    --font-heading-family: Montserrat, sans-serif;
    --font-heading-style: normal;
    --font-heading-weight: 700;
    --font-body-scale: 1.0;
    --font-heading-scale: 1.3;

    /* Agregando espaciado entre letras */
    --font-body-spacing: 0.5px; /* Espaciado leve en el cuerpo del texto */
    --font-heading-spacing: 1px; /* Espaciado mayor en los títulos */
    /* Alinea el contenido si es necesario */
    --text-align-justified: justify;
    --text-align-centered: center;
    --text-align-left: left;
    --text-align-right: right; 
}
/*aplicacion de fuentes en varias etiquetas dependiendo de la sentencia */
    body {
        background-color: #f9f9f9;
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-body-spacing: var(--font-body-spacing);
        font-size: calc(16px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
    }
    #landing{
        background-color: #f9f9f9;
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-body-spacing: var(--font-body-spacing);
        font-size: calc(16px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
        text-align: var(--text-align-justified);
    }
    #landing strong {
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-size: calc(30px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */
        font-heading-spacing: var(--font-heading-spacing);
    }
    #landing li strong{
        font-family: var(--font-heading-family);
        font-style: var(--font-heading-style);
        font-weight: var(--font-heading-weight);
        font-size: calc(12px * var(--font-heading-scale)); /* Ajusta el tamaño de los encabezados */
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */
        font-body-spacing: var(--font-body-spacing);
        text-align: var(--text-align-justified);
    }
    #landing p strong{
        font-family: var(--font-heading-family);
        font-style: var(--font-heading-style);
        font-weight: var(--font-heading-weight);
        font-size: calc(12px * var(--font-heading-scale)); /* Ajusta el tamaño de los encabezados */
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */
        font-body-spacing: var(--font-body-spacing);
        text-align: var(--text-align-justified);
    }
    .nrml{
        background-color: #f9f9f9;
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-size: calc(16px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
        font-body-spacing: var(--font-body-spacing);
    }
    .cattt{
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-size: calc(48px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */
        font-heading-spacing: var(--font-heading-spacing);
    }
    .cat{
        background-color: #f9f9f9;
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-size: calc(20px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
        font-body-spacing: var(--font-body-spacing);
    }
    .testi{
        background-color: #f9f9f9;
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-size: calc(16px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
        font-body-spacing: var(--font-body-spacing);
    }
    .spanpan{
        font-family: var(--font-heading-family);
        font-style: var(--font-heading-style);
        font-weight: var(--font-heading-weight);
        font-size: calc(20px * var(--font-heading-scale)); /* Ajusta el tamaño de los encabezados */
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */
        font-body-spacing: var(--font-body-spacing);

    }
    .seccion h1{
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-size: calc(48px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */
        font-heading-spacing: var(--font-heading-spacing);
    }
    .testimonios h1{
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-size: calc(48px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */
        font-heading-spacing: var(--font-heading-spacing);
    }
    h1, h2, h3 {
        font-family: var(--font-heading-family);
        font-style: var(--font-heading-style);
        font-weight: var(--font-heading-weight);
        font-size: calc(20px * var(--font-heading-scale)); /* Ajusta el tamaño de los encabezados */
        font-body-spacing: var(--font-body-spacing);
}

    div h5{
        font-family: var(--font-heading-family);
        font-style: var(--font-heading-style);
        font-weight: var(--font-heading-weight);
        font-size: calc(15px * var(--font-heading-scale)); /* Ajusta el tamaño de los encabezados */
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */
        font-heading-spacing: var(--font-heading-spacing);

    }
    h5 {
        font-family: var(--font-heading-family);
        font-style: var(--font-heading-style);
        font-weight: var(--font-heading-weight);
        font-size: calc(20px * var(--font-heading-scale)); /* Ajusta el tamaño de los encabezados */
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */
    }
    div p a strong{
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-size: calc(16px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
        font-body-spacing: var(--font-body-spacing);
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */

    }
strong, b {
    font-weight: var(--font-body-weight-bold); /* Texto en negrita */
}

/*FIN de aplicacion de fuentes en varias etiquetas dependiendo de la sentencia */

    /* ESPACIO ENTRE SECCIONES */
    section {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    /* header */

    /* Cambiar el color del ícono de la hamburguesa */
    .navbar-toggler-icon {
        background-color: transparent;
        /* Hacer que el fondo sea transparente */
        border: none;
        /* Eliminar el borde */
        background-image: none;
        /* Eliminar la imagen de fondo predeterminada */
    }

    .navbar-toggler-icon::before {
        content: '\2630';
        /* Ícono de hamburguesa */
        font-size: 24px;
        /* Tamaño del ícono */
        color:
            <?php echo COLOR_TEXTO_CABECERA; ?>
        ;
        /* Cambiar a tu color preferido */
    }

    .navbar-custom {
        background-color:
            <?php echo COLOR_BACKGROUND; ?>
        ;
        /* Ajusta el color según sea necesario */
    }

    .navbar-custom .nav-link {
        color: white;
    }

    .navbar-custom .navbar-brand img {
        height: 60px;
        width: auto;
    }

    @media (max-width: 768px) {
        .navbar-custom .navbar-brand img {
            height: 45px;
        }
    }

    .search-box {
        border: none;
        border-radius: 20px;
        padding: 5px 15px;
    }

    .search-box:focus {
        border-color: #171931 !important; /* Cambia esto por el color que prefieras */
        box-shadow: 0 0 5px rgba(23, 25, 49, 0.7); /* Efecto de brillo */
        outline: none;
    }

    @media (min-width: 992px) {
        .navbar-nav {
            gap: 10px;
            display: flex;
            justify-content: flex-start;
            /* Menú alineado a la izquierda en pantallas grandes */
        }

        .navbar-brand {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
    }
       
/* Estilo normal de los enlaces de navegación antes de hacer scroll */
.navbar-custom .nav-link {
    color: white;
    transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    padding: 8px 15px; /* Agregamos padding para mejorar la apariencia del sombreado */
    border-radius: 5px; /* Bordes redondeados */
}

/* Efecto al pasar el mouse antes de hacer scroll */
.navbar-custom .nav-link:hover {
    color: white; /* Mantiene el color blanco */
    background-color: rgba(255, 255, 255, 0.2); /* Fondo semitransparente */
    box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.3); /* Sombra blanca */
}

/* Cuando el usuario hace scroll, los enlaces cambian de color */
.navbar-custom.scrolled .nav-link {
    color: #171931; /* Color oscuro después del scroll */
}

/* Efecto al pasar el mouse después de hacer scroll */
.navbar-custom.scrolled .nav-link:hover {
    color: <?php echo COLOR_BACKGROUND; ?>; /* Mantiene el color oscuro */
    background-color: <?php echo COLOR_BACKGROUND; ?>, rgba(0, 0, 0, 0.2); /* Fondo semitransparente oscuro */
    box-shadow: 0px 4px 10px rgba(23, 25, 49, 0.3); /* Sombra oscura */
}

/* Estilos para la barra de navegación */
.navbar-custom {
    background: <?php echo COLOR_BACKGROUND; ?>, rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
    transition: background 0.3s ease-in-out, backdrop-filter 0.3s ease-in-out;
}

/* Cambia el fondo de la barra de navegación al hacer scroll */
.navbar-custom.scrolled {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(15px);
}

    /* slider */
    .carousel-item {
        height: 452px !important;
        transition: transform 0.5s ease-in-out !important;  /* Suaviza la transición */
    }

    .carousel-inner {
        height: 452px !important;
        overflow: hidden;
        position: relative;
        transition: transform 0.5s ease-in-out; /* Agrega suavizado */
    }

    .carousel-item img {
        height: 100%;
        width: 100%;
        object-fit: contain;
        /* Ajusta la imagen sin distorsionarla */
    }
    .carousel-item-next,
    .carousel-item-prev,
    .carousel-item.active {
        transition: transform 0.5s ease !important;  /* Transición de las imágenes */
    }

    @media (max-width: 768px) {
        .carousel-item {
            height: 200px !important;
        }

        .carousel-inner {
            height: 200px !important;
        }

        .carousel-item img {
            object-fit: fill;
        }
    }

/* Estilos generales para ambas marquesinas */
.marquee-container {
    overflow: hidden;
    background-color: <?php echo COLOR_BACKGROUND; ?>;
    color: white;
    width: 100%;
    height: 40px;
    position: relative;
    display: flex;
    align-items: center;
}

/* Efecto de desvanecimiento en los extremos */
.marquee-container::before,
.marquee-container::after {
    content: "";
    position: absolute;
    top: 0;
    width: 50px;
    height: 100%;
    z-index: 1;
}

.marquee-container::before {
    left: 0;
    background: linear-gradient(to right, <?php echo COLOR_BACKGROUND; ?> 0%, rgba(0, 0, 0, 0) 100%);
}

.marquee-container::after {
    right: 0;
    background: linear-gradient(to left, <?php echo COLOR_BACKGROUND; ?> 0%, rgba(0, 0, 0, 0) 100%);
}

/* Marquesina */
.marquee {

    display: flex;
    white-space: nowrap;
    animation: marqueeAnimation 30s linear infinite;
}

/* Contenido dentro de la marquesina con mayor separación */
.marquee-content {
    color: <?php echo COLOR_TEXTO_CABECERA; ?>;
    display: inline-block;
    text-align: center;
    padding-right: 100px; /* Aumenta la separación entre mensajes */
    font-size: 16px;
    font-weight: bold;
    
}

/* Separador entre mensajes */
.marquee-content::after {
    content: " • ";
    margin-left: 100px; /* Mayor separación entre el mensaje y el separador */
    color: ;<?php echo COLOR_TEXTO_CABECERA; ?>;
    font-weight: bold;
}

/* Animación */
@keyframes marqueeAnimation {
    from {
        transform: translateX(100%);
    }
    to {
        transform: translateX(-100%);
    }
}
    /* Fin abajo */

    /* fin slider */
    .seccion {
        padding-top: 50px;
        padding-bottom: 50px;
        padding-right: 15%;
        padding-left: 15%;
    }


    /* Fin header */

    /* FOOTER TEMPORAL */
    footer {
        background-color: #f8f9fa;
    }

    .footer {
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

    /* Seccion de css añadido del anteiror sistema */
    .caja {
        
        display: flex;
        justify-content: center; /* Centra los testimonios horizontalmente */
        align-items: start; 
    }


   /* Línea inicial */
.degraded-line {
    width: 100%;
    height: 2px;
    background: radial-gradient(circle, <?php echo COLOR_BACKGROUND; ?>  30%, transparent 90%);
    transition: transform 0.4s ease-in-out, background 0.4s ease-in-out;
    transform-origin: center center; /* Establece el centro como punto de zoom */
}

/* Efecto de zoom al pasar el mouse */
.degraded-line:hover {
    background: radial-gradient(circle, #ff5733 30%, transparent 90%); /* Cambia el color del degradado */
    transform: scaleY(2); /* Hace que la línea haga un "zoom" verticalmente */
}

/* Efecto de desvanecimiento de bordes para el degradado */
.degraded-line::before,
.degraded-line::after {
    content: "";
    position: absolute;
    top: 0;
    width: 50px;
    height: 100%;
    z-index: 1;
}
/*
.degraded-line::before {
    left: 0;
    background: linear-gradient(to right, #171931 0%, rgba(0, 0, 0, 0) 100%);
}

.degraded-line::after {
    right: 0;
    background: linear-gradient(to left, #171931 0%, rgba(0, 0, 0, 0) 100%);
} */

    .category-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding-left: 20px;
        padding-right: 20px;
    }

    .category-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background-position: center;
        background-size: cover;
        display: inline-block;
        margin-bottom: 10px;
    }

    .category-button {
        display: inline-block;
        width: auto;
        padding: 5px 20px;
        margin: 0 auto;
        cursor: pointer;
        text-align: center;

        position: relative;
         overflow: hidden;
        box-sizing: border-box;
        
    }
    .category-button {
        display: inline-block;
        width: auto;
        padding: 5px 20px;
        margin: 0 auto;
        cursor: pointer;
        text-align: center;
        
        position: relative;
         overflow: hidden;
        box-sizing: border-box;
        
    }
    .category-button:hover {
    border-color: #ff5733; /* Cambia el color del borde */
    box-shadow: 0px 0px 10px rgba(255, 87, 51, 0.8);
}

    .category-container a {
        text-decoration: none;
        color: inherit;
    }

    .card_body_testimonios {
        min-height: 135px !important;
    }

    .card_body_testimonios p {
       max-width: 300px;
       margin: auto;
    }


    .img_card_testimonio {
        height: 150px !important;
        width: 150px !important;
        object-fit: cover !important;
    }

    /* Owl Carousel Customizations */

    .owl-carousel .owl-item img {
        object-fit: cover;
        height: 100%;
        width: auto;
    }

    .owl-carousel .owl-nav {
        position: absolute;
        bottom: -35px;
        transform: translateY(-50%);
        width: 100%;
        z-index: 100;
    }

    .owl-dots {
        position: absolute;
        bottom: -40px;
        left: 0;
        right: 0;
        margin: auto;
    }


    /* Estilos generales para el contenedor del carrusel */
    /* Asegura que el contenedor del carrusel tenga posición relativa */
/* Asegura que el contenedor del carrusel tenga posición relativa */
/* cambios en el owl-next y owl-prev del carousel */
.testimonios {
    position: relative !important;
    display: flex !important;
    justify-content: center !important;
}

/* Asegura que el carrusel se ajuste bien */
.owl-carousel {
    position: relative !important;
    width: 100% !important;
}

/* Asegura que los botones estén alineados correctamente */
.owl-carousel .owl-nav {
    position: absolute !important;
    width: 100vw !important;
    left: 50%;
    top: 50% !important;
    transform: translateX(-50%) translateY(-50%) !important;
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    pointer-events: none !important;
}

/* Ajuste dinámico de los botones según el tamaño del contenido */
.owl-carousel .owl-nav button.owl-prev,
.owl-carousel .owl-nav button.owl-next {
    pointer-events: all !important;
    background-color: transparent !important;
    color: <?php echo COLOR_BACKGROUND; ?> !important;
    border: none !important;
    box-shadow: none !important;
    border-radius: 50% !important;
    width: 50px !important;
    height: 50px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: background-color 0.3s ease, transform 0.3s ease !important;
    z-index: 1000 !important;
    position: absolute !important;
}

/* Posicionamiento dinámico */
.owl-carousel .owl-nav button.owl-prev {
    left: 60px !important;
}

.owl-carousel .owl-nav button.owl-next {
    right: 60px !important;
}

/* Efecto de hover */
.owl-carousel .owl-nav button.owl-prev:hover,
.owl-carousel .owl-nav button.owl-next:hover {
    
    transform: scale(1.1) !important;
}

/* Ajuste en pantallas medianas */
@media (max-width: 1024px) {
    .owl-carousel .owl-nav button.owl-prev {
        left: -40px !important;
    }
    
    .owl-carousel .owl-nav button.owl-next {
        right: -40px !important;
    }
}

/* Oculta los botones en pantallas pequeñas */
@media (max-width: 768px) {
    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel .owl-nav button.owl-next {
        display: none !important;
    }
}
/* TESTIMONIOS/CARDS EN GENERAL */
/* Asegura que los elementos dentro del carrusel estén centrados */
/* Asegura que las cards se estiren y se alineen correctamente */
/* Asegura que las cards se estiren correctamente */
.owl-carousel .owl-item { 
    display: flex !important;
    align-items: stretch !important; /* Mantiene la altura uniforme */
    justify-content: center !important;
}
/* Asegura que todas las cards tengan la misma altura y tamaño fijo */
.card {
    position: relative !important;
    display: flex !important;
    flex-direction: column !important;
    height: 400px !important; /* Ajusta según el diseño */
    width: 280px !important; /* Ajusta el tamaño fijo de la card */
    padding: 0 !important;
    margin: 0 10px !important; /* Agrega margen entre cards */
    background: #ffffff !important;
    border-radius: 12px !important;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1) !important;
    overflow: hidden !important;
    transition: transform 0.3s ease, box-shadow 0.3s ease !important;
}

.card:hover {
    transform: translateY(-5px) !important;
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15) !important;
}
.card:hover .ahorro {
  display: none !important;
}
.card:hover .ahorro-container {
  display: none !important;
  opacity: 0;
}
.img-container:hover .ahorro {
  display: none !important;
}
.ahorro-container{
    opacity: 1;
    transition: opacity 0.3s ease-in-out;
}

/* Contenedor de la imagen con altura fija */
.img-container {
    width: 100% !important;
    height: 180px !important; /* Mantiene una altura fija */
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    background: linear-gradient(35deg, #1C1F33, #D33E43);
    border-top-left-radius: 12px !important;
    border-top-right-radius: 12px !important;
}

.img-container img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    transition: transform 0.3s ease !important;
}

.card:hover .img-container img {
    transform: scale(1.05) !important;
}

/* Contenido de la card con altura adaptable */
.card-body {
    flex-grow: 1 !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: space-between !important;
    align-items: center !important;
    text-align: center !important;
    padding: 15px !important;
    overflow: hidden !important;
}

/* Ajuste del título */
.card h5 {
    font-size: 1.1rem !important;
    color: #333 !important;
    font-weight: 600 !important;
    letter-spacing: 0.5px !important;
    margin-bottom: 8px !important;
    white-space: nowrap !important;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
}

/* Ajuste del texto */
.card-text {
    font-size: 0.95rem !important;
    color: #555 !important;
    line-height: 1.4 !important;
    max-width: 90% !important;
    flex-grow: 1 !important;
    overflow: hidden !important;
    display: -webkit-box !important;
    -webkit-line-clamp: 3 !important; /* Limita a 3 líneas */
    -webkit-box-orient: vertical !important;
    text-overflow: ellipsis !important;
    background: transparent !important;
    box-shadow: none !important;
}
/* CARDS DE LOS ICONOS */
/* Asegura que la card ocupe toda la altura disponible */
.card1 {
    position: relative !important;
    display: flex !important;
    flex-direction: column !important;
    height: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
    background: #ffffff !important; /* Fondo limpio */
    border-radius: 12px !important; /* Bordes redondeados */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1) !important; /* Sombra ligera */
    overflow: hidden !important;
    transition: transform 0.3s ease, box-shadow 0.3s ease !important;
}

.card1:hover {
    transform: translateY(-5px) !important; /* Efecto de elevación */
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15) !important; /* Sombra más pronunciada */
}



.card1:hover .img-container img {
    transform: scale(1.05) !important; /* Pequeño zoom en hover */
}

/* Contenedor del texto alineado arriba */
.card-body1 {
    flex-grow: 1 !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: flex-start !important; /* Alinea el contenido en la parte superior */
    align-items: center !important; /* Mantiene el contenido centrado horizontalmente */
    text-align: center !important;
    padding: 20px !important;
    margin: 0 !important;
}

/* Título de la card con más presencia */
.card1 h5 {
    font-size: 1.2rem !important;
    color: #333 !important;
    font-weight: 600 !important; /* Más presencia */
    letter-spacing: 0.5px !important; /* Separación ligera */
    margin-bottom: 10px !important;
}

/* Texto con mejor legibilidad */
.card-text1 {
    font-size: 1rem !important;
    color: #555 !important;
    line-height: 1.5 !important; /* Espaciado más cómodo */
    max-width: 90% !important;
    margin-top: 10px !important; /* Espacio entre la imagen y el texto */
    background: transparent !important;
    box-shadow: none !important;
}

/* Ajusta cualquier otro texto dentro de la card */
.text-muted.text-decoration-line-through {
    font-size: 14px !important;
    color: #888 !important;
}





    .text-primary.fs-5.pe-2 {
        font-size: 1rem;
    }

    .product-footer {
        display: flex;
        align-items: center;
    }



    .btn-primary {
        background-color: #0d6efd !important;
        border-color: #0d6efd !important;
    }

    .btn-primary:hover {
        background-color: #0b5ed7 !important;
        border-color: #0a58ca !important;
    }

    .btn {
    display: inline-block;
    font-weight: 400;
    color: #fff;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.375rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

/*  Evita que el botón cambie de tamaño al pasar el mouse */
.btn:hover {
    transform: none !important; /* Evita cualquier escala */
    padding: 0.375rem 0.75rem !important; /* Mantiene el tamaño fijo */
    border-width: 1px !important; /* Evita que el borde se agrande */
}
.btn-cantidad{
    background-color: #f8f9fa !important;
    border: 1px solid #6c757d !important;
    color: #000 !important;
    display: inline-flex !important;
    align-items: center;
    justify-content: center;
    width: 32px !important;
    height: 32px !important;
    padding: 0 !important;
    font-weight: bold;
    font-size: 18px;
    line-height: 1;
    box-shadow: none !important;
    transition: none !important; /* evita animacion */
}
.btn-cantidad:hover{
    background-color: #e2e6ea !important;
    border: 1px solid #6c757d !important;
    color: #000 !important;
    width: 32px !important; /* evita agrandamiento */
    height: 32px !important;
    padding: 0 !important;
    font-size: 18px;
}
.btn-eliminar{
    background-color: #dc3545 !important;
    color: #fff !important;
    width: 32px;
    height: 32px;
    padding: 0 !important;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-shadow: none !important;
    transition: none !important;
}
.btn-eliminar:hover{
    background-color: #bb2d3b !important;
    color: #fff !important;
    width: 32px;
    height: 32px;
}
.link-no-style{
    color: inherit !important;
    text-decoration: none !important;
    cursor: pointer; /* opcional, si no quieres que se vea como link */
}
.link-no-style:hover{
    color:inherit !important;
    text-decoration: none !important;
}
.btn-buy-check{
    background-color: #ff0000 !important;
    color: white !important;
    font-weight: bold;
    font-size: 18px;
    border: none;
    border-radius: 12px;
    padding: 12px 24px;
    display: inline-block;
    text-align: center;
    min-width: 200px;
    transition: none !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
.boton-estable{
    min-width: 220px;
    padding: 12px 24px;
    height: auto;
    display: inline-block;
    box-sizing: border-box;
}
/* evita que el boton cambie de tamaño al hacer hover */
.boton-estable:hover{
    padding: 12px 24px;
    min-width: 220px;
    transform: none; /*si quieres que no crezca ni con transform */
}

    .carousel-item {
        min-height: 300px;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    }

    @media (max-width: 768px) {
        .carousel-item {
            height: auto !important;
            min-height: 120px;
            background-position: center;
            background-size: contain;
        }

        .carousel-caption {
            display: none;
        }
    }

    .carousel-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color:
            <?php /* echo get_row('perfil', 'banner_color_filtro', 'id_perfil', '1')  */ ?> !important;
        opacity:
            <?php /* echo get_row('perfil', 'banner_opacidad', 'id_perfil', '1') */ ?> !important;
    }

    .carousel-caption {
        position: relative;
        z-index: 3;
    }

    .carousel-control-prev,
    .carousel-control-next {
        z-index: 1;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .text-decoration-none {
        text-decoration: none !important;
    }
    .somb{
        background: transparent !important;
        box-shadow: none !important;
    }
    .text-dark {
        color: #343a40 !important;
    }

    .texto_precio {
        color:
            <?php echo COLOR_TEXTO_PRECIO; ?>
        ;
        ;
    }

    
    .card-title {
        margin-bottom: 0.75rem;
    }


    /* Estilos generales de Botón flotante para WhatsApp */
    /*Estilos generales del boton whatsapp*/
.whatsapp-btn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 9999;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background-color: #25D366;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  animation: breathe 2s ease-in-out infinite;
  text-decoration: none;
  cursor: pointer;
}

.tooltip-text {
  visibility: hidden;
  background-color: black;
  color: white;
  text-align: center;
  padding: 8px 12px;
  border-radius: 5px;
  position: absolute;
  right: 110%; /* Lo mueve a la izquierda del botón */
  top: 50%;
  transform: translateY(-50%);
  opacity: 0;
  transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
  white-space: nowrap;
}

/* Flecha del tooltip */
.tooltip-text::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 100%;
  transform: translateY(-50%);
  border-width: 6px;
  border-style: solid;
  border-color: transparent transparent transparent black;
}

/* Muestra el tooltip al pasar el cursor */
.whatsapp-btn:hover .tooltip-text {
  visibility: visible;
  opacity: 1;
}

/* Estilos solo al icono WhatsApp */
.whatsapp-btn i {
  color: #fff;
  font-size: 24px;
  animation: beat 2s ease-in-out infinite;
  text-decoration: none;
}

/*Estilos con animation contorno respirando*/
@keyframes breathe {
  0% {
    box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5);
  }
  70% {
    box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
  }
  100% {
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
  }
}

/*Estilos de animacion del icono latiendo*/
@keyframes beat {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.2);
  }
  100% {
    transform: scale(1);
  }
}
    @media (max-width: 768px) {
        .whatsapp-float {
            bottom: 20px;
            /* Distancia desde el fondo para dispositivos móviles */
            right: 20px;
            /* Distancia desde el lado derecho para dispositivos móviles */
        }
    }


    /* Fin Botón flotante para WhatsApp */

    /* Fin seccion de css añadido del anteiror sistema */

    /* footer del anterior sistema */
    .footer-contenedor {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        padding: 20px;
        justify-content: space-around;
        place-content: center;
        background-color: #f1f1f1;
        flex-wrap: wrap;
    }

    .footer-contenido {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .descripcion {
        font-size: 12px;
        text-align: center;
    }

    .lista_legal {
        list-style: none;
        padding: 0;
    }

    .lista_legal li {
        font-size: 12px;
        margin: 5px;
    }

    #navbarLogo {
        width: 50px;
        height: 50px;
    }

    .icon-redes {
        margin: 5px;
    }

    .redes {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon-redes img {
        width: 40px;
        height: 40px;
    }

    .icon-redes img:hover {
        transform: scale(1.4);
    }

    .icon-redes img:active {
        transform: scale(1);
    }

    .ws {
        color: #24d366;
        font-size: 2em;
    }

    .send {
        color: red;
        font-size: 2em;
    }

    @keyframes sacudir {
        0% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(10deg);
        }

        50% {
            transform: rotate(-10deg);
        }

        75% {
            transform: rotate(10deg);
        }

        100% {
            transform: rotate(-10deg);
        }
    }

    .icon-redes:hover {
        animation: sacudir 0.5s;
    }

    .icons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
    }

    /* Añadir media queries para responsividad */
    @media (max-width: 768px) {
        .footer-contenedor {
            grid-template-columns: repeat(2, 1fr);
        }


    }

    @media (max-width: 480px) {
        .footer-contenedor {
            grid-template-columns: 1fr;
        }

        .descripcion,
        .lista_legal li {
            font-size: 14px;
        }

        .icon-redes img {
            width: 30px;
            height: 30px;
        }
    }

    .footer-container {
        background-color: #333;
        color: white;
        padding: 20px 0;
        text-align: center;
    }

    .footer-container h3,
    .footer-container p {
        margin: 5px 0;
    }

    .footer-container a {
        color: white;
        text-decoration: none;
    }

    .footer-container a:hover {
        text-decoration: underline;
    }



    .tachado {
        text-decoration: line-through;
    }

    .ahorro {
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .ahorro {
            font-size: 15px;
        }
    }

    .texto_boton {
        color:
            <?php echo COLOR_TEXTO_BOTON; ?>
            !important;
        background-color:
            <?php echo COLOR_BOTONES; ?>
            !important;
        background-color 0.3s ease-in-out;
    }
    .texto_boton:hover {
    transform: scale(1.1);
    background-color: #ff5733; /* Cambia el color al pasar el mouse */
    color: white;
}

    /* fin css faltante */

    /* carrito checkout */
    /* .productos_carrito-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        font-family: 'Helvetica Neue', Arial, sans-serif;
        font-weight: 400;
    }

    .productos_carrito-item img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
    }

    .productos_carrito-item .productos_carrito-info {
        flex: 1;
        margin-left: 15px;
        font-size: 18px;
        font-weight: 600;
    }

    .productos_carrito-item .productos_carrito-info a {
        font-size: 18px;
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    .productos_carrito-item .productos_carrito-info a:hover {
        text-decoration: underline;
    }

    .productos_carrito-item .productos_carrito-precio {
        margin-right: 10px;
        font-size: 18px;
        font-weight: 700;
        color: #000;
    }

    .resumen_carrito {
        border-top: 1px solid #ddd;
        padding-top: 15px;
        font-size: 16px;
        font-weight: bold;
    }

    .custom-card {
        border: 2px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        max-width: 350px;
        margin: auto;
        font-family: 'Helvetica Neue', Arial, sans-serif;
        font-weight: 400;
    }

    .custom-card-header {
        font-weight: bold;
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 10px;
    }

    .custom-card-body {
        background-color: #f4f6f9;
        padding: 10px;
        border-radius: 8px;
    }

    .custom-product {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        margin-bottom: 10px;
        background-color: white;
        border: 2px solid #f0f0f0;
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
    }

    .custom-discount {
        display: inline-block;
        background-color: #fe0000;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.9rem;
        font-weight: bold;
        margin-top: 5px;
    }

    .custom-product-price {
        text-align: right;
        font-size: 1rem;
    }

    .old-price {
        text-decoration: line-through;
        color: #999;
        font-size: 0.9rem;
    }

    .new-price {
        font-weight: bold;
        font-size: 1.5rem;
        color: #000;
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
        font-size: 1.2rem;
    } */
        /* fin carrito checkout */

</style>