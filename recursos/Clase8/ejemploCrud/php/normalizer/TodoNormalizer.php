<?php
require_once('./repository/TodoRepository.php');

Class TodoNormalizer {

    public static function createTodoFromRow($row) 
    {
        $newTodo = new Todo();
        $newTodo->setId($row['id']);
        $newTodo->setTodo($row['todo']);
        $newTodo->setUserId($row['user_id']);
        return $newTodo;
    }
    
    public static function createTodoFromVariables($id, $todo, $user_id) 
    {
        $newTodo = new Todo();
        $newTodo->setId($id);
        $newTodo->setTodo($todo);
        $newTodo->setUserId($user_id);
        return $newTodo;
    }
}

?>