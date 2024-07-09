<?php

class Pedido extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->model->render($this, 'index');
    }

    public function store()
    {
        $url = "https://" . $_SERVER['HTTP_HOST'];
    }
}
