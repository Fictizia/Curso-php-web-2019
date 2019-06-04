<?php
    require_once('./User.php');

    $servername = "mysql_db";
    $serverport = "3306";
    $dbname = "clase7";
    $username = "root";
    $password = "rootsecretpass";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, $serverport);


    function createUserFromRow($row) {
        $newUser = new User();
        $newUser->setName($row['name']);
        $newUser->setEmail($row['email']);

        return $newUser;
    }
  
?>
<html>
    <head>
    </head>
    <body>
        <?php
                   function escribeLista($conn, $sexo){
                    $sql = "SELECT * FROM users WHERE sexo = '{$sexo}'";
                    $result = $conn->query($sql);
                    foreach ($result as $k => $row) 
                    {
                        $user = User::createUserFromRow($row);
                        echo "<li>name: {$user->getName()}</li>";
                    }
                    return true;
                }
                
                echo "<h1>Listar de No binarios</h1>";
                escribeLista($conn, 'N');
                echo "<h1>Listar de CHICOS</h1>";
                escribeLista($conn,'M');
                echo "<h1>Listar de CHICAS</h1>";
                escribeLista($conn,'F');
                echo"<hr>";
        ?>

    </body>
</html>
