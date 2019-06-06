<?php

    /**Importamos los ficheros de las clases que se van a usar en este fichero */
    require_once('./model/User.php');    
    require_once('./repository/UserRepository.php');       
    require_once('./repository/TareaRepository.php');
    require_once('./services/dbConnectionManager.php');
    require_once('./services/requestManager.php');
    require_once("./services/forms-users.php");
    require_once("./normalizers/UserNormalizer.php");

    /**Recibimos por GET el Id del usuario que hemos enviado por hhtp desde el fichero index.php*/
    $userId = $_GET['user'];
    
    /**Amacenamos en $user el objeto devuelto por la funcion getById con el usuario que buscamos */
    $user = $userRepository->getById($userId);
     
    /**Recibimos por POST los datos recibidos desde el formulario de este mismo fichero y los almacenamos en variables */
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userSex = $_POST['sex'];
    $userId = $user->getId();
    $create = "UPDATE";    

    if ($user) {


        //Llamamos a la funcion form del fichero forms.php para que cargue el formulario en la pagina
        formCreateUpdate($create, $user);
        
    } else {
        echo "user not found with id: {$userId}</p>";
    }

    if ($user && isAPost()) {
        $userToUpdate = UserNormalizer::createFromVariables($userId, $userName, $userEmail, $userSex);
        $updated = $userRepository->update($userToUpdate);
        if ($updated) {
            $user = $userRepository->getByEmail($userEmail);

            cabeceraTabla(NULL);

            printForm($updated, $user->getId(), $user->getName(), $user->getEmail(), $user->getSexo());
            

        } else {
            echo "<p>usuario no pudo ser modificado</p>";
            echo "<p>{$conn->err}</p>";
        }
    }

?>
<a href='./index.php'>back to main </a>