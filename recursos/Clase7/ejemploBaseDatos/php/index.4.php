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

    
?>
<html>
    <head>
    </head>
    <body>
    <?php

        echo "<h1>Lista de Mascotas y Dueños</h1>";
        
            //Almacenamos la consulta que queremos hacer
            $sql = "SELECT * FROM mascotas";

            //Almacenamos lo que recibimos de la base de datos en un array
            $result = $conn->query($sql);

            //Recorremos el array
            foreach ($result as $k => $row) 
            {
                /*Almacenamos en $mascota el objeto que creamos al llamar a la funcion de la clase; 
                para ello, como dicha funcion va a llamar, a su vez, a otra funcion de la clase User, 
                la cual va a hacer una consulta a la base de datos para buscar el registro de la tabla User
                que coincida con el la clave foranea iduser de la tabla mascotas, 
                hay que pasarle los datos de coenxion, ademas del array con los datos*/

                //LOS SIGUIENTES PASOS EN REALIDAD SE REALIZAN EN EL FICHERO DE LA CLASE MASCOTA
                $mascota = Mascota::createMascotaUserFromRow($conn, $row);

                //TRAS LOS PASOS REALIZADOS EN EL FICHERO DE LA CLASE MASCOTA SEGUIMOS AQUÍ 

                /*Evaluamos si $mascota->getUser() contiene algo; si lo contiene, almacenamos en $nombreUsuario
                el valor de $mascota->getUser()->getName() y si no contiene nada, entonces almacenamos en $nombreUsuario 'no es de nadie' */
                
                //nombreUsuario =    tiene algo               entonces mete             sino mete
                $nombreUsuario = $mascota->getUser() ? $mascota->getUser()->getName(): ' no es de nadie';

                //Mostramos los resultados
                echo "<li>Nombre: {$mascota->getName()} Dueño: {$nombreUsuario}</li>";
            }

        ?>

    </body>
</html>
