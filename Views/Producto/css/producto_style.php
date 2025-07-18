<style>
  /* animacion de carro de entrega */
  .loop-wrapper {
  margin: 0 auto;
  position: relative;
  display: block;
  width: 600px;
  height: 250px;
  overflow: hidden;
  border-bottom: 3px solid #fff;
  color: #fff;
}
@media  (max-width:768px) {
  .loop-wrapper{
    width: 400px;
    margin: 10px;
  }
}
.mountain {
  position: absolute;
  right: -900px;
  bottom: -20px;
  width: 2px;
  height: 2px;
  box-shadow: 
    0 0 0 50px #4DB6AC,
    60px 50px 0 70px #4DB6AC,
    90px 90px 0 50px #4DB6AC,
    250px 250px 0 50px #4DB6AC,
    290px 320px 0 50px #4DB6AC,
    320px 400px 0 50px #4DB6AC
    ;
  transform: rotate(130deg);
  animation: mtn 20s linear infinite;
}
.hill {
  position: absolute;
  right: -900px;
  bottom: -50px;
  width: 400px;
  border-radius: 50%;
  height: 20px;
  box-shadow: 
    0 0 0 50px #4DB6AC,
    -20px 0 0 20px #4DB6AC,
    -90px 0 0 50px #4DB6AC,
    250px 0 0 50px #4DB6AC,
    290px 0 0 50px #4DB6AC,
    620px 0 0 50px #4DB6AC;
  animation: hill 4s 2s linear infinite;
}
.rock {
  margin-top: -17%;
  height: 2%; 
  width: 2%;
  bottom: -2px;
  border-radius: 20px;
  position: absolute;
  background: #ddd;
}
.truck, .wheels {
  transition: all ease;
  width: 85px;
  margin-right: -60px;
  bottom: 0px;
  right: 50%;
  position: absolute;
  background: #000;
}
.truck {
  background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/130015/truck.svg) no-repeat;
  background-size: contain;
  height: 60px;
  filter: brightness(0); /* Hace que la imagen del camión se vea en negro */
}
.truck:before {
  content: " ";
  position: absolute;
  width: 25px;
  box-shadow:
    -30px 28px 0 1.5px #fff,
     -35px 18px 0 1.5px #fff;
}
.wheels {
  background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/130015/wheels.svg) no-repeat;
  height: 15px;
  margin-bottom: 0;
  filter: brightness(0); /* Ajusta las llantas a negro */
}


.rock  { animation: rock 4s   -0.530s linear infinite; }
.truck  { animation: truck 4s   0.080s ease infinite; }
.wheels  { animation: truck 4s   0.001s ease infinite; }
.truck:before { animation: wind 1.5s   0.000s ease infinite; }


@keyframes rock {
  0%   { right: -200px; }
  100% { right: 2000px; }
}
@keyframes truck {
  0%   { }
  6%   { transform: translateY(0px); }
  7%   { transform: translateY(-6px); }
  9%   { transform: translateY(0px); }
  10%   { transform: translateY(-1px); }
  11%   { transform: translateY(0px); }
  100%   { }
}
@keyframes wind {
  0%   {  }
  50%   { transform: translateY(3px) }
  100%   { }
}
@keyframes mtn {
  100% {
    transform: translateX(-2000px) rotate(130deg);
  }
}
@keyframes hill {
  100% {
    transform: translateX(-2000px);
  }
}
/* fin de animacion de carro de entrega */

  /* Se añade espacio en titulo del producto (solo moviles) */
  @media (max-width: 768px) {
  #nombre-producto {
    margin-left: 30px;
    margin-right: auto;
    text-align: center;
    max-width: 90%;
  }
}


/* Centrado total boton flotante comprar en móviles */
@media (max-width: 768px) {
  #comprar-ahora {
    left: 20px;
    right: 20px;
    transform: translateX(-50%);
    width: calc(100% - 40px); /* Deja 20px de espacio a cada lado */
    max-width: 90%;
  }
}

