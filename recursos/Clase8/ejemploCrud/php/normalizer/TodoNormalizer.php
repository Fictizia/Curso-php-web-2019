<?php
require_once('./repository/TodoRepository.php');

Class TodoNormalizer {

    public static function createTodoFromRow($row) 
    {
        global $userRepository;
        $newTodo = new Todo();
        $newTodo->setId($row['id']);
        $newTodo->setTodo($row['item']);
        $newTodo->setUserId($row['user_id']);
        $user = $userRepository->getById($row['user_id']);
        $newTodo->setUser($user);
        return $newTodo;
    }
    
    public static function createTodoFromVariables($id, $todo, $userId) 
    {
        $newTodo = new Todo();
        $newTodo->setId($id);
        $newTodo->setTodo($todo);
        $newTodo->setUserId($userId);
        return $newTodo;
    }
}

?>