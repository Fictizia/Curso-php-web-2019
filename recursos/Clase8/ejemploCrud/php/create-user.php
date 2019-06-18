<?php
    require_once('./model/User.php');    
    require_once('./repository/UserRepository.php');
    require_once('./repository/CarRepository.php');
    require_once('./services/bdConectionManager.php');
    require_once('./services/requestManager.php');
    
    
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userSex = $_POST['sex'];
// hola

    $isAPost = false;
    if ($userName && $userEmail && $userSex) {
        $isAPost = true;
    }
    ?>

<h1>Create User</h1>
<form action="create-user.php" method="post">
    <p>User name: <input type="text" name="name" /></p>
    <p>User email: <input type="text" name="email" /></p>
    <p>User sex (F/M/N): <input type="text" name="sex" /></p>
    <p><input type="submit" /></p>
</form>

<?php

    if (isCreatePost()) {
        $user = $userRepository->getByName($userName);
        if (!$user) {
            $newUser = UserNormalizer::createFromVariables(null, $userName, $userEmail, $userSex);

            $created = $userRepository->insert($newUser);
            if ($created) {
                $user = $userRepository->getByName($userName);
                echo "<p>usuario creado:</p>";
                echo $user->getId();
                
            } else {
                echo "<p>usuario no pudo ser creado</p>";
                echo "<p>{$conn->err}</p>";
            }
        } else {
            echo "<p>user with email: {$userName} already exists</p>";
        }
    }
?>
<a href='./index.php'>back to main </a>

