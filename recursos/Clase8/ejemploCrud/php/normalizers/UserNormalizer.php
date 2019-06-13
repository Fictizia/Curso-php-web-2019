<?php
Class UserNormalizer {

    public static function createFromRow($row, $hidrated = false) 
    {

        global $tareaRepository;

        $newUser = new User();
        $newUser->setId($row['id']);
        $newUser->setName($row['name']);
        $newUser->setEmail($row['email']);
        $newUser->setSexo($row['sexo']);

        if($hidrated){
            $tareas = $tareaRepository->getByIdUser($row['id'], true);
            if($tareas){
                $newUser->setTareas($tareas);
            }
        }

        return $newUser;
    }

    
    
    public static function createFromVariables($id, $name, $email, $sexo) 
    {
        $newUser = new User();
        $newUser->setId($id);
        $newUser->setName($name);
        $newUser->setEmail($email);
        $newUser->setSexo($sexo);
        return $newUser;
    }
}

?>