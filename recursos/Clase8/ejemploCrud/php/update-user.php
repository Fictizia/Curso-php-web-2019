<?php
    require_once('./model/User.php');    
    require_once('./repository/UserRepository.php');
    require_once('./normalizer/UserNormalizer.php');
    require_once('./services/dbConnectionManager.php');
    require_once('./services/servicesManager.php');
    require_once('./services/renderManager.php');
    $userId = $_GET['user'];
    $user = $userRepository->getById($userId);
     
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userSex = $_POST['sex'];
    isAPost();

echo "<h1>UPDATE User con ID:{$userId}</h1>";


    if ($user) {
        userForm($user);
    } else {
        echo "user not found with id: {$userId}</p>";
    }

    if ($user && isAPost()) {
        $userToUpdate = $userNormalizer::createFromVariables($userId, $userName, $userEmail, $userSex);
        $updated = $userRepository->update($userToUpdate);
        if ($updated) {
            $user = $userRepository->getByEmail($userEmail);
            echo "<p>usuario modicado: {$userId}</p>";
        } else {
            echo "<p>usuario no pudo ser modificado</p>";
            echo "<p>{$conn->err}</p>";
        }
    }

?>
<a href='./index.php'>back to main </a>

