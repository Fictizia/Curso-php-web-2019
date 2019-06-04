<?php

Class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $sexo;

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

    public function createUserFromRow($row) {
        $newUser = new User();
        $newUser->setName($row['name']);
        $newUser->setEmail($row['email']);

        return $newUser;
    }

    public function getUserFromDB($conn, $id){
        $sql = 'SELECT * from users WHERE id = '.($id ?? 'null');
     
        $result = $conn->query($sql);
        //le decimos que nos de los resultados en un array asociativo. (para recoger un resultado). Para obtener varios resultados lo mejor es un foreach
  
        $userRow = $result->fetch_assoc();
    
        $newUser = User::createUserFromRow($userRow);
        
        return $newUser;
    }
}