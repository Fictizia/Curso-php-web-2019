<?php

    /**Importamos los ficheros de las clases que se van a usar en este fichero */
    require_once('./model/User.php');    
    require_once('./repository/UserRepository.php');
    require_once('./model/Tarea.php');    
    require_once('./repository/TareaRepository.php');
    require_once('./services/dbConnectionManager.php');

    /**Recibimos por GET el Id del usuario que hemos enviado por hhtp desde el fichero index.php*/
    $tareaId = $_GET['tarea'];
?>

<h1>Tarea To delete <?php echo $tareaId; ?></h1>
<?php

    /** Recibimos en $user el objeto con el usuario que retorna la funcion getById a la que le hemos
     * pasado la Id del usuario que buscamos
    */
    $tarea = $tareaRepository->getById($tareaId);

    /**Almacenamos en $deleted el valor true o false dependiendo de los que retorne la funcion delete,
     * si ha realizado con exito o no la consulta DELETE del usaurio que le hemos pasado
     */
    $deleted = $tareaRepository->deleteTarea($tarea);

    /**Evaluamos si es true o false y mostramos un mensaje u otro en funcion de ello */
    if ($deleted) {
        echo "<p> Tarea properly deleted </p>";
    } else {
        echo "<p> error: not deleted </p>";
        echo "<p> $conn->error() </p>";
    }
?>
<a href='./index-tareas.php'>back to main </a>

