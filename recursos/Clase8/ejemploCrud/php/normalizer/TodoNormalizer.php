<?php
require_once('./repository/TodoRepository.php');

Class TodoNormalizer {

    public static function createTodoFromRow($row) 
    {
      
        $newTodo = new Todo();
        $newTodo->setId($row['id']);
        $newTodo->setTodo($row['item']);
        $newTodo->setUserId($row['user_id']);
        return $newTodo;
    }
    
    public static function createTodoFromVariables($id, $todo, $userId) 
    {
        var_dump($todo);
        $newTodo = new Todo();
        $newTodo->setId($id);
        $newTodo->setTodo($todo);
        $newTodo->setUserId($userId);
        return $newTodo;
    }
}

?>