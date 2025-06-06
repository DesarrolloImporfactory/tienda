<style>
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
}
main {
        background-color: #ffffff;
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-body-spacing: var(--font-body-spacing);
        font-size: calc(16px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
    }
    div h1{
        font-family: var(--font-heading-family);
        font-style: var(--font-heading-style);
        font-weight: var(--font-heading-weight);
        font-size: calc(28px * var(--font-heading-scale)); /* Ajusta el tamaño de los encabezados */
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */
        font-heading-spacing: var(--font-heading-spacing);

    }
    div a h6{
        font-family: var(--font-body-family);
        font-style: var(--font-body-style);
        font-weight: var(--font-body-weight);
        font-size: calc(16px * var(--font-body-scale)); /* Ajusta el tamaño de fuente */
        font-body-spacing: var(--font-body-spacing);
        font-weight: var(--font-body-weight-bold); /* Texto en negrita */

    }
    @media (max-width: 768px) {
    .filtro_productos {
        display: block !important;
        width: 100% !important;
    }

    #form-rango-precios-left {
        display: block !important;
        width: 100% !important;
    }
}
/* BOTON FLOTANTE FILTRO (ARREGLO DEFORMIDAD) */
.boton-flotante-filtro {
  display: block !important; /* aseguramos que se vea en md y menores */
}

@media (min-width: 992px) {
  .boton-flotante-filtro {
    display: none !important; /* ocultamos en pantallas grandes */
  }
}

/* Evita la deformación del botón */
.boton-flotante-filtro button {
  width: 60px !important;
  height: 60px !important;
  padding: 0 !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
}
/* FIN BOTON FILTRO */

/* Estilo imagen doble de producto*/
.img-container {
        position: relative;
    }

    .img-container .hover-img {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        transition: opacity 0.7s ease-in-out;
        opacity: 0;
        display: block !important;
    }

    .btn {
    display: inline-flex;
    font-weight: 400;
    color: #fff;
    align-items: center;
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

.card {
  height: 250px;
  width: 300px;
  max-width: 100%;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  margin-bottom: 20px !important;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.15);
}
.price-flip {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 8px; /* Espacio entre los dos precios */
  width: 100%;
  margin: 0 auto;
  text-align: center;
  position: relative;
}

.price-flip .text-muted,
.price-flip .text-price {
  transition: opacity 0.4s ease, transform 0.4s ease;
  white-space: nowrap;
  font-size: 1.2rem;
}

/* Precio original (tachado) */
.price-flip .text-muted {
  color: #999 !important;
  text-decoration: line-through !important;
  opacity: 1;
}

/* Precio especial */
.price-flip .text-price {
  color: #FF5722 !important;
  font-weight: bold !important;
  opacity: 0.85;
  transform: scale(1);
}

/* Al hacer hover en la card, se aplica animación */
.card:hover .price-flip .text-muted {
  opacity: 0.3;
  transform: scale(0.95);
}

.card:hover .price-flip .text-price {
  opacity: 1;
  transform: scale(1.1);
}
.img-container {
  height: 180px;
  overflow: hidden;
  border-top-left-radius: 12px;
  border-top-right-radius: 12px;
  background: #eee;
  display: flex;
  align-items: center;
  justify-content: center;
}

.img-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.card-body {

  display: flex;
  flex-direction: column;
  justify-content: center !important;
  flex-grow: 0;
  padding: 16px; 
  margin-bottom: auto;
}

.card-footer {
    background: transparent !important;
  box-shadow: none !important;
  border-top: none !important;
  padding: 0 !important;
  
  display: flex;
  flex-direction: column;
  align-items: center !important;
  gap: 10px;
}

.product-footer {
  display: flex;
  text-align: center !important;
  align-items: center !important;
  margin-bottom: 8px;
}
.buy-button-footer{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 8px;
    margin-bottom: 8px;
    text-align: center !important;
}



/* Responsive para pantallas pequeñas */
@media (max-width: 768px) {
  .card-grid {
    grid-template-columns: 1fr;
    padding: 20px;
    gap: 30px;
  }

}

