<?php
    require_once('./model/User.php');    
    require_once('./model/Todo.php');    
    require_once('./repository/UserRepository.php');
    require_once('./repository/TodoRepository.php');
    require_once('./services/dbConnectionManager.php');

    $userId = $_GET['user'];
?>
<html>
    <head>
    </head>
    <body>
        <h1>Lista de tareas de usuario <?php echo $userId; ?></h1>
       
          
        <?php
            $isTodo = false;
            
            $userTodos = $todoRepository->getByUserId($userId);
            $task = $todoRepository->getAll();
            
                    foreach ($task as $todo) {
                        if ($todo->getUserId() == $userId){
                            $isTodo = true;
                        }
                        
                    }
                if ($isTodo){
                    echo "<ul>";
                     foreach($userTodos as $task){
                         var_dump($task);
                         echo "<li>{$task->getTodo()}</li>";
                     }
                }
                    
            
        ?>
    
    </body>
</html>
