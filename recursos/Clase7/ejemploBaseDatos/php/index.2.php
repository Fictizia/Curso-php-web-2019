<?php
    require_once('./User.php');

    $servername = "127.0.0.1";
    $serverport = "3306";
    $dbname = "clase7";
    $username = "devuser";
    $password = "devpass";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, $serverport);

    
?>
<html>
    <head>
    </head>
    <body>
        <h1>Listar todos los usuarios</h1>
        <?php
            $sql = "SELECT * FROM users WHERE email LIKE '%fakemail%'";
            $result = $conn->query($sql);
            foreach ($result as $k => $row) 
            {
                //para llaamr a una funcion de una clase, hay que usar la llamada a funciones de objetos, que es poner antes de la llaamda a la funcion el nombre de la clase con "::"
                $user = User::createUserFromRow($row);
                echo "<li>name: {$user->getName()} email: {$user->getEmail()}</li>";
            }
        ?>
    </body>
</html>
