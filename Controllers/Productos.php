<?php

class Productos extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->views->render($this, "index");
    }

    public function productos()
    {
        $this->views->render($this, "productos");
    }

    public function categorias()
    {
        $this->views->render($this, "categorias");
    }

    public function listar()
    {

        $data = $this->model->listar(ID_PLATAFORMA);
        echo json_encode($data);
    }
}
