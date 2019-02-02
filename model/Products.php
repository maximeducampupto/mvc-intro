<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 02/02/2019
 * Time: 17:06
 */

require('classes/Database.php');

class Products
{
    private $productsList, $db;

    public function __construct()
    {
        $this->db = Database::conn();
        $this->productsList = $this->db->query("select * from products order by price asc")->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        return $this->productsList;
    }

    public function delete($id)
    {
        $statement = $this->db->prepare("delete from products where id=:id");
        $statement->execute(['id' => $id]);
    }

    public function create($name, $price)
    {
        $statement = $this->db->prepare("insert into products (name, price) values (:name, :price)");
        $statement->execute([
            'name' => $name,
            'price' => $price
        ]);
    }
}