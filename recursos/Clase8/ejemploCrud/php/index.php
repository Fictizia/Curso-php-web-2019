<?php
    require_once('./model/User.php');    
    require_once('./model/Todo.php');    
    require_once('./repository/UserRepository.php');
    require_once('./repository/TodoRepository.php');
    require_once('./services/dbConnectionManager.php');
?>
<html>
    <head>
    </head>
    <body>
        <h1>Panel de usuarios</h1>
        <table class="table">
        <thead>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Sex</th>
            <th>OPS</th>
            </tr>
        </thead>
        <tbody>
          
        <?php
            $users = $userRepository->getAll();

            foreach ($users as $user) {
                $isTodo = false;
                echo "<tr>";
                    echo "<td>{$user->getId()}</td>";
                    echo "<td>{$user->getName()}</td>";
                    echo "<td>{$user->getEmail()}</td>";
                    echo "<td>{$user->getSexo()}</td>";
                    echo "<td>
                        <a href='update-user.php?user={$user->getId()}'>Update</a>
                        <a href='delete-user.php?user={$user->getId()}'>Delete</a></br>";
                        $task = $todoRepository->getAll();
                    foreach ($task as $todo) {
                        if ($todo->getUserId() == $user->getId()){
                           $isTodo = true;
                        }
                        
                    }
                    if (!$isTodo)  {
                        echo "<a href='create-todo.php?user={$user->getId()}'>Añadir tarea</a>";
                    } 
                    else {
                        echo "<a href='todo-list-by-user.php?user={$user->getId()}'>Ver Tareas</a>";
                    }
                    echo"</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
        </table>
        <a href='create-user.php'>create user</a><br/>
        <a href='create-todo.php'>create todo</a>
    </body>
</html>
