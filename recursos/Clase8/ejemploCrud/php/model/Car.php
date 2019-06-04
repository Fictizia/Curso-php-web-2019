<?php

Class Car
{
    protected $id;
    protected $marca;
    protected $color;
    protected $kilometros;


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

    public function getkilometros()
    {
        return $this->kilometros;
    }

    public function setkilometrosHora($kilometros)
    {
        $this->kilometros = $kilometros;
    }
}