<?php
    require_once('./model/User.php');    
    require_once('./model/Car.php');    
    require_once('./repository/UserRepository.php');
    require_once('./repository/CarRepository.php');
    require_once('./services/bdConectionManager.php');

?>
<html>
    <head>
    </head>
    <body>
        <div>
            <h1>Panel de usuarios</h1>
            <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Sex</th>
                <th>OPS</th>
                <th>IDC</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
                $users = $userRepository->getAll();

                foreach ($users as $user) {
                    echo "<tr>";
                        echo "<td>{$user->getId()}</td>";
                        echo "<td>{$user->getName()}</td>";
                        echo "<td>{$user->getEmail()}</td>";
                        echo "<td>{$user->getSexo()}</td>";
                        echo "<td>
                            <a href='update-user.php?user={$user->getId()}'>Update</a>
                            <a href='delete-user.php?user={$user->getId()}'>Delete</a>
                        </td>";
                       $cars = $carRepository->getAllByUserId($user->getId());
                       echo "<td> " . count($cars) . " </td>";
                      
                   echo "</tr>";
                }
            ?>
            </tbody>
            </table>
            <a href='create-user.php'>create user</a>
        </div>


        <div>
        <h1>Panel de car</h1>
            <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Marca</th>
                <th>Color</th>
                <th>kilometros</th>
                <th>OPS</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
                $cars = $carRepository->getAll();

                foreach ($cars as $car) {
                    echo "<tr>";
                        echo "<td>{$car->getId()}</td>";
                        echo "<td>{$car->getMarca()}</td>";
                        echo "<td>{$car->getColor()}</td>";
                        echo "<td>{$car->getKilometros()}</td>";
                        echo "<td>
                            <a href='update-car.php?car={$car->getId()}'>Update</a>
                            <a href='delete-car.php?car={$car->getId()}'>Delete</a>
                        </td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
            </table>
            <a href='create-car.php'>create car</a>
        </div>
    </body>
</html>
