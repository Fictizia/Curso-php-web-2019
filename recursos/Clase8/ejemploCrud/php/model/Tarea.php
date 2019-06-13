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

    public function getIdUser(){

        return $this->idUser;

    }

    public function setIdUser($idUser){

        $this->idUser = $idUser;

    }
    
    public function getUser() : User
    {

        return $this->user;

    }

    public function setUser(User $user){

        $this->user = $user;

    }

    
}