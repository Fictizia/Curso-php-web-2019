<?php
    require_once('./model/Car.php');    
    require_once('./repository/CarRepository.php');
    require_once('./repository/UserRepository.php');
    require_once('./services/bdConectionManager.php');
    require_once('./services/requestManager.php');
    
    
    $carMarca = $_POST['marca'];
    $carColor = $_POST['color'];
    $carKilometros = $_POST['kilometros'];


    $isAPost = false;
    if ($carMarca && $carColor && $carKilometros) {
        $isAPost = true;
    }
    ?>

<h1>Create Car</h1>
<form action="create-car.php" method="post">
    <p>Marca: <input type="text" name="marca" /></p>
    <p>Color: <input type="text" name="color" /></p>
    <p>kilometros: <input type="text" name="kilometros" /></p>
    <p><input type="submit" /></p>
</form>

<?php

    if (isCreatePost()) {
        $car = $carRepository->getByEmail($carColor);
        if (!$car) {
            $newCar = CarNormalizer::createFromVariables(null, $carMarca, $carColor, $carKilometros);

            $created = $carRepository->insert($newCar);
            if ($created) {
                $car = $carRepository->getByEmail($carColor);
                echo "<p>coche creado:</p>";
                echo $car->getId();
                
            } else {
                echo "<p>coche no pudo ser creado</p>";
                echo "<p>{$conn->err}</p>";
            }
        } else {
            echo "<p>El color del coche: {$carColor} already exists</p>";
        }
    }
?>
<a href='./index.php'>back to main </a>