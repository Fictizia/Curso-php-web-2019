<?php

    /**Importamos los ficheros de las clases que se van a usar en este fichero */
    require_once('./model/User.php');    
    require_once('./model/Tarea.php');
    require_once('./repository/UserRepository.php');
    require_once('./repository/TareaRepository.php');
    require_once('./services/dbConnectionManager.php');
    require_once('./services/forms.php');
         
?>
<html>
    <head>
    </head>
    <body>
        <h1>Panel de usuarios</h1>
        <table class="table">
        <thead>
            
            <?php
                cabeceraTabla("OPS");
            ?>

            
        </thead>
        <tbody>
          
        <?php

            /**La funcion getAll del objeto userRepository creado anteriormente nos devuelve un array con todos 
             * los usuarios como un objeto de la clase User cada uno, por lo que $users sera un array que contendra tantos objetos 
             * como registros haya en la tabla
              */
            $users = $userRepository->getAll();

            /**Recorremos el array $users y almacenamos cada objeto en $user  */
            foreach ($users as $user) {

                /**Como los objetos devueltos en el array por getAll son de la clase User, usamos las funciones de dicha clase
                 * para obtener los datos de cada usuario. Esto lo vamos a hacer en el fichero forms.php, llamando a la 
                 * funcion printForm() y pasandole dichos datos
                 */ 

                 printForm(NULL, $user->getId(), $user->getName(), $user->getEmail(), $user->getSexo());    
                 
                 
                 var_dump($tareaRepository->getByIdUser($user->getId()));
                
            }
        ?>
        </tbody>
        </table>
        <a href='create-user.php'>create user</a>
    </body>
</html>
