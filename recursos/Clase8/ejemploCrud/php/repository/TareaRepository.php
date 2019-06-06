<?php

    require_once("./normalizers/TareaNormalizer.php");

    Class TareaRepository{

        protected $dbConnection;

        public function __construct($dbConnection){

            $this->dbConnection = $dbConnection;

        }

        public function getAll(){
            $sql = "SELECT * FROM tareas";

            $result = $this->dbConnection->query($sql);

            $tareaArray = [];

            foreach ($result as $row) {
                $tareaArray[] = TareaNormalizer::createFromRow($row);
            }

            return $tareaArray;
        }

        public function getById($id){

            $sql = "SELECT * FROM tareas WHERE id = '{$id}'";

            $result = $this->dbConnection->query($sql);

            $row = $result->fetch_array();

            if ($result){
                $tarea = TareaNormalizer::createFromRow($row);
            }

            return $tarea;
        }

        public function getByTarea($tipoTarea){

            $tarea = NULL;

            $sql = "SELECT * FROM tareas WHERE tarea = '{$tipoTarea}'";

            $result = $this->dbConnection->query($sql);

            $row = $result->fetch_array();

            if ($result){
                $tarea = TareaNormalizer::createFromRow($row);
                var_dump($tarea);
            }

            return $tarea;
        }

        public function getByIdUser($idUser){

            $sql = "SELECT * FROM tareas WHERE idusuario = '{$idUser}'";

            $result = $this->dbConnection->query($sql);

            foreach($result as $k => $row){
                $tarea = TareaNormalizer::createFromRow($row);
                
            }

            return $tarea;
        }


        public function deleteTarea($tarea)
        {
            $sql = "DELETE FROM tareas WHERE id = {$tarea->getId()}";
            $result = $this->dbConnection->query($sql);
            return $result;      
        }

        public function insertTarea($tarea)
        {
            $sql = "INSERT INTO `clase8`.`tareas` 
                    (`tarea`, `idusuario`) 
                    VALUES (
                     '{$taera->getTarea()}',
                     '{$tarea->getIdUSer()}'
                    )";
             $result = $this->dbConnection->query($sql);

            return $result;      
        }   

        public function updateTarea($tarea)
        {
            $sql = "UPDATE `clase8`.`tareas` 
                    SET 
                    tarea = '{$tarea->getTarea()}',
                    idusuario = '{$tarea->getIdUser()}'
                    WHERE id = {$tarea->getId()}
                    ";
            $result = $this->dbConnection->query($sql);

            return $result;
        }

    }    

?>