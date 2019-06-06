<?php

Class Car
{
    protected $id;
    protected $marca;
    protected $color;
    protected $kilometros;
    protected $user;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getKilometros()
    {
        return $this->kilometros;
    }

    public function setKilometros($kilometros)
    {
        $this->kilometros = $kilometros;
    }
    public function getUser() : User
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }
}