<?php

use FontLib\EOT\Header;

session_start();

class Home extends Controller
{
    private $homeModel;

    public function __construct()
    {
        parent::__construct();
    }

    ///Vistas
    public function index()
    {
        $id_plataforma = ID_PLATAFORMA;
        $home = $this->model->plantilla($id_plataforma);

        echo $home;

        // Condicional dependiendo del resultado
        if ($home == 1) {
            // Renderizar la vista normalmente si hay productos
            $this->views->render($this, "index");
        } else if ($home == 2) {
            // Renderizar la vista normalmente si hay productos
            $this->views->render($this, "index2");
        }
    }
}