.text-muted.text-decoration-line-through {
    font-size: 18px !important;
    color: #888 !important;
}
/* Inicio de animacion boton comprar */
@keyframes shakeXY {
  0%   { transform: rotate(0deg); }
  2%  { transform: translateX(-3px) rotate(-2deg); } /* Mover ligeramente a la izquierda */
  4%  { transform: translateX(3px) rotate(2deg); }   /* Mover ligeramente a la derecha */
  6%  { transform: translateX(-3px) rotate(-2deg); } /* Mover ligeramente a la izquierda */
  8%  { transform: translateX(3px) rotate(2deg); }   /* Mover ligeramente a la derecha */
  10% { transform: translateX(0) rotate(0deg); }                    /* Regresar a la posición original */
  100% { transform: translateX(0) rotate(0deg); }                    /* Regresar a la posición original */
}


/* Boton comprar */
.promo-button {
  animation-name: shakeXY;
  animation: shakeXY 3s ease-in-out infinite;
  animation-fill-mode: forwards;
  
  position: relative;
  background: linear-gradient(to bottom, #ff3d3d, #c90000);
  color: white;
  font-weight: bold;
  text-align: center;
  border-radius: 12px;
  padding: 14px 26px;
  cursor: pointer;
  overflow: hidden;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  min-width: 280px;
  transition: background-color 0.3s, transform 0.3s;
  transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
  display: inline-block;
}
/* boton de comprar en dispositivos moviles */
@media screen and (max-width: 768px){
  .promo-button{
    position: relative !important;
    margin-left: auto !important;
    margin-right: auto !important;
    left: 15px !important;
    right: 0 !important;
    
  }
}
/* boton de comprar flotante */
.promo-button.floating{
  position: fixed;
  bottom: 20px;
  right: 20px;
  max-width: 50px;
  max-height: 50px;
  margin: 0 auto;
  z-index: 9999;
  padding: 0;
  min-width: unset;
  width: 50px;
  height: 50px;
  border-radius: 8px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
  font-size: 0; /* oculta texto sin quitarlo */
  display: flex;
  align-items: center;
  justify-content: center;
  
}

.promo-button .cart-icon{
  display: none;
  font-size: 30px;
  color: white;
}
.promo-button.floating .main-text,
.promo-button.floating .sub-text{
  display: none;
}
.promo-button.floating .cart-icon{
  display: inline-block;
  
}
/* boton flotante de comprar en dispositivos moviles */
@media screen and (max-width: 768px) {
    .promo-button.floating{
      position: fixed !important;
      bottom: 10px !important;
      left: 10px !important;
      right: 10px !important;
      width: auto !important;
      max-width: none !important;
      height: auto !important;
      padding: 12px 20px !important;
      border-radius: 12px !important;
      background: #c90000 !important;
      display: flex !important;
      flex-direction: column !important;
      align-items: center !important;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3) !important;
      z-index: 9999 !important;
      font-size: inherit !important;
    }
    .promo-button.floating .cart-icon{
      display: none !important;
    }
    .promo-button.floating .main-text,
    .promo-button.floating .sub-text{
      display: block !important;
      text-align: center !important;
    }
    .promo-button.floating .main-text{
      font-size: clamp(16px,5vw,20px);
    }
    .promo-button.floating .sub-text{
      font-size: clamp(12px,4vw,14px);
      color: #ffdada;
      margin-top: 2px;
    }
}
@media screen and (max-width: 768px) {
  .promo-button.floating.subido {
    bottom: 450px !important; /* Altura para subir el botón cuando esté muy cerca del final del footer */
    transition: bottom 0.3s ease-in-out;
  }
  .promo-button.floating {
    transition: bottom 0.3s ease-in-out !important;
  }
}

