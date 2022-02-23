<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/spacex-launches-crud/config/conexion.php');

  class User extends Conexion {

    public function __construct() {
      parent::__construct();
    }

    public function create($usuario,$contraseña,$nombre,$correo,$direccion,$rol){

      $query = "INSERT INTO users (username,pass,fullname,email,address,role)
                VALUES (:username,:pass,:fullname,:email,:address,:role)";

      $resultado = $this->conexionBD->prepare($query);

      $resultado->execute(array(":username"=>$usuario,":pass"=>$contraseña,":fullname"=>$nombre,
                                ":email"=>$correo,":address"=>$direccion,":role"=>$rol));

      return header('location: ../views/admin/users/users.php?success=true');

    }

    public function readAll () {

      $query = "SELECT * FROM users";

      $resultado = $this->conexionBD->prepare($query);

      $resultado->execute();

      return $resultado->fetchAll();

    }

    public function readById ($id) {

      $query = "SELECT * FROM users WHERE account_id = :account_id";

      $resultado = $this->conexionBD->prepare($query);

      $resultado->execute(array(":account_id"=>$id));

      return $resultado->fetch();

    }

    public function update($id,$usuario,$nombre,$correo,$direccion,$rol){

        $query = "UPDATE users SET username = :username, fullname = :fullname, email = :email, 
                  address = :address, role = :role WHERE account_id = :account_id";

        $resultado = $this->conexionBD->prepare($query);

        $resultado->execute(array(":username"=>$usuario,":fullname"=>$nombre,":email"=>$correo,
                                  ":address"=>$direccion,":role"=>$rol,":account_id"=>$id));

        return header('location: ../views/admin/users/users.php?success=true');

    }

    public function delete($id){

        $query = "DELETE FROM users WHERE account_id = :account_id";

        $resultado = $this->conexionBD->prepare($query);

        $resultado->execute(array(":account_id"=>$id));

        return header('location: ../views/admin/users/users.php?success=true');

    }

    public function updateRegular($id,$nombre,$correo,$direccion){

      $query = "UPDATE users SET fullname = :fullname, email = :email, 
                address = :address WHERE account_id = :account_id";

      $resultado = $this->conexionBD->prepare($query);

      $resultado->execute(array(":fullname"=>$nombre,":email"=>$correo,
                                ":address"=>$direccion,":account_id"=>$id));

      return header('location: ../views/regular/home/home.php?success=true');
    }
  }
