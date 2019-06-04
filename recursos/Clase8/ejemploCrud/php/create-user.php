<?php
    require_once('./model/User.php');    
    require_once('./repository/UserRepository.php');
    require_once('./normalizer/UserNormalizer.php');
    require_once('./services/dbConnectionManager.php');
    require_once('./services/servicesManager.php');
    require_once('./services/renderManager.php');
   
    
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userSex = $_POST['sex'];

   ?>

<h1>Create User</h1>

<!-- <form action="create-user.php" method="post">
    <p>User name: <input type="text" name="name" /></p>
    <p>User email: <input type="text" name="email" /></p>
    <p>User sex (F/M/N): <input type="text" name="sex" /></p>
    <p><input type="submit" /></p>
</form> -->

<?php
    userForm(null);//si se espera un objeto mejor pasar null que false
    //$isAPost = isAPost($userName,$userEmail,$userSex);

    if (isAPost()) {
        $user = $userRepository->getByEmail($userEmail);
       
        if (!$user) {
            $newUser = $userNormalizer::createFromVariables(null, $userName, $userEmail, $userSex);
            $created = $userRepository->insert($newUser);
            if ($created) {
                $user = $userRepository->getByEmail($userEmail);
                echo "<p>usuario creado con id {$user->getId()}</p>";
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

