<?php

//Importamos la clase User para poder usar sus funciones
require_once "./User.php";

//nombre de la clase siempre en mayuscula
Class Mascota
{
    //las caracteristicas o propiedades
    //propias de la clase
    protected $id;
    protected $raza;
    protected $nombre;

    //para almacenar de la clase User
    protected $user;

    //las funciones que maneja la clase; se puden definir como public o no dependiendo si se quieren usar fuera
    //para cada caracteristica o propiedad se usan las funciones getXXX y setXXX dependiendo de si se quieren obtener o mandar los datos de dicha propiedad
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function setRaza($raza)
    {
        $this->raza = $raza;
    }

    public function getName()
    {
        return $this->nombre;
    }

    public function setName($nombre)
    {
        $this->nombre = $nombre;
    }

    //Funciones para la clase User
    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    //Funcion para crear un nuevo objeto dela clase Mascota
    public function createMascotaFromRow($row) {
        //Creamos el objeto vacio
        $newMascota = new Mascota();

        /*Le metemos las propiedades que queremos que contenga de las que 
        hemos puesto anteriormente; no tienen por que ser todas*/
        $newMascota->setRaza($row['raza']);
        $newMascota->setName($row['nombre']);

        //Retornamos el objeto
        return $newMascota;
    }
    
    //Funcion para crear un objeto nuevo de la calse Mascota con datos de la Clase User
    public function createMascotaUserFromRow($conn, $rowMascota) {
        //Creamos el objeto vacio
        $newMascota = new Mascota();

        //Le metemos las propeidades que queremos
        /*En este caso recibimos en la variable $idUser el valor que tiene el campo idusuario de la tabla Mascotas, 
        que es la clave foranea de la tabla Users*/
        $idUser = $rowMascota['iduser'];
        /**Recibimos el objeto creado al llamar a la funcion getUserFromDB de la clase User; 
         * como va a tener que hacer una consulta para recibir datos de la tabla, hay que pasarle la 
         * conexion, y tambien el valor del campo que queremos buscar */
        //LOS SIGUIENTES PASOS SE REALIZAN EN REALIDAD EN EL FICHERO DE LA CLASE USER
        $user = User::getUserFromDB($conn, $idUser);
        //TRAS LOS PASOS REALIZADOS EN EL FICHERO DE LA CLASE USER SEGUIMOS AQUÍ
        //Le metemos el resto de propiedades que queremos que contenga de la clase, que no tienen por que ser todas
        $newMascota->setRaza($rowMascota['raza']);
        $newMascota->setName($rowMascota['nombre']);
        $newMascota->setUser($user);
      
        //Retornamos el objeto
        return $newMascota;

        //SEGUIMOS EN EL FICHERO INDEX.4.PHP
    }
}