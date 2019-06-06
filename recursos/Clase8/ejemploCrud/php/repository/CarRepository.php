<?php
require_once('./Normalizer/CarNormalizer.php'); 
require_once('./Normalizer/UserNormalizer.php'); 

Class CarRepository
{
    protected $dbConnection;
    public function __construct( $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }


    public function getAll()
    {
        $sql = "SELECT * FROM cars";
        $result = $this->dbConnection->query($sql);
        $carArray = [];
        foreach ($result as $row) {
            $carArray[] = CarNormalizer::createFromRow($row);
        }

        return $carArray;      
    }

    public function getById($id)
    {
        $car = NULL;
        $sql = "SELECT * FROM cars WHERE id = {$id}";
        $result = $this->dbConnection->query($sql);

        $row = $result->fetch_array();
        if ($row) {
            $car = CarNormalizer::createFromRow($row);
        }

        return $car;      
    }

    public function getByMarca($marca)
    {
        $car = NULL;
        $sql = "SELECT * FROM cars WHERE marca = '{$marca}'";
        $result = $this->dbConnection->query($sql);
        $row = $result->fetch_array();
        if ($row) {
            $car = CarNormalizer::createFromRow($row);
        }
      

        return $car;      
    }

    public function delete($car)
    {
        $sql = "DELETE FROM cars WHERE id = {$car->getId()}";
        $result = $this->dbConnection->query($sql);
        return $result;      
    }

    public function insert($car)
    {
        $sql = "INSERT INTO `clase8`.`cars` 
                    (`marca`, `color`, `kilometros`) 
                VALUES (
                     '{$car->getMarca()}',
                     '{$car->getColor()}',
                     '{$car->getKilometros()}'   
                )";
        $result = $this->dbConnection->query($sql);

        return $result;      
    }

    public function update($car)
    {
        $sql = "UPDATE `clase8`.`cars` 
                SET 
                    marca = '{$car->getMarca()}',
                    color = '{$car->getColor()}',
                    kilometros = '{$car->getKilometros()}'   
                WHERE id = {$car->getId()}
                ";
       
        $result = $this->dbConnection->query($sql);
        return $result;      
    }

    public function getAllByUserId($userId)
    {
        $sql = "SELECT * FROM cars WHERE id = {$id}";
        $result = $this->dbConnection->query($sql);
        $carArray = [];
        foreach ($result as $row) {
            $userArray[] = CarNormalizer::createFromRow($row);
        }

        return $carArray;      
    }

}


