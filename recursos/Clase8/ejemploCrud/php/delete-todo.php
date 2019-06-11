<?php
    require_once('./model/Todo.php');    
    require_once('./repository/TodoRepository.php');
    require_once('./normalizer/TodoNormalizer.php');
    require_once('./repository/UserRepository.php');
    require_once('./services/dbConnectionManager.php');
    
    $taskId = $_GET['tarea'];
?>

<h1>Borrar tarea <?php echo $taskId; ?></h1>
<?php

  
    $deleted = $todoRepository->delete($taskId);
    if ($deleted) {
        echo "<p> tarea borrada </p>";
    } else {
        echo "<p> error: not se pudo borrar la tarea </p>";
        echo "<p> $conn->error() </p>";
    }
?>
<a href='./index.php'>back to main </a>
<br/>
<a href='./todo-list.php'>Volver al listado de tareas </a>

