<?php

class Producto3 extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->views->render($this, "Producto3/index"); // Cambiar según tu estructura de carpetas
    }


    public function listar()
    {
        

        $data = $this->model->listar(ID_PLATAFORMA);
        echo json_encode($data);
    }
}
