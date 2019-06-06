<?php
    require_once('./model/User.php');    
    require_once('./repository/UserRepository.php');
    require_once('./repository/CarRepository.php');
    require_once('./services/bdConectionManager.php');
    require_once('./services/requestManager.php');


    
    $userId = $_GET['user'];
    $user = $userRepository->getById($userId);
    $isAPost = isCreatePost();



    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userSex = $_POST['sex'];

?>


<?php echo "<h1>UPDATE User con ID $userId </h1>";  ?>

<?php
    if ($user) {
        echo '
            <form action="update-user.php?user=' . $user->getId() .'" method="post">
                <p>User Id: <input type="text" name="id" value="' . $user->getId() . '"/></p>
                <p>User name: <input type="text" name="name" value="' . $user->getName() . '" /></p>
                <p>User email: <input type="text" name="email" value="' . $user->getEmail() . '"/></p>
                <p>User sex (F/M/N): <input type="text" name="sex" value="' . $user->getSexo() . '"/></p>
                <p><input type="submit" /></p>
            </form>
        ';
    } else {
        echo "user not found with id: {$userId}</p>";
    }

    if ($user && $isAPost) {
        
        $userToUpdate = UserNormalizer::createFromVariables($userId, $userName, $userEmail, $userSex);
        $updated = $userRepository->update($userToUpdate);
        if ($updated) {
            $user = $userRepository->getByEmail($userEmail);
            echo "<p>usuario modicado:</p>" . "<ul>
            <li>$userId</li>
            <li>$userName</li>
            <li>$userEmail</li>
            <li>$userSex</li>
            </ul>";

        } else {
            echo "<p>usuario no pudo ser modificado</p>";
            echo "<p>{$conn->err}</p>";
        }
    }

?>
<a href='./index.php'>back to main </a>

