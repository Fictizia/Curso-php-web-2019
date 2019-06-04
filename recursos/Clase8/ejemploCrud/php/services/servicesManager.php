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


?>