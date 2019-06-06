<?php

    /**Importamos los ficheros de las clases que se van a usar en este fichero */
    require_once('./model/User.php');    
    require_once('./repository/UserRepository.php');
    require_once('./model/Tarea.php');    
    require_once('./repository/TareaRepository.php');
    require_once('./services/dbConnectionManager.php');
    require_once('./services/requestManager.php');
    require_once("./services/forms-users.php");
    require_once("./normalizers/UserNormalizer.php");
    
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userSex = $_POST['sex'];
    $create = "CREATE";
    //Llamamos a la funcion form del fichero forms.php para que cargue el formulario en la pagina
    formCreateUpdate($create, NULL);
    
    
    if (isAPost()) {
        $user = $userRepository->getByEmail($userEmail);
        if (!$user) {
            $newUser = UserNormalizer::createFromVariables(NULL, $userName, $userEmail, $userSex);
            $created = $userRepository->insert($newUser);
            if ($created) {
                $user = $userRepository->getByEmail($userEmail);
                echo "<p>usuario creado con id '{$user->getId()}' </p>";
            } else {
                echo "<p>usuario no pudo ser creado</p>";
                echo "<p>{$conn->err}</p>";
            }
        } else {
            echo "<p>user with email: {$userEmail} already exists</p>";
        }
    }
?>
<a href='./index.php'>back to main </a>

