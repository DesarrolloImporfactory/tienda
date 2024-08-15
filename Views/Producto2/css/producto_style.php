<style>
  .main-product-image {
    width: 100%;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .thumb-image {
    width: 60px;
    height: 60px;
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 5px;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .thumb-image:hover {
    transform: scale(1.1);
  }

  .thumbnail-container {
    margin-top: 10px;
  }

  .main-image-container {
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 300px;
    /* Adjust as necessary for your layout */
  }

  .thumbnail-container img.active-thumb {
    border: 2px solid #000;
  }

  .btnAgregar_carrito {
    border-radius: 0 20px 20px 0;
    border: 2px solid <?php echo COLOR_TEXTO_CABECERA; ?> !important;
    color: <?php echo COLOR_TEXTO_CABECERA; ?> !important;
    background-color: transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .btnAgregar_carrito:hover {
    background-color: <?php echo COLOR_TEXTO_CABECERA; ?> !important;
    color: <?php echo COLOR_HOVER_CABECERA; ?> !important;
  }
</style>