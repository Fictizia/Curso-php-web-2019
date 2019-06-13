<?php
Class TareaNormalizer {

    public static function createFromRow($row, $hidrate = false) 
    {
        global $userRepository;
        
        $newTarea = new Tarea();
        $newTarea->setId($row['id']);
        $newTarea->setTarea($row['tarea']);
        $newTarea->setIdUser($row['idusuario']);
        if ($hidrate)  {
            $user = $userRepository->getById($row['idusuario']);
            if($user) {
                $newTarea->setUser($user);
            }
        }
        return $newTarea;
    }
    
    public static function createFromVariables($id, $tarea, $idUser) 
    {
        $newTarea = new Tarea();
        $newTarea->setId($id);
        $newTarea->setTarea($tarea);
        $newTarea->setIdUser($idUser);

        return $newTarea;
    }
}

?>