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
            $user = $userRepository->getById($userId);
            echo "<p>Datos del usuario:</p>";
            echo "<p>{$user->getName()}</p>";
            echo "<p>{$user->getEmail()}</p>";
            echo "<p>{$user->getSexo()}</p><br>";
            echo "<h3>Tareas</h3>";
            $userTodos = $todoRepository->getByUserId($userId);
           if(count($userTodos)== 0) {
               echo "<p>El usuario no tiene tareas</p>";
           } else {
   
                    echo "<ul>";
                     foreach($userTodos as $task){
                         
                         echo "<li>{$task->getTodo()}</li>";
                         echo "<td>";
                         echo "<a href='update-todo.php?tarea={$task->getId()}'>Update </a> || ";
                         echo "<a href='delete-todo.php?tarea={$task->getId()}'>Delete</a></td>";
                     }
                     echo "</ul>";
            echo "<a href='create-todo.php?user={$user->getId()}'>Añadir nueva tarea a este usuario</a><br>";
            echo '<a href="index.php">Volver atrás</a>';
                    }
        ?>
    
    </body>
</html>
