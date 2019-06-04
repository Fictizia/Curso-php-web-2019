<?php
    require_once('./model/Car.php');    
    require_once('./repository/CarRepository.php');
    require_once('./repository/UserRepository.php');
    require_once('./services/bdConectionManager.php');
    
    $carId = $_GET['car'];
?>

<h1>Car To delete <?php echo $carId; ?></h1>
<?php

    $car = $carRepository->getById($carId);
    $deleted = $carRepository->delete($car);
    if ($deleted) {
        echo "<p> car properly deleted </p>";
    } else {
        echo "<p> error: not deleted </p>";
        echo "<p> $conn->error() </p>";
    }
?>
<a href='./index.php'>back to main </a>

