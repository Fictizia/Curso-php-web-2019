<?php

//nombre de la clase siempre en mayuscula
Class User
{
    //las caracteristicas o propiedades
    protected $id;
    protected $name;
    protected $email;
    protected $sexo;

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
    
    //Funcion para crear un objeto User con lo exclusivo de ella
    public function createUserFromRow($row) {
        //Creamos el objeto vacio
        $newUser = new User();
        
        /*Le metemos las propiedades que queremos que contenga de las que 
        hemos puesto anteriormente; no tienen por que ser todas*/
        $newUser->setId($row['id']);
        $newUser->setName($row['name']);
        $newUser->setEmail($row['email']);

        //Retornamos el objeto
        return $newUser;
    }


    /*Funcion para hacer la consulta del registro cuya id le indicamos, que se los estamos pidiendo desde la clase Mascota;
    como tiene que hacer una consulta a la base de datos, necesita recibir los datos de la conexion, que la recibe en $conn*/
    public function getUserFromDB($conn, $idUser){

        /*Almacenamos la consulta que queremos hacer para recoger los datos del usuario con la id que buscamos; 
        Para poder concatenar la consulta con el valor de la variable es necesario el "."*/
        
        /**Con respecto al comparador "??", lo que hace es que si $idUser tiene algo, mete el valor de $idUser; si no tiene nada, mete "null" */
        $sql = 'SELECT * FROM users WHERE id = '. ($idUser ?? ' null ');
        
        //Almacenamos la consulta
        $result = $conn->query($sql);

        //Usamos la funcion fetch_assoc para almacenar los datos como un array asociativo
        $userRow = $result->fetch_assoc();

        /**Inicializamos a NULL $newUser para poder verificar antes de retornarlo si tiene valor o no y así controlar que no se haga consulta si es NULL */
        $newUser = NULL;

        /**Si se ha almacenado una consulta, almacenamos en $newUser el objeto de la clase User que hemos recogido */
        if ($userRow) 
        {
            //Recogemos el objeto que se crea al llamar a la funcion createUserFromRow de esta misma clase User
            //LOS SIGUIENTES PASOS SE REALIZAN EN ESTE MISMO FICHERO EN LA FUNCION LLAMADA, Y UNA VEZ ACABA PASAMOS AL RETURN DE AQUÍ ABAJO
            $newUser = User::createUserFromRow($userRow);

        }
        /*Retornamos el objeto a donde se le ha llamado; en este caso desde la clase Mascota; si se ha almacenado en el if anterior un objeto,
        lo devuelve y, sino, devuelve NULL*/
        return $newUser;
        

        //SEGUIMOS EN EL FICHERO DE LA CLASE MASCOTA
    }
}