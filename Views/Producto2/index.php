<?php include 'Views/templates/header2.php'; ?>
<?php include 'Views/Producto2/css/producto_style.php'; ?>


<?php
$id_producto = $_GET['id'];
?>

<main style="background-color: #f9f9f9;">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <!-- Main Image -->
        <div class="main-image-container mb-3">
          <img id="mainProductImage" src="" class="img-fluid main-product-image" alt="Main Product Image" onclick="abrir_modalImagen(this.src)">
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
          <input type="number" id="cantidad_producto" class="form-control" style="border-radius:0.3rem !important;width: 20%;" id="quantity" value="1" min="1">
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
    $("#imagenEnModal").attr("src", url).show();

    $("#imagenModal").modal("show");
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

          // Configurar la imagen principal
          var mainImageSrc = obtenerURLImagen(producto.imagen_principal_tienda, SERVERURL);
          $('#mainProductImage').attr('src', mainImageSrc);

          // Miniaturas - comenzamos con la imagen principal como primera miniatura
          var thumbnailsHtml = `
                <img src="${mainImageSrc}" class="img-thumbnail thumb-image mx-2" onclick="changeImage('${mainImageSrc}')" alt="Main Thumbnail">
            `;

          // Thumbnails iniciales del producto
          if (producto.imagenes && producto.imagenes.length > 0) {
            producto.imagenes.forEach(function(imagen, index) {
              var imagePath = obtenerURLImagen(imagen.url, SERVERURL);
              thumbnailsHtml += `
                        <img src="${imagePath}" class="img-thumbnail thumb-image mx-2" onclick="changeImage('${imagePath}')" alt="Thumbnail ${index + 1}">
                    `;
            });
          }

          // Agregamos las miniaturas iniciales al contenedor
          $('#thumbnailsContainer').html(thumbnailsHtml);

          // Función para cambiar la imagen principal al hacer clic en una miniatura
          window.changeImage = function(imageSrc) {
            $('#mainProductImage').attr('src', imageSrc);
          };

          // Solicitud adicional para cargar imágenes adicionales
          $.ajax({
            url: SERVERURL + 'Tienda/listar_imagenAdicional_productosTienda',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(imagenesAdicionales) {
              if (imagenesAdicionales && imagenesAdicionales.length > 0) {
                imagenesAdicionales.forEach(function(imagen, index) {
                  var imagePath = obtenerURLImagen(imagen.url, SERVERURL);
                  thumbnailsHtml += `
                                <img src="${imagePath}" class="img-thumbnail thumb-image mx-2" onclick="changeImage('${imagePath}')" alt="Additional Thumbnail ${index + 1}">
                            `;
                });

                // Añadimos las miniaturas adicionales al contenedor
                $('#thumbnailsContainer').html(thumbnailsHtml);

                // Reasignamos los eventos de click para todas las miniaturas, incluyendo las adicionales
                $('#thumbnailsContainer img').on('click', function() {
                  var targetImage = $(this).attr('src');
                  $('#mainProductImage').attr('src', targetImage);
                });
              }
            },
            error: function(xhr, status, error) {
              console.error('Error al obtener las imágenes adicionales:', error);
              console.log(xhr.responseText);
            }
          });

          // Eventos para la compra
          $('#comprar-ahora').on('click', function() {
            agregar_tmp(producto.id_producto, parseFloat(producto.pvp_tienda), producto.id_inventario);
          });

          // Eventos para la compra
          $('#agregar-al-carrito').on('click', function() {
            agregar_carrito(producto.id_producto, parseFloat(producto.pvp_tienda), producto.id_inventario);
          });

          cargarLanding(producto.id_producto);
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

  async function agregar_tmp(id_producto, precio, id_inventario) {
    try {
      // Esperar a que se complete limpiar_carrito()
      await limpiar_carrito();

      // Esperar a que se complete agregar_carrito()
      await agregar_carrito(id_producto, precio, id_inventario);

      session_id = "<?php echo session_id(); ?>";
      let formData = new FormData();
      formData.append("session_id", session_id);

      // Cargar los productos del carrito vía AJAX
      $.ajax({
        url: SERVERURL + 'Tienda/buscar_carrito',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(data) {
          let cartHTML = '';
          let comboHTML = '';
          let subtotal = 0;

          data.forEach(function(product) {
            if (data.length === 1) {
              let formData_combo = new FormData();
              formData_combo.append("id_producto", product.id_producto);
              $.ajax({
                url: SERVERURL + "Tienda/obtener_combo_id",
                type: "POST",
                data: formData_combo,
                processData: false, // No procesar los datos
                contentType: false, // No establecer ningún tipo de contenido
                dataType: "json",
                success: function(response) {
                  let ahorro = "";

                  response.forEach(function(combo) {
                    /* detalle combo */
                    let formData_detalle = new FormData();
                    formData_detalle.append("id_combo", combo.id);

                    // Inicializar el acumulador
                    let totalPvp = 0;
                    let precio_total = 0;
                    let valor_combo = combo.valor;

                    $.ajax({
                      url: SERVERURL + "Tienda/obtener_detalle_combo_id",
                      type: "POST",
                      data: formData_detalle,
                      processData: false, // No procesar los datos
                      contentType: false, // No establecer ningún tipo de contenido
                      dataType: "json",
                      success: function(response) {

                        // Iterar sobre cada elemento en la respuesta
                        response.forEach(function(detalle_combo) {
                          // Sumar el pvp de cada elemento al acumulador
                          totalPvp += parseFloat(detalle_combo.pvp); // Asegúrate de convertir a número
                        });

                        if (estado_combo == 1) {
                          precio_total = totalPvp * (1 - valor_combo / 100);
                        } else if (estado_combo == 2) {
                          precio_total = totalPvp - valor_combo;
                        }
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                      },
                    });
                    /* Fin detalle combo */

                    if (combo.estado_combo == 1) {
                      ahorro = `<span class="custom-discount" id="ahorro_preview" style="display: none;">Ahorra ${valor_combo}%</span>`;
                    }
                    comboHTML += `
                        <div class="custom-product">
                            <img src="${SERVERURL}${combo.image_path}" alt="Producto" id="imagen_combo_preview" class="custom-product-image">
                            <div class="custom-product-info">
                              <span id="nombre_combo_preview">${combo.nombre}</span>
                              ${ahorro}
                            </div>
                            <div class="custom-product-price">
                              <span class="old-price" id="precio_normal_preview">$${totalPvp}</span>
                              <span class="new-price" id="precio_especial_preview">$${precio_total}</span>
                            </div>
                        </div>`;

                    $('#combos_carritoContainer').html(comboHTML);

                  });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  alert(errorThrown);
                },
              });

            }

            const productPrice = parseFloat(product.precio_tmp) * parseInt(product.cantidad_tmp);
            subtotal += productPrice;

            let enlace_imagen = obtenerURLImagen(product.image_path, "https://new.imporsuitpro.com/");

            cartHTML += `
                        <div class="productos_carrito-item">
                        <img src="${enlace_imagen}" alt="${product.nombre_producto}" />
                        <div class="productos_carrito-info">
                            <a href="#">${product.nombre_producto}</a>
                            <p>${product.cantidad_tmp} x $${parseFloat(product.precio_tmp).toFixed(2)}</p>
                        </div>
                        <div class="productos_carrito-precio">
                            <span>$${productPrice.toFixed(2)}</span>
                        </div>
                        <button class="btn btn-danger btn-sm productos_checkout_remove" data-product-id="${product.id_tmp}">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>`;
          });

          $('#productos_carritoContainer').html(cartHTML);
          $('#productos_carritoSubtotal').text(`$${subtotal.toFixed(2)}`);
          $('#productos_carritoTotal').text(`$${subtotal.toFixed(2)}`);

          $("#id_productoTmp_carrito").val(data[0].id_producto);
          $("#total_carrito").val(subtotal.toFixed(2));
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        }
      });

      // Mostrar el modal del carrito
      $("#checkout_carritoModal").modal("show");
    } catch (error) {
      console.error("Error:", error);

    }
  }



  function agregar_carrito(id_producto, precio, id_inventario) {
    return new Promise((resolve, reject) => {
      session_id = "<?php echo session_id(); ?>";
      let formData = new FormData();
      formData.append("id_producto", id_producto);
      formData.append("precio", precio);
      formData.append("id_inventario", id_inventario);
      formData.append("session_id", session_id);
      formData.append("cantidad", $('#cantidad_producto').val());
      formData.append("id_plataforma", ID_PLATAFORMA);

      $.ajax({
        url: SERVERURL + "Tienda/agregar_carrito",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(response) {
          if (response.status == 500) {
            toastr.error(
              "NO SE AGREGÓ CORRECTAMENTE",
              "NOTIFICACIÓN", {
                positionClass: "toast-bottom-center"
              }
            );
            reject("Error al agregar al carrito"); // Rechaza en caso de error lógico
          } else if (response.status == 200) {
            toastr.success("PRODUCTO AGREGADO CORRECTAMENTE", "NOTIFICACIÓN", {
              positionClass: "toast-bottom-center",
            });
            resolve(response); // Resuelve la promesa cuando se agrega correctamente
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Rechaza la promesa en caso de error de red o servidor
          reject(errorThrown);
        },
      });
    });
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