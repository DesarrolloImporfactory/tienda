<style>
    #main-image {
      /* Añade una sombra o borde si es necesario */
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      border-radius: 1rem;
      /* Ejemplo de sombra */
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
      border: 2px solid grey;
      /* Esto añadirá un borde gris alrededor de la miniatura seleccionada */
    }

    .list-group-item {
      background-color: white !important;
      /* Esto hará que el fondo sea transparente */
      border-color: white !important;
      /* Esto elimina el borde si lo hay */
    }

    #list-tab .list-group-item img.img-thumbnail {
      width: 150px;
      /* El ancho deseado para las miniaturas */
      height: 65px;
      /* Para mantener la proporción de aspecto */
    }

    /* Estilos para miniaturas */
    .list-group-item img.img-thumbnail {
      width: 100px;
      /* Ancho que desees para las miniaturas */
      height: 100px;
      /* Altura que desees para las miniaturas */
      object-fit: cover;
      /* cover recortará la imagen para ajustarla al tamaño */
    }

    /* Estilos para imagen principal */
    #main-image {
      width: 500px;
      /* Ancho que desees para la imagen principal */
      height: 500px;
      /* Altura que desees para la imagen principal */
      object-fit: cover;
      /* contain asegurará que la imagen se ajuste dentro de este espacio sin recortarse */
    }


    @media (max-width: 768px) {

      /* Estilos para imagen principal */
      #main-image {
        width: 300px;
        /* Ancho que desees para la imagen principal */
        height: 300px;
        /* Altura que desees para la imagen principal */
        object-fit: cover;
        /* contain asegurará que la imagen se ajuste dentro de este espacio sin recortarse */
      }
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
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
      font-size: 24px;
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

    .ahorra {
      font-size: 20px;
    }

    /* Añade más estilos según sea necesario */

    /* Para dispositivos con un ancho de 768px o menos */
    .precios_producto {
      display: flex;
      flex-direction: row;
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

      .precios_producto {
        flex-direction: column;
      }

      .ahorra {
        font-size: 15px;
      }

      .container {
        flex-direction: column;
      }

      #navbarLogo {
        height: 60px;
        width: 60px;
      }

      .container {
        align-items: flex-end !important;
      }

      .navbar-brand_1 {
        top: 0;
        padding-left: 20px;
      }

      .left-column {
        position: static !important;
        /* Para compatibilidad con Safari */
      }

      .list-group {
        flex-direction: row !important;
        padding-top: 10px;
      }

      /* Otros ajustes responsivos */
    }

    /* Para dispositivos con un ancho de 480px o menos */
    @media (max-width: 480px) {
      .navbar-brand img {
        height: 50px;
        width: 50px;
      }

      /* Ajustes adicionales para dispositivos más pequeños */
    }
  </style>

<main>
<!-- FOOTER -->
    <!-- Botón flotante para WhatsApp -->
    <?php
    function formatPhoneNumber($number)
    {
        // Eliminar caracteres no numéricos excepto el signo +
        $number = preg_replace('/[^\d+]/', '', $number);

        // Verificar si el número ya tiene el código de país +593
        if (!preg_match('/^\+593/', $number)) {
            // Si el número comienza con 0, quitarlo
            if (strpos($number, '0') === 0) {
                $number = substr($number, 1);
            }
            // Agregar el código de país +593 al inicio del número
            $number = '+593' . $number;
        }

        return $number;
    }

    // Usar la función formatPhoneNumber para imprimir el número formateado
    $telefono = get_row('perfil', 'telefono', 'id_perfil', 1);
    $telefonoFormateado = formatPhoneNumber($telefono);
    ?>

    <?php
    $ws_flotante = get_row('perfil', 'whatsapp_flotante', 'id_perfil', 1);
    if ($ws_flotante == 1) { ?>
        <a href="https://wa.me/<?php echo $telefonoFormateado ?>" class="whatsapp-float" target="_blank"><i class="bx bxl-whatsapp-square ws_flotante"></i></a>
    <?php } ?>

    <footer class="footer-contenedor">
        <?php
        $sql   = "SELECT * FROM  perfil  where id_perfil=1";
        $query = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $nombre_empresa       = $row['nombre_empresa'];
            $giro_empresa       = $row['giro_empresa'];
            $telefono       = $row['telefono'];
            $email       = $row['email'];
            $logo_url       = $row['logo_url'];
            $facebook       = $row['facebook'];
            $instagram       = $row['instagram'];
            $tiktok       = $row['tiktok'];

        ?>
            <div class="footer-contenido div-alineado-izquierda">
                <h4>Acerca de <?php echo $nombre_empresa ?></h4>
                <img id="navbarLogo" src="sysadmin/<?php echo str_replace("../..", "", $logo_url)
                                                    ?>">
                <span class="descripcion">
                    <?php echo $giro_empresa ?>
                </span>
            </div>
            <div class="footer-contenido">
                <h5>Legal</h5>
                <ul class="lista_legal">
                    <?php
                    $sql   = "SELECT * FROM  politicas_empresa";
                    $query = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $nombre_politica       = $row['nombre'];
                        $id_politica       = $row['id_politica'];
                    ?>
                        <li><a style="text-decoration: none; color:#5a5a5a" href="<?php echo $protocol ?>://<?php echo $domain ?>/politicas.php?id=<?php echo $id_politica ?>" target="_blank"><?php echo $nombre_politica; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="footer-contenido">
                <h5>Siguenos</h5>
                <div class="redes">
                    <?php if ($facebook  !== "") { ?>
                        <a class="icon-redes" href="<?php echo $facebook ?>">
                            <img src="https://img.icons8.com/color/48/000000/facebook.png" alt="facebook">
                        </a>
                    <?php } ?>
                    <?php if ($instagram  !== "") { ?>
                        <a class="icon-redes" href="<?php echo $instagram ?>">
                            <img src="https://img.icons8.com/color/48/000000/instagram-new.png" alt="instagram">
                        </a>
                    <?php } ?>
                    <?php if ($tiktok  !== "") { ?>
                        <a class="icon-redes" href="<?php echo $tiktok ?>">
                            <img src="https://img.icons8.com/color/48/000000/tiktok.png" alt="tiktok">
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="footer-contenido">
                <h5>
                    Información de contacto
                </h5>
                <span class="descripcion">
                    <span class="icons">
                        <i class='bx bxl-whatsapp ws'></i> <?php echo $telefono ?>
                    </span>
                    <span class="icons">
                        <i class='bx bx-mail-send send'></i><?php echo $email ?>
                    </span>
                </span>
            </div>
        <?php } ?>
    </footer>
    <div class="text-center p-4 derechos-autor">© 2024 IMPORSUIT S.A. | Todos los derechos reservados.
    </div>
    <!-- Fin footer -->
</main>

<?php include 'includes/footer.php'; ?>