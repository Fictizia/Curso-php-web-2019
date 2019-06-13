<?php

Class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $sexo;
    protected $tareas;

    function __construct() {
        $this->tareas = [];
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getTareas () 
    {
        return $this->tareas;
    }

    public function setTareas (array $tareas){
        $this->tareas = $tareas;
    }
}