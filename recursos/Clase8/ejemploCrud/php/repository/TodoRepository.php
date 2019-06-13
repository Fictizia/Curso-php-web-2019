<?php
require_once('./normalizer/TodoNormalizer.php'); 

Class TodoRepository
{
    protected $dbConnection;

    public function __construct( $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

   

    public function getAll()
    {
        $sql = "SELECT * FROM todos";
        $result = $this->dbConnection->query($sql);
        $todosArray = [];
        foreach ($result as $row) {
            $todosArray[] = TodoNormalizer::createTodoFromRow($row);
        }

        return $todosArray;      
    }

    public function getById($id)
    {
        $todo = NULL;
        $sql = "SELECT * FROM todos WHERE id = {$id}";
        $result = $this->dbConnection->query($sql);
        
        $row = $result->fetch_array();
        if ($row) {
            $todo = TodoNormalizer::createTodoFromRow($row);
        }

        return $todo;      
    }

    public function getByTask($task)
    {
        $sql = "SELECT * FROM todos WHERE item = '{$task}'";
        $result = $this->dbConnection->query($sql);   
        $row = $result->fetch_array();
        if ($row) {
            $todo = TodoNormalizer::createTodoFromRow($row);
        }

        return $todo;       
    }

    public function getByUserId($userId)
    {
        $sql = "SELECT * FROM todos WHERE user_id = '{$userId}'";
        $result = $this->dbConnection->query($sql);   
        $row = $result->fetch_array();
        $todosArray = [];
        foreach ($result as $row) {
            $todosArray[] = TodoNormalizer::createTodoFromRow($row);
        }
       
        return $todosArray;       
    }

    public function delete($todo)
    {
        $sql = "DELETE FROM todos WHERE id = {$todo}";
        $result = $this->dbConnection->query($sql);
        return $result;      
    }

    public function insert($todo)
    {
        $sql = "INSERT INTO `clase8`.`todos` 
                    (`item`, `user_id`) 
                VALUES (
                     '{$todo->getTodo()}',
                     '{$todo->getUserId()}'
                )";
        $result = $this->dbConnection->query($sql);
        return $result;      
    }

    public function update($todo)
    {
       
        $sql = "UPDATE `clase8`.`todos` 
                SET 
                    item = '{$todo->getTodo()}',
                    user_id = '{$todo->getUserId()}'
                WHERE id = {$todo->getId()}
                ";
     var_dump($sql);
        $result = $this->dbConnection->query($sql);

        return $result;      
    }

}