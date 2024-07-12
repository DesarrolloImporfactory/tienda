<?php
class Utils extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actualizar()
    {
        $this->model->actualizar();
    }
}
