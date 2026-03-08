<?php
namespace App;

class Controller
{

    
    protected function render($view, $data = [])
    {
        extract($data);
        $model = array_keys($data)[0]; // modeli tüüp ja $view on siis vaade(index.php jne)
        include "Views/$model/$view.php";
    }
}