<?php

    //Importamos los ficheros de las clases que vamos a manejar
    require_once('./User.php');
    require_once('./Mascota.php');

    //Almacenamos los datos de conexion en variables
    $servername = "127.0.0.1";
    $serverport = "3306";
    $dbname = "clase7";
    $username = "devuser";
    $password = "devpass";

    // Creamos la conexion
    $conn = new mysqli($servername, $username, $password, $dbname, $serverport);

    
?>
<html>
    <head>
    </head>
    <body>
    <?php

    //Creamos las funciones que van a mostrarnos los datos

    /*Funcion para mostrar datos de Users. A la funcion le tenemos que pasar datos, 
    por los que los recibe en las variables (parametros) correspondientes*/
    function escribirListaUser($conn, $sexoTitulo, $sexo){

        //Mostramos el titulo
        echo "<h1>Lista de {$sexoTitulo}</h1>";

            //Almacenamos la consulta en una variable
            $sqlUser = "SELECT * FROM users WHERE sexo = '{$sexo}'";

            /*Almacenamos el resultado de la consulta en un array; la consulta la realizamos llamando*/
            $resultUser = $conn->query($sqlUser);

            /*Recorremos el array y almacenamos, para cada elmento,los datos de los campos de cada 
            registro, que son a su vez otro array, en la variable $rowUser*/
            foreach ($resultUser as $k => $rowUser) 
            {
                /*Creamos un objeto de la clase User llamando a la funcion de dicha clase 
                createUserFromRow, y le pasamos el array para que cree el objeto con dichos datos*/
                $user = User::createUserFromRow($rowUser);

                /*Mostramos lo que queremos del objeto creado $user, llamando a las funciones correspondientes 
                para obtenerlo, en este caso solo queremos el nombre, por lo que solo llamamos a la funcion getName*/
                echo "<li>name: {$user->getName()}</li>";
            }

    }

    /*Funcion para mostrar datos de Mascotas. A la funcion le tenemos que pasar datos, 
    por los que los recibe en las variables (parametros) correspondientes*/
    function escribirListaMascotas($conn, $raza){
        
        echo "<h1>Lista de $raza</h1>";

        //Almacenamos la consulta que queremos hacer en una variable
        $sqlMascotas = "SELECT * FROM mascotas WHERE raza = '{$raza}'";

        //Almacenamos lo que nos devuelve la consulta en un array
        $resultMascotas = $conn->query($sqlMascotas);

        //Recorremos el array y vamos almacenando cada registro
        foreach($resultMascotas as $k => $rowMascota){

            //Creamos un objeto de la clase Mascota pasandole los datos del registro actual
            $mascota = Mascota::createMascotaFromRow($rowMascota);

            //Mostramos los datos deseados
            echo "<li>Nombre: {$mascota->getName()}</li>";

        }

    
    }

        //Lalamamos a la funcion pasandole los parametros necesarios
        escribirListaUser($conn, 'NO BINARIOS', 'N');

        escribirListaUser($conn, 'CHICAS', 'F');

        escribirListaUser($conn, 'CHICOS', 'M');


        echo "<h1>Lista de Mascotas</h1>";
        
            $sqlRazas = "SELECT DISTINCT raza FROM mascotas";

            $resultRazas = $conn->query($sqlRazas);
            foreach ($resultRazas as $k => $rowRazas) 
            {
                escribirListaMascotas($conn, $rowRazas['raza']);
            }

        ?>

    </body>
</html>
