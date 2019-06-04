<?php
    require_once('./User.php');
    require_once('./Mascota.php');

    $servername = "mysql_db";
    $serverport = "3306";
    $dbname = "clase7";
    $username = "devuser";
    $password = "devpass";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, $serverport);

    

    function pintarLista($conn, $header, $discriminator) {
        echo "<h1>Listar de {$header}</h1>";
        $sql = "SELECT * FROM users WHERE sexo = '{$discriminator}'";
            $result = $conn->query($sql);
            foreach ($result as $k => $row) 
            {
                $user = User::createUserFromRow($row);
                echo "<li>name: {$user->getName()}</li>";
            }
        
    }

    function pintarListaMascota($conn, $header, $raza) {
        echo "<h1>Listar {$header}</h1>";
        $sql = "SELECT * FROM mascotas WHERE raza = '{$raza}'";
            $result = $conn->query($sql);
            foreach ($result as $k => $row) 
            {
                $mascota = Mascota::createMascotaFromRow($conn,$row);
                echo "<li>name: {$mascota->getName()}, dueño: {$mascota->getUser()}</li>";
            }
        
    }
?>
<html>
    <head>
    </head>
    <body>
        <?php
            pintarLista($conn, 'No Binarios', 'N');
            pintarLista($conn, 'Mujeres', 'F');
            pintarLista($conn, 'Hombres', 'M');
            pintarListaMascota($conn, 'Gato', 'gato');
            pintarListaMascota($conn, 'Perro', 'perro');
            pintarListaMascota($conn, 'Pájaro', 'pajaro');

        ?>
    </body>
</html>
