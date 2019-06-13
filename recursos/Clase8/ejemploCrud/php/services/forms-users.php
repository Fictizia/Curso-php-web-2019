<?php


    //Fichero para almacenar los formularios; es parte del controlador del modelo

    
    function formCreateUpdate($createUpdate, $user){

        $titulo = ($user ? '<h1>' . $createUpdate . ' User con ID: ' . $user->getId() . 
        '</h1> <form action="update-user.php?user=' . $user->getId() .'" method="post"><p>User Id: <input type="text" name="id" value="' . 
        $user->getId() . '"/></p>' :  '<h1>' . $createUpdate . ' User</h1> <form action="create-user.php" method="post">');

        echo ($titulo);

            echo '<p>User name: <input type="text" name="name" value="' . ($user ? $user->getName() : '') . '" /></p>
                <p>User email: <input type="text" name="email" value="' . ($user ? $user->getEmail() : '') . '"/></p>
                <p>User sex (F/M/N): <input type="text" name="sex" value="' . ($user ? $user->getSexo() : '') . '"/></p>
                <p><input type="submit" /></p>
                </form>';

    }
    


    function cabeceraTabla($cabecera){

        if (!$cabecera){
            echo "<p>Usuario modicado: </p>";

            echo '<table class="table">';
        }

        echo "<tr>            
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Sex</th>";
            if($cabecera){

                    echo "<th>TAREAS</th>";
                    echo "<th>$cabecera</th>";
             }
             echo " </b></tr>";
    }


    function printForm($updated, $userId, $userName, $userEmail, $userSex, $userTareas){

        echo "<tr>
            <td>{$userId}</td>
            <td>{$userName}</td>
            <td>{$userEmail}</td>
            <td>{$userSex}</td>";

        if ($updated){

            echo "</tr></br>
                </table></br>";

        }else{

             /* Tambien creamos enlaces en cada usuario para Update y para Delete, pasando por http la Id del usuario, 
                que la recibiremos por GET en el fichero correspondiente */
                echo "
                    <td>{$userTareas}</td>
                    <td>                        
                    <a href='update-user.php?user={$userId}'>Update</a>
                    <a href='delete-user.php?user={$userId}'>Delete</a>
                    </td>";
                echo "</tr>";

        }
            
    }


?>