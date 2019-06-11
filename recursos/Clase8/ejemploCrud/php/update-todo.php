<?php
    require_once('./model/Todo.php');    
    require_once('./repository/TodoRepository.php');
    require_once('./normalizer/TodoNormalizer.php');
    require_once('./model/User.php');    
    require_once('./repository/UserRepository.php');
    require_once('./normalizer/UserNormalizer.php');
    require_once('./services/dbConnectionManager.php');
    require_once('./services/servicesManager.php');
    require_once('./services/renderManager.php');
    $taskId = $_GET['tarea'];
   

    $todo = $todoRepository->getById($taskId);
     
    $taskName = $_POST['task'];
    $userId = $_POST['userId'];
    $todoId = $todo->getId();


echo "<h1>Actualizar tarea con ID:{$taskId}</h1>";
?>

<form action="update-todo.php?tarea=<?php echo ($todo->getId()); ?>" method="post">
    <p>Task Id: <input type="text" name="taskId" value="<?php echo ($todo->getId()); ?>"/></p>
    <p>Task name: <input type="text" name="task" value="<?php echo ($todo->getTodo()); ?>"/></p>
    <p>User Id: <input type="text" name="userId" value="<?php echo ($todo->getUserId()); ?>"/></p>
    <p><input type="submit" /></p>
</form> 
<?php
    if ($todo && isATodoPost()) {
        $taskToUpdate = TodoNormalizer::createTodoFromVariables($todoId, $taskName, $userId);
        var_dump($todoRepository->update($taskToUpdate));
        $updated = $todoRepository->update($taskToUpdate);
        if ($updated) {
            $task = $todoRepository->getById($taskId);
            var_dump($task);
            echo "<p>tarea Modificada: {$taskId}</p>";
        } else {
            echo "<p>no se pudo modificar la tarea</p>";
            echo "<p>{$conn->err}</p>";
        }
    }

?>
<a href='./index.php'>back to main </a>

