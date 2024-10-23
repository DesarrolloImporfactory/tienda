<?php
class ProductosController3 {
    // Función que se encargará de cargar la vista de productos
    public function index() {
        // Incluir el modelo de productos para obtener la información
        require_once 'Models/ProductosModel3.php';
        
        // Instanciar el modelo
        $productosModel = new ProductosModel3();
        
        // Obtener todos los productos desde el modelo
        $productos = $productosModel->obtenerProductos();

        // Pasar los productos a la vista
        require_once 'Views/Productos3.php';
    }
}
