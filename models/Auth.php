<?php

  require_once('../config/conexion.php');
  require_once('../utils/functions.php');

  class Auth extends Conexion {
    protected $user;
    protected $pass;

    public function __construct() {
      parent::__construct();

      $this->user = limpiar(filter_input(INPUT_POST, "usuario"));
      $this->pass = limpiar(filter_input(INPUT_POST, "pass"));
    }

    private function comprobarUsuario() {
      $query = "SELECT * FROM users WHERE username = :username";

      $resultado = $this->conexionBD->prepare($query);

      $resultado->execute(array(":username"=>$this->user));

      return $resultado->rowCount();
    }

    private function comprobarContraseña() {
      $query = "SELECT * FROM users WHERE username = :username";

      $resultado = $this->conexionBD->prepare($query);

      $resultado->execute(array(":username"=>$this->user));

      $password = $resultado->fetch();

      $pass_tmp = $password['pass'];

      return password_verify($this->pass,$pass_tmp);

    }

    public function login() {
      return ($this->comprobarUsuario() != 0 && $this->comprobarContraseña());
    }

    public function getUsuario(){

      return $this->user;

    }

    public function getAccountId(){

      $query = "SELECT * FROM users WHERE username = :username";

      $resultado = $this->conexionBD->prepare($query);

      $resultado->execute(array(":username"=>$this->user));

      $usuario = $resultado->fetch();

      return $usuario['account_id'];

    }

    public function getRole(){

      $query = "SELECT * FROM users WHERE username = :username";

      $resultado = $this->conexionBD->prepare($query);

      $resultado->execute(array(":username"=>$this->user));

      $usuario = $resultado->fetch();

      return $usuario['role'];

    }
  }
