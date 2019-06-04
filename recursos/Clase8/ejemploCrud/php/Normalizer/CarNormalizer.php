<?php
   require_once('./model/Car.php'); 
 

   class CarNormalizer
   {

        public static function createFromRow($row) 
        {
            $newCar = new Car();
            $newCar->setId($row['id']);
            $newCar->setMarca($row['marca']);
            $newCar->setColor($row['color']);
            $newCar->setKilometros($row['kilometros']);
            return $newCar;
        }
        
        public static function createFromVariables($id, $marca, $color, $kilometros) 
        {
            $newCar = new Car();
            $newCar->setId($id);
            $newCar->setMarca($marca);
            $newCar->setColor($color);
            $newCar->setKilometros($kilometros);
            return $newCar;
        }


   }