<?php
Class TareaNormalizer {

    public static function createFromRow($row) 
    {
        $newTarea = new Tarea();
        $newTarea->setId($row['id']);
        $newTarea->setTarea($row['tarea']);
        $newTarea->setIdUser($row['idusuario']);

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