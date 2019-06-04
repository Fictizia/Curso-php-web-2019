<?php
require_once('./User.php');

Class Mascota
{
    protected $id;
    protected $name;
    protected $raza;
    protected $user;
    
    public function getUser()
    {
        return $this->user;
    }
    public function setUser(User $user)
    {
        $this->user = $user;
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

    public function getRaza()
    {
        return $this->raza;
    }

    public function setRaza($raza)
    {
        $this->raza = $raza;
    }

    public function createMascotaFromRow($conn, $row) {
        $newMascota = new Mascota();
        $idUser = $row['userid'];
        $user = User:: getUserFromDB($conn, $idUser);
        $newMascota->setName($row['name']);
        $newMascota->setRaza($row['raza']);
        $newMascota->setUser($user);
    

        return $newMascota;
    }
}