/* animacion de boton comprar */
.promo-button:hover {
            background-color: #3e8e41;
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .promo-button:active {
            background-color: #3e8e41;
            transform: scale(0.95);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .promo-button:focus {
            outline: none;
            box-shadow: 0 0 0 2px #3e8e41, 0 0 0 4px rgba(62, 142, 65, 0.5);
        }

        .promo-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
            box-shadow: none;
        }

   

    .promo-button .main-text {
      display: block;
      font-size: clamp(14px, 5vw, 20px);
      text-transform: uppercase;
    }

    .promo-button .sub-text {
      display: block;
      margin-top: 4px;
      font-size: clamp(10px, 3.5vw, 14px);
      color: #ffdada;
    }

    .promo-button .sub-text::before {
      content: "⚡ ";
    }

    .promo-button .sub-text::after {
      content: " ⚡";
    }

    @media screen and (max-width: 480px) {
      .promo-button {
        font-size: 16px;
        padding: 12px;
      }

      .promo-button .main-text {
        font-size: 18px;
      }

      .promo-button .sub-text {
        font-size: 13px;
      }
    }
    /* Fin de animacion boton comprar */
    
  /* ESTILOS DEL ZOOM APLICADO A LA IMAGEN PRINCIPAL */
  .img-zoom-container {
  width: 100%;
  max-width: 400px;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  margin: 0 auto;
  padding-bottom: 40px;
  margin-top: 10px;
}

.zoom-on-hover {
  transition: transform 0.3s ease;
  will-change: transform;
  max-width: 100%;
  height: auto;
  display: block;
}

.zoom-on-hover.zoomed {
  transform: scale(3);
  cursor: zoom-in;
}
 /* FIN DE ESTILOS DEL ZOOM APLICADO A LA IMAGEN PRINCIPAL */

  .stt {
  font-style: italic;
  font-size: 16px;
  color: white;
}
  .btn {
    display: flex;
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


  #main-image {
    /* Añade una sombra o borde si es necesario */
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    border-radius: 1rem;
    /* Ejemplo de sombra */
  }
  #main-image.zoomed {
  transform: scale(2); /* O el valor de zoom que desees */
  transition: transform 0.2s ease;
  cursor: zoom-out;
}

