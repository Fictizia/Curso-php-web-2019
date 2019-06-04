<?php

function isCreatePost()
{
    $isAPost = false;
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userSex = $_POST['sex'];

    if ($userName && $userEmail && $userSex) {
        $isAPost = true;
    }
    return $isAPost;
}




function isCreatePost2()
{
    $isAPost = false;
    $carMarca = $_POST['marca'];
    $carColor = $_POST['color'];
    $carKilometros = $_POST['kilometros'];

    if ($carMarca && $carColor && $carKilometros) {
        $isAPost = true;
    }
    return $isAPost;
}
