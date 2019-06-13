<?php

    /**Importamos los ficheros de las clases que se van a usar en este fichero */
    require_once('./model/User.php');    
    require_once('./model/Tarea.php');
    require_once('./repository/UserRepository.php');
    require_once('./repository/TareaRepository.php');
    require_once('./services/dbConnectionManager.php');
    require_once('./services/forms-tareas.php');
         
?>
<html>
    <head>
    </head>
    <body>
        <h1>Panel de Tareas</h1>
        <table class="table">
        <thead>
            
            <?php
                cabeceraTablaTarea("OPS");
            ?>

            
        </thead>
        <tbody>
          
        <?php

            /**La funcion getAll del objeto userRepository creado anteriormente nos devuelve un array con todos 
             * los usuarios como un objeto de la clase User cada uno, por lo que $users sera un array que contendra tantos objetos 
             * como registros haya en la tabla
              */
            $tareas = $tareaRepository->getAll();

            /**Recorremos el array $users y almacenamos cada objeto en $user  */
            foreach ($tareas as $tarea) {

                /**Como los objetos devueltos en el array por getAll son de la clase User, usamos las funciones de dicha clase
                 * para obtener los datos de cada usuario. Esto lo vamos a hacer en el fichero forms.php, llamando a la 
                 * funcion printForm() y pasandole dichos datos
                 */ 

                $nameUser = $tarea->getIdUser() ? $tarea->getUser()->getName() : 'No tiene usuario asignado';

                printFormTarea(NULL, $tarea->getId(), $tarea->getTarea(), $nameUser);    
                
            }
        ?>
        </tbody>
        </table>
        <a href='create-tarea.php'>create tarea</a>
    </body>