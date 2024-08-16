<?php include 'Views/templates/header2.php'; ?>
<?php include 'Views/Producto2/css/producto_style.php'; ?>
<?php require_once './Views/Producto/Modales/checkout.php'; ?>

<?php
$id_producto = $_GET['id'];
?>

<main style="background-color: #f9f9f9;">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <!-- Main Image -->
        <div class="main-image-container mb-3">
          <img id="mainProductImage" src="" class="img-fluid main-product-image" alt="Main Product Image" onclick="abrir_modalImagen(this.value)">
        </div>
        <!-- Thumbnails -->
        <div class="thumbnail-container d-flex justify-content-center" id="thumbnailsContainer">
          <!-- Thumbnails dinámicos aquí -->
        </div>
      </div>
      <div class="col-md-6">
        <h2 id="nombre-producto">Nombre del producto</h2>
        <p class="text-muted" id="sku-producto">SKU: 004</p>
        <div class="d-flex flex-row gap-3">
          <h3 id="precio-especial">$999.00</h3>
          <div id="precio-normal-container">
            <span class="mas_vendidos-old-price" style="font-size: 20px; padding-right: 10px;">
              <strong id="precio-normal"></strong>
            </span>
          </div>
          <div id="ahorra-container" class="p-2" style="background-color: #4464ec; color:white !important; border-radius: 0.3rem; width: 20%;">
            <span class="ahorra"><i class="bx bxs-purchase-tag" style="color: white;"></i>
              <strong id="ahorra"></strong>
            </span>
          </div>
        </div>
        <div class="mb-3">
          <label for="quantity" class="form-label">Cantidad</label>
          <input type="number" class="form-control" style="border-radius:0.3rem !important;width: 20%;" id="quantity" value="1" min="1">
        </div>
        <button class="btn btnAgregar_carrito btn-lg mb-3" id="agregar-al-carrito">Agregar al carrito</button>
        <button class="btn btn-dark btn-lg mb-3" id="comprar-ahora">Realizar compra</button>
        <div id="landing" style="padding: 20px;">

        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="imagenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imagenModalLabel">Visualización de Imagen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="" id="imagenEnModal" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  function abrir_modalImagen(url) {
    $("#imagenEnModal").attr("src", "new.imporsuitpro.com"+url).show();

    $("#imagen_categoriaModal").modal("show");
  }

  function cargarLanding(id) {
    let formData = new FormData();
    formData.append("id_producto_tienda", id);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "https://imagenes.imporsuitpro.com/obtenerLandingTienda", true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        try {
          var response = JSON.parse(xhr.responseText);
          console.log("Respuesta de la API:", response);

          // Decodificar entidades HTML
          var decodedHTML = decodeEntities(response.data);
          console.log("HTML decodificado:", decodedHTML);

          // Crear un documento temporal para manipular el HTML decodificado
          var parser = new DOMParser();
          var doc = parser.parseFromString(decodedHTML, 'text/html');

          // Comprobar si el body está presente en la respuesta
          var body = doc.body;
          if (body) {
            var bodyContent = body.innerHTML;
            console.log("Contenido del body:", bodyContent);

            // Insertar el contenido del body en el div con id="landing"
            document.getElementById("landing").innerHTML = bodyContent;
          } else {
            console.error("No se encontró la etiqueta <body> en la respuesta.");
          }
        } catch (e) {
          console.error("Error al decodificar JSON:", e);
        }
      } else {
        console.error("Error en la solicitud AJAX.");
      }
    };
    xhr.send(formData);
  }

  function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
  }

  function changeImage(imageURL) {
    // Cambia la imagen principal al hacer clic en una miniatura
    const mainImage = document.getElementById('mainProductImage');
    const thumbnails = document.querySelectorAll('.thumb-image');

    mainImage.src = imageURL;

    thumbnails.forEach((thumb) => {
      thumb.classList.remove('active-thumb');
    });

    document.querySelector(`img[src='${imageURL}']`).classList.add('active-thumb');
  }

  $(document).ready(function() {
    var id_producto = '<?php echo $_GET['id']; ?>';
    let formData = new FormData();
    formData.append("id_plataforma", ID_PLATAFORMA);
    formData.append("id_producto_tienda", id_producto);

    $.ajax({
      url: SERVERURL + 'Tienda/obtener_productos_tienda',
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(response) {
        if (response.length > 0) {
          var producto = response[0]; // Asumimos que el primer producto es el deseado

          $('#nombre-producto').text(producto.nombre_producto_tienda);
          $('#sku-producto').text('SKU: ' + producto.sku); // Suponiendo que el SKU esté disponible
          $('#precio-especial').text('$' + parseFloat(producto.pvp_tienda).toFixed(2));
          if (producto.pref_tienda > 0) {
            $('#precio-normal').text('$' + parseFloat(producto.pref_tienda).toFixed(2));
            var ahorro = 100 - (parseFloat(producto.pvp_tienda) * 100 / parseFloat(producto.pref_tienda));
            $('#ahorra').text('%' + parseFloat(ahorro).toFixed(2));
          } else {
            $('#precio-normal-container').hide();
            $('#ahorra-container').hide();
          }

          var mainImageSrc = obtenerURLImagen(producto.imagen_principal_tienda, SERVERURL);
          $('#mainProductImage').attr('src', mainImageSrc);

          // Thumbnails
          var thumbnailsHtml = '';
          if (producto.imagenes && producto.imagenes.length > 0) {
            producto.imagenes.forEach(function(imagen, index) {
              var imagePath = obtenerURLImagen(imagen.url, SERVERURL);
              thumbnailsHtml += `
                                <img src="${imagePath}" class="img-thumbnail thumb-image mx-2" onclick="changeImage('${imagePath}')" alt="Thumbnail ${index + 1}">
                            `;
            });
            $('#thumbnailsContainer').html(thumbnailsHtml);
          }

          // Eventos para la compra
          $('#comprar-ahora').on('click', function() {
            agregar_tmp(id_producto, parseFloat(producto.pvp_tienda), producto.id_inventario);
          });

          cargarLanding(id_producto);
        } else {
          console.error('No se encontraron productos.');
        }
      },
      error: function(xhr, status, error) {
        console.error('Error al obtener los datos:', error);
        console.log(xhr.responseText);
      }
    });

    // Manejo del navbar y logo al hacer scroll (si es necesario)
  });

  function agregar_tmp(id_producto, precio, id_inventario) {
    $("#id_productoTmp").val(id_producto);
    $("#precio_productoTmp").val(precio);
    $("#id_inventario").val(id_inventario);
    $("#checkoutModal").modal("show");
  }

  function obtenerURLImagen(imagePath, serverURL) {
    if (imagePath) {
      if (imagePath.startsWith("http://") || imagePath.startsWith("https://")) {
        return imagePath;
      } else {
        return `${serverURL}${imagePath}`;
      }
    } else {
      console.error("imagePath es null o undefined");
      return 'ruta/a/tu/imagen/por/defecto.jpg';
    }
  }
</script>

<?php include 'Views/templates/footer2.php'; ?>