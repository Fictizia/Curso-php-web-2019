<?php

    //Este tipo de ficheros con este nombre se usan para sacar el codigo que analiza si lo que se recibe es por POST
    
    function isAPost(){

        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $userSex = $_POST['sex'];


        $isAPost = false;
        if ($userName && $userEmail && $userSex) {
            $isAPost = true;
        }

        return $isAPost;
    }

    function isAPostTarea(){

        $tarea = $_POST['tarea'];
        $idUser = $_POST['idUser'];


        $isAPost = false;
        if ($tarea && $idUser) {
            $isAPost = true;
        }

        return $isAPost;
    }

?>