<?php


    //Fichero para almacenar los formularios; es parte del controlador del modelo

    
    function formCreateUpdateTarea($createUpdate, $tarea){

        $titulo = ($tarea ? '<h1>' . $createUpdate . ' Tarea con ID: ' . $tarea->getId() . 
        '</h1> <form action="update-tarea.php?tarea=' . $tarea->getId() .'" method="post"><p>Tarea Id: <input type="text" name="idTarea" value="' . 
        $tarea->getId() . '"/></p>' :  '<h1>' . $createUpdate . ' Tarea</h1> <form action="create-tarea.php" method="post">');

        echo ($titulo);

            echo '<p>Tarea: <input type="text" name="tarea" value="' . ($tarea ? $tarea->getTarea() : '') . '" /></p>
                <p>Id User: <input type="text" name="idUser" value="' . ($tarea ? $tarea->getIdUser() : '') . '"/></p>
                <p><input type="submit" /></p>
                </form>';

    }

    function cabeceraTablaTarea($cabecera){

        if (!$cabecera){
            echo "<p>Tarea modicada: </p>";

            echo '<table class="table">';
        }

        echo "<tr>            
            <th>Id</th>
            <th>Tarea</th>
            <th>Id User</th>";
            if($cabecera){
                    echo "<th>$cabecera</th>";
             }
             echo " </b></tr>";
    }

    function printFormTarea($updated, $tareaId, $tarea, $idUser){

        echo "<tr>
            <td>{$tareaId}</td>
            <td>{$tarea}</td>
            <td>{$idUser}</td>";

        if ($updated){

            echo "</tr></br>
                </table></br>";

        }else{

             /* Tambien creamos enlaces en cada usuario para Update y para Delete, pasando por http la Id del usuario, 
                que la recibiremos por GET en el fichero correspondiente */
                echo "<td>                        
                    <a href='update-tarea.php?tarea={$tareaId}'>Update</a>
                    <a href='delete-tarea.php?tarea={$tareaId}'>Delete</a>
                    </td>";
                echo "</tr>";

        }
            
    }


?>