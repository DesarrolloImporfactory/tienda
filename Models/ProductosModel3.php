<?php
class ProductosModel3 {
    private $db;

    public function __construct() {
        // Aquí deberías inicializar la conexión con tu base de datos, por ejemplo con PDO o MySQLi
        $this->db = new mysqli(SERVER_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if ($this->db->connect_error) {
            die('Error de conexión: ' . $this->db->connect_error);
        }
    }

    // Función para obtener los productos de la base de datos
    public function obtenerProductos() {
        $sql = "SELECT * FROM productos";
        $result = $this->db->query($sql);

        $productos = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }

        return $productos;
    }
}