.card-title {
    margin-bottom: 0.75rem;
    flex-grow: 0 !important; /* No permite que el texto se expanda */
    display: -webkit-box;
    -webkit-line-clamp: 2; /* Limita el texto a 2 líneas */
    -webkit-box-orient: vertical;
    overflow: hidden; /* Oculta el texto que se excede */
    text-overflow: ellipsis; /* Muestra "..." si el texto es más largo de lo permitido */
    min-height: 2.8em; /* Reserva espacio para 2 lineas aproximadamente */
    line-height: 1.4em; /* Asegura un interlineado consistente */
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
    font-size: 0.85rem !important;
    color: #555 !important;
    line-height: 1.4 !important;
    max-width: 90% !important;
    flex-grow: 1 !important;
    overflow: hidden !important;
    display: -webkit-box !important;
    -webkit-line-clamp: 3 !important; /* Limita a 3 líneas */
    -webkit-box-orient: vertical !important;
    text-overflow: ellipsis !important;
}
   

   

    .left-column {
        width: 20%;
        position: -webkit-sticky;
        /* Para compatibilidad con Safari */
        position: sticky;
        top: 90px;
        /* Ajusta esto a la altura de cualquier cabecera o menú que tengas */
        height: 100%;
        /* O la altura que quieras que tenga */
    }

    .right-column {
        display: flex;
        flex-direction: column;
        align-items: center;
        align-self: start;
       
    }

    .content_left_right {
        display: flex;
    }

    #accordionCategorias .card {
        margin-bottom: 0.5rem;
        border: none;
        /* Elimina los bordes si lo deseas */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* Sombra suave para dar profundidad */
    }

    #accordionCategorias .card-header {
        padding: 0;
        /* Ajusta el relleno según sea necesario */
        background: #fff;
        /* Fondo blanco o el color que prefieras */
        border-bottom: 1px solid #eaeaea;
        /* Borde suave en la parte inferior */
    }

    #accordionCategorias .btn {
        width: 100%;
        /* Asegúrate de que los botones usen todo el ancho disponible */
        text-align: left;
        /* Alinea el texto a la izquierda */
        padding: 0;
        /* Ajusta el relleno para aumentar la altura de las filas */
        color: #333;
        /* Color de texto */
        background-color: transparent;
        /* Fondo transparente */
        border: none;
        /* Sin bordes */
        border-radius: 0.25rem;
        /* Esquinas ligeramente redondeadas */
    }

    #accordionCategorias .btn:hover,
    #accordionCategorias .btn:focus {
        color: #0056b3;
        /* Cambia el color del texto al pasar el mouse o enfocar */
        text-decoration: none;
        /* Elimina la decoración de subrayado */
        background-color: #f8f9fa;
        /* Fondo ligeramente más oscuro al pasar el mouse o enfocar */
    }

    #accordionCategorias .collapse.show {
        max-height: none;
        /* Asegúrate de que el contenido colapsable pueda expandirse completamente */
    }

    /* Transición suave para el colapso y la expansión */
    #accordionCategorias .collapse {
        transition: max-height 0.4s ease;
        padding-top: 0;
    }

    #accordionCategorias .btn {
        text-transform: capitalize;
        /* Solo la primera letra de cada palabra en mayúsculas */
        font-size: 1rem;
        /* Ajusta al tamaño de fuente deseado */
    }

    /* Esconde la columna izquierda en pantallas pequeñas */
    @media (max-width: 768px) {
        .left-column {
            display: none;
        }

        .right-column {
            width: 100%;
            padding: 0px;
        }
    }

    /* Estilo para el modal que ocupe toda la pantalla */
    .fullscreen-modal .modal-dialog {
        width: 100%;
        max-width: none;
        height: 100%;
        margin: 0;
    }

    .fullscreen-modal .modal-content {
        height: 100%;
        border-radius: 0;
    }

    /* Slide de rango de precions con noUiSlider */
    /* Base del Slider */
    .noUi-target {
        background-color: #B2B2B2;
        height: 10px;
        border-radius: 5px;
    }

    /* Conexión entre las manijas */
    .noUi-connect {
        background-color: <?php echo COLOR_BACKGROUND; ?>;
        /* Tu color de elección para la barra activa */
    }

    /* Manijas del Slider */
    .noUi-handle {
        outline: none;
        top: -5px;
        /* Ajusta esta propiedad para cambiar la posición vertical de la manija */
        border: 1px solid #D3D3D3;
        /* Borde de la manija */
        background-color: white;
        border-radius: 50%;
        width: 19px !important;
        /* Ancho de la manija */
        height: 19px !important;
        /* Altura de la manija */
        box-shadow: none;
        cursor: pointer;
        background-image: none !important;
    }

    .noUi-handle::after,
    .noUi-handle::before {
        content: none !important;
        /* Elimina el contenido de los pseudo-elementos */
    }

    /* Tooltips (los que muestran los valores encima de las manijas) */
    .noUi-tooltip {
        display: none;
        /* Oculta el tooltip por defecto de noUiSlider */
    }


    .btn_filtro {
        font-size: 20px !important;
        background: transparent;
        color: black !important;
        border-radius: 0.5rem !important;
    }

    .row {
        width: 100%;
    }

    .ver-todo-btn {
        background-color: transparent;
        /* Hace que el fondo sea transparente */
        color: #b4b4b4;
        /* Establece el color inicial del texto */
        text-decoration: none;
        /* Elimina el subrayado */
        padding: .375rem .75rem;
        /* Añade algo de padding */
        border: 1px solid white;
        /* Añade un borde si lo deseas */
        border-radius: .25rem;
        /* Redondea las esquinas si lo deseas */
        transition: color .3s;
        /* Suaviza la transición del color */
    }

    .ver-todo-btn:hover {
        color: black;
        /* Cambia el color del texto al pasar el ratón por encima */
        background-color: rgba(255, 255, 255, .3);
        /* Opcional: cambia ligeramente el color de fondo al pasar el ratón por encima */
    }

    /* Estilo sin imagen doble de producto*/
    .image-sin-hover {
        position: relative;
    }

    /* Fin estilo sin imagen doble de producto*/

    

    /* boton ver mas */
    #btnVerMas {
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 25px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        color: #007bff;
        border: 1px solid #007bff;
        background-color: transparent;
    }

    #btnVerMas:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 300%;
        background: rgba(255, 255, 255, 0.2);
        transition: all 0.75s ease;
        transform: translate(-50%, -50%) rotate(45deg);
    }

    #btnVerMas:hover {
        color: #fff;
        background-color: #007bff;
    }

    #btnVerMas:hover:before {
        width: 300%;
    }

    /* Fin boton ver mas */
</style>