<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 02/02/2019
 * Time: 17:05
 */

class ProductsController
{
    private $model;

    public function __construct()
    {
        $this->model = new Products();
    }

    public function ProductsList()
    {
        $Products = $this->model->getAll();
        include "view/ProductsList.php";
    }

    public function ProductsDelete()
    {
        var_dump('hello');

        $this->model->delete($_GET['id']);
    }

    public function ProductsCreate()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $this->model->create($_GET['name'], $_GET['price']);
            $this->ProductsList();
        } else {
            include('view/ProductsCreate.php');
        }
    }
}