#main-image {
  transition: transform 0.2s ease;
  cursor: zoom-in;
}


  .iconos_producto {
    display: flex;
    flex-direction: row;
  }

  @media (max-width: 480px) {
    .iconos_producto {
      flex-direction: column;
    }
  }

  .list-group-item {
    background-color: transparent;
    /* Esto hará que el fondo sea transparente */
    border: none;
    /* Esto elimina el borde si lo hay */
  }

  .list-group-item img {
    opacity: 0.6;
    /* Esto hará que las miniaturas no seleccionadas sean un poco transparentes */
  }

  .list-group-item.active img {
    opacity: 1;
    /* Esto hará que la miniatura seleccionada sea completamente opaca */
    
    
  }

  .list-group-item {
    background-color: white !important;
    border-color: white !important;
    width: fit-content;
  }
  /* Estilos para miniaturas */
  .list-group-item img.img-thumbnail {
    min-width: 70px;
    max-width: 70px;
    max-height: 70px;
    min-height: 70px;
    object-fit: cover;
  }
  #list-tab{
    overflow-x: auto; 
  overflow-y: hidden; 
  white-space: nowrap; 
  scrollbar-width: none; 
  padding-top: 40px;
  }


  #list-tab::-webkit-scrollbar {
  display: none; 
}

  #main-image {
    width: 400px;
    height: 400px;
    object-fit: cover;
    cursor: pointer;
  }


  @media (max-width: 768px) {

    #main-image {
      width: 100%;
      max-width: 300px;
      height: 300px;

    }
  }

  
  .left-column {
    width: 50%;
    padding: 20px;
    padding-top: 60px;
    position: -webkit-sticky;
    /* Para compatibilidad con Safari */
    position: sticky;
    top: 0;
    /* Ajusta esto a la altura de cualquier cabecera o menú que tengas */
    height: 100%;
    /* O la altura que quieras que tenga */
  }

  .right-column {
    width: 50%;
    padding: 20px;
    padding-top: 60px;
  }

  .product-image {
    max-width: 100%;
  }

  .product-price {
    font-size: 28px;
    color: #333;
  }

  .product-title {
    font-size: clamp(18px, 4vw, 25px);
    text-align: center;           /* Centra el texto */
    max-width: 600px;             /* Limita el ancho máximo */
    margin: 0 auto;               /* Centra el contenedor horizontalmente */
  }


  .color-options {
    list-style: none;
    padding: 0;
  }

  .color-option {
    display: inline-block;
    width: 24px;
    height: 24px;
    margin-right: 10px;
  }

  .color-option input[type="radio"] {
    display: none;
  }

  .color-option label {
    display: block;
    width: 100%;
    height: 100%;
    border: 1px solid #ccc;
    cursor: pointer;
  }

  .color-option input[type="radio"]:checked+label {
    border: 2px solid blue;
  }

  .iframe-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%;
    /* Aspect ratio 16:9 */
    height: 0;
  }

  .iframe-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .button {
    background-color: red;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
  }

  @keyframes jump {
    0% {
      transform: translateY(0);
      /* Sin desplazamiento vertical */
    }

    50% {
      transform: translateY(-5px);
      /* Desplazamiento hacia arriba */
    }

    100% {
      transform: translateY(0);
      /* Volver a la posición original */
    }
  }

  /* Aplicar la animación al botón */
  .jump-button {
    animation: jump 3s ease infinite;
    /* Animación llamada 'jump' que dura 3 segundos y se repite infinitamente */
  }

  .content_left_right {
    display: flex;
  }


  /* Añade más estilos según sea necesario */

  /* Para dispositivos con un ancho de 768px o menos */
  .precios_producto {
    display: flex;
  }

  @media (max-width: 768px) {
    .content_left_right {
      display: flex;
      flex-direction: column;
      max-width: 100%;
      margin: 0 auto;
    }

    .left-column,
    .right-column {
      width: 100% !important;
      padding: 10px !important;
    }


    #navbarLogo {
      height: 60px;
      width: 60px;
    }


    .navbar-brand_1 {
      top: 0;
      padding-left: 20px;
    }

    .left-column {
      position: static !important;
    }

    .list-group {
      flex-direction: row !important;
      padding-top: 10px;
    }

  }

  @media (max-width: 480px) {
    .navbar-brand img {
      height: 50px;
      width: 50px;
    }

    /* Ajustes adicionales para dispositivos más pequeños */
  }

  /* checkout */
  .left-column {
    width: 50%;
    padding: 20px;
    padding-top: 60px;
    position: -webkit-sticky;
    /* Para compatibilidad con Safari */
    position: sticky;
    top: 0;
    /* Ajusta esto a la altura de cualquier cabecera o menú que tengas */
    height: 100%;
    /* O la altura que quieras que tenga */
  }

  .right-column {
    width: 50%;
    padding: 20px;
    padding-top: 60px;
  }

  /* Seccion Hidden */
  .list-group-item {
    display: flex;
    flex-direction: column;
    /* Asegura que el contenido fluya de arriba hacia abajo */
  }

  .edit-section {
    width: 100%;
    /* Ocupa todo el ancho disponible */
    /* Otros estilos que desees aplicar */
  }

  .hidden {
    display: none;
    /* Oculta la sección */
  }

  /* Este estilo se aplica cuando se muestra la sección */
  .edit-section:not(.hidden) {
    display: block;
    /* O 'flex' si necesitas más control sobre el contenido interior */
  }

  .caja_transparente {
    border-radius: 0.5rem;
    border: 1px solid #ccc;
    padding: 10px;
  }

  .caja_variable {
    padding-top: 10px;
    padding-right: 10px !important;
    padding-left: 10px !important;
    border-radius: 0.5rem;
    background-color: #dedbdb;
  }

  .caja_oferta {
    padding: 10px;
    border-radius: 0.5rem;
    background-color: rgba(0, 164, 251, 0.5);
    /* 50% de opacidad */
  }

  .discount-code-container {
    max-width: 300px;
    /* O el ancho que prefieras */
    padding-top: 10px;
  }

  .applied-discount {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
    padding: 5px 10px;
    background: #f2f2f2;
    /* Fondo gris claro para destacar */
    border-radius: 5px;
  }

  .discount-tag {
    font-weight: bold;
  }

  .close {
    font-size: 20px;
    color: #000;
    opacity: 0.6;
  }

  .close:hover {
    opacity: 1;
  }

  .sub_titulos {
    font-size: 17px;
    font-weight: 700;
  }

  hr {
    border: none;
    /* Quita el borde predeterminado */
    height: 2px;
    /* Ajusta el grosor de la línea */
    background-color: #000;
    /* Ajusta el color de la línea */
    margin: 15px 0;
    /* Ajusta el espaciado vertical de la línea */
  }

  .input-group-text {
    background: transparent;
    padding-right: 10px;
    /* Ajusta el espacio a la derecha del ícono si es necesario */
    border: 1px solid #ced4da;
    /* Ajusta al color de borde deseado */
    border-right: none;
    /* Remueve el borde derecho del span */
    border-radius: 0.25rem 0 0 0.25rem;
    /* Ajusta el radio del borde */
    height: 100%;
  }

  .form-group .input-group .form-control {
    border: 2px solid #000000;
    /* Ajusta al color de borde deseado */
    
    border-radius: 0 0.25rem 0.25rem 0;
    /* Ajusta el radio del borde */
    padding-left: 10px;
    /* Ajusta el espacio a la izquierda del texto */
  }

  .icon-btn.active i {
    color: white;
    /* O puedes usar #FFFFFF */
  }

  .form-group {
    margin: 0 !important;
  }

  .btn_comprar {
    border-radius: 0.5rem;
    padding: 10px;
  }

  /* CSS para tachar codigo de descuentro*/
  #codigosDescuento_temporal .d-flex {
    text-decoration: line-through;
    color: red;
    /* Cambia el color del texto a rojo */
  }

  #codigosDescuento_temporal button {
    pointer-events: none;
    /* Desactiva los eventos del ratón, haciendo los botones no clickeables */
    opacity: 0.5;
    /* Cambia la opacidad para mostrar que están desactivados */
  }


  
  /* fin checkout */
  #landing {
  width: 100%;
  margin: 0 auto; /* Centrado por defecto */
}

@media (min-width: 992px) {
  #landing {
    width: 100%;
    margin-left: auto;
    margin-right: 0;  /* Alineado a la derecha */
    margin-top: 2rem !important; /* Ajuste hacia arriba en pantallas grandes */
  }
}
  #landing img {
    width: 100%;
    /* La imagen ocupará el 100% del ancho del contenedor */
    max-width: 100%;
    /* No excederá el ancho del contenedor */
    height: auto;
    /* Mantiene la relación de aspecto original */
    display: block;
    /* Elimina el espacio blanco adicional */
    margin: 0 auto;
    /* Centra la imagen si es más pequeña que el contenedor */
    object-fit: cover;
    /* Ajusta la imagen para cubrir el contenedor, manteniendo el aspecto */
    border-radius: 8px;
    /* Opcional: bordes redondeados para mejorar la estética */
  }

  .slider_producto {
    display: flex;
    flex-direction: row;
    justify-content: right;
  }

  @media (max-width: 768px) {
    .slider_producto {
      flex-direction: column-reverse;
      align-items: center;
    }
  }
</style>