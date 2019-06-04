<?php
Class Tarea {

    protected $id;
    protected $tarea;
    protected $idUser;

    public function getId(){

        return $this->id;

    }

    public function setId($id){

        $this->id = $id;

    }

    public function getTarea(){

        return $this->tarea;

    }

    public function setTarea($tarea){

        $this->tarea = $tarea;

    }

    protected function getIdUser(){

        return $this->idUser;

    }

    protected function setIdUser($idUser){

        $this->idUser = $idUser;

    }

    
}