<?php

    /**Importamos los ficheros de las clases que se van a usar en este fichero */
    require_once('./model/User.php');   
    require_once('./model/Tarea.php'); 
    require_once('./repository/UserRepository.php');
    require_once('./repository/TareaRepository.php');
    require_once('./services/dbConnectionManager.php');
    require_once('./services/requestManager.php');
    require_once("./services/forms-tareas.php");
    require_once("./normalizers/UserNormalizer.php");
    
    $tipoTarea = $_POST['tarea'];
    $idUser = $_POST['idUser'];
    $create = "CREATE";

    //Llamamos a la funcion form del fichero forms.php para que cargue el formulario en la pagina
    formCreateUpdateTareas($create, NULL);
    
    
    if (isAPostTarea()) {
        $tarea = $tareaRepository->getByTarea($tipoTarea);
        if (!$tarea) {
            $newTarea = TareaNormalizer::createFromVariables(NULL, $tipoTarea, $idUser);
            $created = $tareaRepository->insert($newTarea);
            if ($created) {
                $tarea = $tareaRepository->getByTarea($tipoTarea);
                echo "<p>Tarea creada con id '{$tarea->getId()}' </p>";
            } else {
                echo "<p>Tarea no pudo ser creada</p>";
                echo "<p>{$conn->err}</p>";
            }
        } else {
            echo "<p>Tarea: {$tipoTarea} already exists</p>";
        }
    }
?>
<a href='./index-tareas.php'>back to main </a>

