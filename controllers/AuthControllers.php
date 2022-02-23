<?php

  require_once('../models/Auth.php');

  $auth = new Auth();

  session_start();

  if ($auth->login()) {
    $_SESSION['usuario'] = $auth->getUsuario();
    $_SESSION['account_id'] = $auth->getAccountId();
    $_SESSION['role'] = $auth->getRole();

    if ($_SESSION['role'] == 'administrador') {
      header('location: ../views/admin/home/home.php');
      die();
    }

    header('location: ../views/regular/home/home.php');
  } else {
    $_SESSION['error'] = true;
    header('location: ../views/login/login.php?canLogin=false');
  }
