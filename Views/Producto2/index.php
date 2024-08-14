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
          <img id="mainProductImage" src="" class="img-fluid main-product-image" alt="Main Product Image" data-bs-toggle="modal" data-bs-target="#imagenModal">
        </div>
        <!-- Thumbnails -->
        <div class="thumbnail-container d-flex justify-content-center" id="thumbnailsContainer">
          <!-- Thumbnails dinámicos aquí -->
        </div>
      </div>
      <div class="col-md-6">
        <h2 id="nombre-producto">Nombre del producto</h2>
        <p class="text-muted" id="sku-producto">SKU: 004</p>
        <h3 id="precio-especial">$999.00</h3>
        <div id="precio-normal-container">
          <span class="tachado" style="font-size: 20px; padding-right: 10px;">
            <strong id="precio-normal"></strong>
          </span>
        </div>
        <div id="ahorra-container" class="px-2" style="background-color: #4464ec; color:white !important; border-radius: 0.3rem;">
          <span class="ahorra"><i class="bx bxs-purchase-tag" style="color: white;"></i>
            <strong id="ahorra"></strong>
          </span>
        </div>
        <div class="mb-3">
          <label for="quantity" class="form-label">Cantidad</label>
          <input type="number" class="form-control" id="quantity" value="1" min="1">
        </div>
        <button class="btn btn-primary btn-lg mb-3" id="agregar-al-carrito">Agregar al carrito</button>
        <button class="btn btn-dark btn-lg mb-3" id="comprar-ahora">Realizar compra</button>
        <div>
          <h5>Información del producto</h5>
          <p id="landing">Detalle del producto. Lugar ideal para agregar más información sobre tu producto como su tamaño, material, cuidados y estilo.</p>
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
  function cargarLanding(id) {
    // Mismo código que ya tenías para cargar el contenido en la sección de información del producto
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