<?php
    require_once('./model/Car.php');    
    require_once('./repository/CarRepository.php');
    require_once('./repository/UserRepository.php');
    require_once('./services/bdConectionManager.php');
    require_once('./services/requestManager.php');


    
    $carId = $_GET['car'];
    $car = $carRepository->getById($carId);
    $isAPost = isCreatePostCar();



    $carMarca = $_POST['marca'];
    $carColor = $_POST['color'];
    $carKilometros = $_POST['kilometros'];

?>


<?php echo "<h1>UPDATE Car con ID $carId </h1>";  ?>

<?php
    if ($car) {
        echo '
            <form action="update-car.php?car=' . $car->getId() .'" method="post">
                <p>Car Id: <input type="text" name="id" value="' . $car->getId() . '"/></p>
                <p>Car marca: <input type="text" name="marca" value="' . $car->getMarca() . '" /></p>
                <p>Car color: <input type="text"  name="color" value="' . $car->getColor() . '"/></p>
                <p>Car kilometros: <input type="text" name="kilometros" value="' . $car->getkilometros() . '"/></p>
                <p><input type="submit" /></p>
            </form>
        ';
    } else {
        echo "car not found with id: {$carId}</p>";
    }

    if ($car && $isAPost) {
        
        $carToUpdate = CarNormalizer::createFromVariables($carId, $carMarca, $carColor, $carKilometros);
        $updated = $carRepository->update($carToUpdate);
        if ($updated) {
            $car = $carRepository->getByMarca($carMarca);
            echo "<p>Coche modicado:</p>" . "<ul>
            <li>$carId</li>
            <li>$carMarca</li>
            <li>$carColor</li>
            <li>$carKilometros</li>
            </ul>";

        } else {
            echo "<p>coche no pudo ser modificado</p>";
            echo "<p>{$conn->err}</p>";
        }
    }

?>
<a href='./index.php'>back to main </a>

