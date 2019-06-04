<?php

    /**Declaramos las variables para la conexion y almacenamos los datos*/
    $servername = "mysql_db_C8";
    $serverport = "3306";
    $dbname = "clase8";
    $username = "devuser";
    $password = "devpass";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, $serverport);

    /**Creamos un objeto de cada clase pasandoles la conexion; con estos obejtos es con los que vamos a manejar todo
     * lo referente a las peticiones a la base de datos y las clases*/
    $userRepository = new UserRepository($conn);
    $tareaRepository = new TareaRepository($conn);

?>