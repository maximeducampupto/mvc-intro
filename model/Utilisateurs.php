<?php
/**
 * Created by PhpStorm.
 * User: sstienface
 * Date: 31/01/2019
 * Time: 15:28
 */

require('classes/Database.php');

class Utilisateurs {

    private $userLists, $db;

    public function __construct()
    {
        $this->db = Database::conn();

        $this->userLists = $this->db->query("select * from users")->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->userLists;
    }

    // Vous pouvez spécifier des valeurs par défaut aux parametres de méthodes, si $index n'est pas défini, il vaudra 0.
    public function getOne($index = 0)
    {
        return $this->userLists[$index];
    }

    public function create()
    {
        $query = "insert into users (name) values (:name)";
        $statement = $this->db->prepare($query);

        $statement->execute(['name' => $this->randomName()]);
    }

    /**
     * @param $index
     */
    public function delete($id)
    {
        $statement = $this->db->prepare("delete from users where id=:id");
        $statement->execute(['id' => $id]);
    }

    /**
     * @param $index
     * @return bool
     */
    private function checkLength($index)
    {
        if($index < count($this->userLists) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    private function randomName()
    {
        $names = ['Margot', 'Chloé', 'Sasha', 'Ash', 'Laurie', 'Anne-Lise', 'Manu', 'Sophie', 'Jean', 'Dominique', 'Thibault', 'David'];
        return $names[rand(0, (count($names) - 1 ))];
    }



} 