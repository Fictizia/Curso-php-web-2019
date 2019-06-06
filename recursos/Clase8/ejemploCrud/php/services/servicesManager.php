<?php

$isAPost = false;
function isAPost() {
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userSex = $_POST['sex'];
    
    if ($userName && $userEmail && $userSex) {
        $isAPost = true;
    }
    return $isAPost;
}

$isATodoPost = false;
function isATodoPost() {
    $userTask = $_POST['task'];
    $userId = $_POST['userId'];
    
    if ($userTask && $userId) {
        $isATodoPost = true;
    }
    return $isATodoPost;
}

?>