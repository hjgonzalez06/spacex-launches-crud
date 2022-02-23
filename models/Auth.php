<?php

  require_once('../config/conexion.php');
  require_once('../utils/functions.php');

  class Auth extends Conexion {
    protected $user;
    protected $pass;

    public function __construct() {
      parent::__construct();

      $this->user = limpiar(filter_input(INPUT_POST, 'usuario'));
      $this->pass = limpiar(filter_input(INPUT_POST, 'pass'));
    }

    private function comprobarUsuario() {
      $query = 'SELECT * FROM users WHERE username = :username';

      $result = $this->conexionBD->prepare($query);

      $result->execute(array(':username'=>$this->user));

      return $result->rowCount();
    }

    private function comprobaroContraseña() {
      $query = 'SELECT * FROM users WHERE username = :username';

      $result = $this->conexionBD->prepare($query);

      $result->execute(array(':username'=>$this->user));

      $user = $result->fetch();

      $password = $user['pass'];

      return password_verify($this->pass, $password);
    }

    public function login() {
      return ($this->comprobarUsuario() != 0 && $this->comprobaroContraseña());
    }

    public function getUsuario() {
      return $this->user;
    }

    public function getAccountId() {
      $query = 'SELECT * FROM users WHERE username = :username';

      $result = $this->conexionBD->prepare($query);

      $result->execute(array(':username'=>$this->user));

      $user = $result->fetch();

      return $user['account_id'];
    }

    public function getRole() {
      $query = 'SELECT * FROM users WHERE username = :username';

      $result = $this->conexionBD->prepare($query);

      $result->execute(array(':username'=>$this->user));

      $user = $result->fetch();

      return $user['role'];
    }

  }
