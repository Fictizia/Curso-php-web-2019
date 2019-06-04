<?php

    require_once("./normalizers/TareaNormalizer.php");

    Class TareaRepository{

        protected $dbConnection;

        public function __construct($dbConnection){

            $this->dbConnection = $dbConnection;

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

        public function getByIdUser($idUser){

            $sql = "SELECT * FROM tareas WHERE idusuario = '{$idUser}'";

            $result = $this->dbConnection->query($sql);

            foreach($result as $k => $row){
                var_dump($row);
                $tarea = TareaNormalizer::createFromRow($row);
                
            }

            return $tarea;
        }
    }

    

?>