<?php

  require_once('../models/Auth.php');
  $verificar = new Auth();

  session_start();

  if($verificar->login()){
    $_SESSION['usuario'] = $verificar->getUsuario();
    $_SESSION['account_id'] = $verificar->getAccountId();
    $_SESSION['role'] = $verificar->getRole();
    
    switch($_SESSION['role']){
      case 'regular':
        header('location: ../views/regular/home/home.php');
        break;
      case 'administrador':
        header('location: ../views/admin/home/home.php');
        break;
    }
  }else{
    $_SESSION['error'] = true;
    header('location: ../views/login/login.php?error=true');
  }
