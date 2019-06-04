<?php

function userForm($user){
    echo '
    <form action="'. ($user ? 'update-user.php?user= '. $user->getId() : 'create-user.php').'" method="post">
        '.($user ? '<p>User Id: <input type="text" name="name" value="' .  $user->getId()  . '"/></p>' : false) . '
        <p>User name: <input type="text" name="name" value="' . ($user ? $user->getName(): false). '" /></p>
        <p>User email: <input type="text" name="email" value="' . ($user ? $user->getEmail() : false). '"/></p>
        <p>User sex (F/M/N): <input type="text" name="sex" value="' . ($user ? $user->getSexo() : false) . '"/></p>
        <p><input type="submit" /></p>
    </form>
';
}


?>