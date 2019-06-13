<?php

    /**Importamos los ficheros de las clases que se van a usar en este fichero */
    require_once('./model/User.php');    
    require_once('./repository/UserRepository.php');       
    require_once('./model/Tarea.php');    
    require_once('./repository/TareaRepository.php');
    require_once('./services/dbConnectionManager.php');
    require_once('./services/requestManager.php');
    require_once("./services/forms-users.php");
    require_once("./normalizers/UserNormalizer.php");
    require_once("./services/forms-tareas.php");
    require_once("./normalizers/TareaNormalizer.php");

    /**Recibimos por GET el Id del usuario que hemos enviado por hhtp desde el fichero index.php*/
    $tareaId = $_GET['tarea'];
    
    /**Amacenamos en $user el objeto devuelto por la funcion getById con el usuario que buscamos */
    $tarea = $tareaRepository->getById($tareaId);
    
     
    /**Recibimos por POST los datos recibidos desde el formulario de este mismo fichero y los almacenamos en variables */
    $tipoTarea = $_POST['tarea'];
    $idUser = $_POST['idUser'];
    $tareaId = $tarea->getId();
    $create = "UPDATE";  

    if ($tarea) {


        //Llamamos a la funcion form del fichero forms.php para que cargue el formulario en la pagina
        formCreateUpdateTareas($create, $tarea);
        
    } else {
        echo "Tarea not found with id: {$tareaId}</p>";
    }

    if ($tarea && isAPostTarea()) {

        $tareaToUpdate = TareaNormalizer::createFromVariables($tareaId, $tipoTarea, $idUser);
        $updated = $tareaRepository->updateTarea($tareaToUpdate);
        if ($updated) {
            $tarea = $tareaRepository->getByTarea($tipoTarea);

            cabeceraTablaTarea(NULL);

            printFormTarea($updated, $tarea->getId(), $tarea->getTarea(), $tarea->getIdUser());
            

        } else {
            echo "<p>Tarea no pudo ser modificada</p>";
            echo "<p>{$conn->err}</p>";
        }
    }

?>
<a href='./index-tareas.php'>back to main </a>