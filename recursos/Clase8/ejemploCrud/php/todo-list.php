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
        <h1>Listado de tareas</h1>
        <table class="table">
        <thead>
            <tr>
            <th>Id</th>
            <th>Tarea</th>
            <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
          
        <?php
            $task = $todoRepository->getAll();

            foreach ($task as $todo) {
                echo "<tr>";
                    echo "<td>{$todo->getId()}</td>";
                    echo "<td>{$todo->getTodo()}</td>";
                    echo "<td>{$todo->getUserId()}</td>";
                    echo "<td>{$todo->getUser()->getName()}</td>";
                    echo "<td>
                    <a href='update-todo.php?tarea={$todo->getId()}'>Update</a>
                    <a href='delete-todo.php?tarea={$todo->getId()}'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
        </tbody>
        </table>
        <a href='create-todo.php'>create task</a>
    </body>
</html>
