<?php
    require_once('./model/User.php');    
    require_once('./repository/UserRepository.php');
    require_once('./normalizer/UserNormalizer.php');
    require_once('./model/Todo.php');    
    require_once('./repository/TodoRepository.php');
    require_once('./normalizer/TodoNormalizer.php');
   
    require_once('./services/servicesManager.php');
    require_once('./services/renderManager.php');
    require_once('./services/dbConnectionManager.php');
   
 
   
    
    $userTask = $_POST['task'];
    $userId = $_POST['userId'];

   ?>

<h1>Create new Task</h1>

 <form action="create-todo.php" method="post">
    <p>Task name: <input type="text" name="task" /></p>
    <p>User Id: <input type="text" name="userId" /></p>
    <p><input type="submit" /></p>
</form> 

<?php
    //$isAPost = isATodoPost($userTask,$userId);

    if (isATodoPost()) {
            $newTodo = TodoNormalizer::createTodoFromVariables(null, $userTask, $userId);
            $created = $todoRepository->insert($newTodo);
            if ($created) {
                $todo = $todoRepository->getByTask($userTask);
                echo "<p>Tarea guardada con id {$todo->getId()}</p>";
            } else {
                echo "<p>tarea no pudo ser creada</p>";
                echo "<p>{$conn->err}</p>";
            }
        }
    
?>
<a href='./index.php'>back to main </a>

